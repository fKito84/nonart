<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\CalendarioExcepcion;
use App\Models\ReservaTaller;

class AuthAPIController extends Controller
{

    public function registro(Request $request)
    {
        // Comprovem l'usuari tingui bé totes les dades al formulari
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'regex:/^\S+$/'], 
        ], [
            'name.unique' => 'Aquest nom d\'usuari ja està ocupat.',
            'name.regex' => 'El nom d\'usuari no pot contenir espais.',
            'email.unique' => 'Aquest correu ja està registrat.',
            'password.confirmed' => 'Les contrasenyes no coincideixen.',
            'password.min' => 'La contrasenya ha de tenir mínim 6 caràcters.',
            'password.regex' => 'La contrasenya no pot contenir espais en blanc.'
        ]);

        // Guardem el nou usuari a la base de dades
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client', 
        ]);

        // Creem la clau secreta (Token) per entrar 
        $token = $user->createToken('app_token')->plainTextToken;

        // Enviem la resposta indicant que tot va be 
        return response()->json([
            'status' => 'success',
            'message' => 'Usuari registrat correctament',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ], 201);
    }

    public function login(Request $request)
    {
        // Comprovem email i contrasenya
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Mirem si son correctes
        if (!Auth::attempt($credentials)) {
            // Si són falsos, enviem un error
            return response()->json([
                'status' => 'error',
                'message' => 'Les credencials no coincideixen amb un usuari vàlid.'
            ], 401);
        }

        // Correcte, busquem les dades de l'usuari
        $user = User::where('email', $request->email)->firstOrFail();
        
        // Esborrem les claus antigues
        $user->tokens()->delete(); 
        
        // Creem una nova clau (Token) per la sessio 
        $token = $user->createToken('app_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'data' => [
                'user' => $user,
                'token' => $token,
                'role' => $user->role
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        // Esborrem la clau del mobil 
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Sessió tancada correctament'
        ]);
    }

    
    // RECUPERAR LA CONTRASENYA


    public function enviarResetContrasenya(Request $request)
    {
        // Comprovem que ens passin un email
        $request->validate(['email' => 'required|email']);

        // Demanem a Laravel que envi l'enllaç de recuperacio
        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'status' => 'success', 
                'message' => 'T\'hem enviat un enllaç al correu per recuperar la contrasenya!'
            ]);
        }

        return response()->json([
            'status' => 'error', 
            'message' => 'No hem trobat cap usuari amb aquest correu.'
        ], 404);
    }

    public function resetContrasenyaValidate(Request $request)
    {
        // Comprovem la nova contrasenya
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed', 
        ]);

        // Guardem contrasenya a la base de dades
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password) 
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json([
                'status' => 'success',
                'message' => 'La teva contrasenya s\'ha restablert correctament! Ja pots iniciar sessió.'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => __($status)
        ], 400);
    }

    // PANELLS USUARI I ADMIN


    public function verUsuario(Request $request)
    {
        // Obtenim usuari que fa peticio
        $user = $request->user();

        //  Usuari admin
        if ($user->role === 'admin') {
            return response()->json([
                'status' => 'redirect_admin',
                'message' => 'Aquest usuari és administrador'
            ]); 
        }

        // Busquem compres i reserves
        $usuario = User::with([
            'compras.detalls.obra', 
            'reserva_tallers.taller' 
        ])->find($user->id);

        // Enviem dades a l'aplicació 
        return response()->json([
            'status' => 'success',
            'data' => $usuario
        ]);
    }

    public function verUsuarioAdmin(Request $request)
    {
        // Comprovem un altre cop l'ususari
        if ($request->user()->role !== 'admin') {
            return response()->json(['status' => 'error', 'message' => 'No autoritzat'], 403);
        }

        $usuario = User::find($request->user()->id);

        // Busquem les reserves 
        $reservasTodas = \App\Models\ReservaTaller::with(['taller', 'user'])
                            ->orderBy('data_taller', 'asc')
                            ->get();
        
        // Agrupem les reserves 
        $reservasAgrupadas = $reservasTodas->groupBy(function($reserva) {
            return $reserva->taller_id . '|' . $reserva->data_taller . '|' . $reserva->notes;
        });

        // Preparem calendari de l'admin
        $eventosCalendario = [];
        foreach($reservasAgrupadas as $clave => $grupo) {
            $infoTaller = $grupo->first();
            $totalPersonas = $grupo->sum('personas_reserva');
            $capacitatMax = $infoTaller->taller ? $infoTaller->taller->capacitat_max : 20; 
            
            // Colors segons si el taller està ple o no
            $estatCalculat = 'pendent';
            $color = '#c9973a'; 

           if ($totalPersonas >= $capacitatMax) {
                $estatCalculat = 'complet';
                $color = '#a855f7'; 
            } elseif ($totalPersonas >= 8) {
                $estatCalculat = 'confirmada';
                $color = '#00c950';
            }

            // Netegem la data 
            $dataNeta = \Carbon\Carbon::parse($infoTaller->data_taller)->format('Y-m-d');

            if (!isset($eventosCalendario[$dataNeta])) {
                $eventosCalendario[$dataNeta] = [];
            }

            // Afegim informacio dia
            $eventosCalendario[$dataNeta][] = [
                'taller' => $infoTaller->taller?->nom ?? 'Taller esborrat',
                'horari' => $infoTaller->notes,
                'ocupacio' => $totalPersonas,
                'capacitat' => $capacitatMax,
                'estat' => $estatCalculat,
                'color' => $color
            ];
        }


        // Busquem vendes i stock
        $vendas = \App\Models\Venda::with(['user', 'detalls.obra', 'detalls.taller'])
                    ->where('estat', 'pagat')
                    ->orderBy('created_at', 'desc')
                    ->get();
                    
        $totalIngresado = $vendas->sum('total_comanda');
        $stock = \App\Models\Stock::all();
        $excepcions = CalendarioExcepcion::all()->keyBy('data_excepcion');

        // Enviem informació 
        return response()->json([
            'status' => 'success',
            'data' => [
                'usuario' => $usuario,
                'reservasAgrupadas' => $reservasAgrupadas,
                'vendas' => $vendas,
                'totalIngresado' => $totalIngresado,
                'stock' => $stock,
                'eventosCalendario' => $eventosCalendario,
                'excepcions' => $excepcions
            ]
        ]);
    }


    // CALENDARI


    public function toggleDisponibilitat(Request $request)
    {
        $fecha = $request->fecha;
        $dayOfWeek = \Carbon\Carbon::parse($fecha)->dayOfWeek; 
        
        $excepcio = CalendarioExcepcion::where('data_excepcion', $fecha)->first();
        // De dilluns a Dijous esta tancat per defecte
        $esNormalmentTancat = ($dayOfWeek >= 1 && $dayOfWeek <= 4);
        
        // Mirem si està tancat actualment
        $estaTancatActualment = $excepcio ? $excepcio->tancat : $esNormalmentTancat;

        if (!$estaTancatActualment) {
            // Mirem si hi han apuntades
            $reservesActives = ReservaTaller::whereDate('data_taller', $fecha)->count();
            
            if ($reservesActives > 0) {
                // Si hi ha reserves bloquegem 
                return response()->json([
                    'status' => 'error', 
                    'message' => 'No pots tancar aquest dia perquè ja té ' . $reservesActives . 
                            ' reserva/es activa/es. Has de cancel·lar-les o moure-les primer.'
                ]);
            }
        }

        // Guardem els canvis 
        if ($excepcio) {
            $excepcio->delete();
            return response()->json(['status' => 'success', 'message' => 'Tornat a la normalitat']);
        } else {
            CalendarioExcepcion::create([
                'data_excepcion' => $fecha,
                'tancat' => !$esNormalmentTancat
            ]);
            return response()->json(['status' => 'success', 'message' => 'Excepció creada']);
        }
    }
}