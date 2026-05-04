<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\CalendarioExcepcion;
use App\Models\ReservaTaller;

class AuthController extends Controller
{
    public function verUsuario()
    {
        //Obtenim l'usuario autenticat
        $user = Auth::user();

        // Si es admin, l'enviem a la ruta del su panelll 
        if ($user->role === 'admin') {
            return redirect()->route('admin.index'); 
        }
        // Carreguem les compres que ha fet per 
        // si li demanen de boca o per telefon , aixi
        // tambe pot decidir completar un taller que nomes tingui 
        // 7 persones apuntades
        $usuario = User::with([
            'compras.detalls.obra', 
            'reserva_tallers.taller' 
        ])->find(Auth::id());

        return view('usuario', compact('usuario'));
    }
    public function verUsuarioAdmin()
    {
        $usuario = User::find(Auth::id());

        // TALLERES , obtenim les reserves dee tallers
        $reservasTodas = \App\Models\ReservaTaller::with(['taller', 'user'])
                            ->orderBy('data_taller', 'asc')
                            ->get();
        
        $reservasAgrupadas = $reservasTodas->groupBy(function($reserva) {
            return $reserva->taller_id . '|' . $reserva->data_taller . '|' . $reserva->notes;
        });

        // PREPARAREM el calendari amb les dades 
        $eventosCalendario = [];
        foreach($reservasAgrupadas as $clave => $grupo) {
            $infoTaller = $grupo->first();
            $totalPersonas = $grupo->sum('personas_reserva');
            // Capacitat maxima del taller 
            $capacitatMax = $infoTaller->taller ? $infoTaller->taller->capacitat_max : 20; 
            
            // Posem colors per els estats dels 
            // tallers en el calendari , groc ->pendent
            // verd->comfirmat , lila ->complet
            $estatCalculat = 'pendent';
            $color = '#c9973a'; 

           if ($totalPersonas >= $capacitatMax) {
                $estatCalculat = 'complet';
                $color = '#a855f7'; 
            } elseif ($totalPersonas >= 8) {
                $estatCalculat = 'confirmada';
                $color = '#00c950';
            }

            // Netegem la data per agruparla por día exacte
            $dataNeta = \Carbon\Carbon::parse($infoTaller->data_taller)->format('Y-m-d');

            if (!isset($eventosCalendario[$dataNeta])) {
                $eventosCalendario[$dataNeta] = [];
            }

            $eventosCalendario[$dataNeta][] = [
                'taller' => $infoTaller->taller?->nom ?? 'Taller esborrat',
                'horari' => $infoTaller->notes,
                'ocupacio' => $totalPersonas,
                'capacitat' => $capacitatMax,
                'estat' => $estatCalculat,
                'color' => $color
            ];
        }

        // VENDES , DETALLS VENDES Y STOCK
       
        $vendas = \App\Models\Venda::with(['user', 'detalls.obra', 'detalls.taller'])
                    ->where('estat', 'pagat')
                    ->orderBy('created_at', 'desc')
                    ->get();
                    
        $totalIngresado = $vendas->sum('total_comanda');
        $stock = \App\Models\Stock::all();
        $excepcions = CalendarioExcepcion::all()->keyBy('data_excepcion');

        return view('usuarioAdmin', compact('usuario', 'reservasAgrupadas', 'vendas', 
                    'totalIngresado', 'stock', 'eventosCalendario','excepcions'));
    }
    //Funcio per la disponibilitat dels dies del calendari
    public function toggleDisponibilitat(Request $request)
    {
        $fecha = $request->fecha;
        $dayOfWeek = \Carbon\Carbon::parse($fecha)->dayOfWeek; 
        
        $excepcio = CalendarioExcepcion::where('data_excepcion', $fecha)->first();
        $esNormalmentTancat = ($dayOfWeek >= 1 && $dayOfWeek <= 4);
        
        // Comprobem dia actualment està tancat o obert
        $estaTancatActualment = $excepcio ? $excepcio->tancat : $esNormalmentTancat;

        // Si el dia està obert , mirem si hi ha reserves
        if (!$estaTancatActualment) {
            // Busquem si hi ha reserves per a aquesta data exacta
            $reservesActives = ReservaTaller::whereDate('data_taller', $fecha)->count();
            
            if ($reservesActives > 0) {
                // Bloquegem l'acció i enviem un error
                return response()->json([
                    'status' => 'error', 
                    'message' => 'No pots tancar aquest dia perquè ja té ' . $reservesActives . 
                            ' reserva/es activa/es. Has de cancel·lar-les o moure-les primer.'
                ]);
            }
        }

        // Si no hi ha reserves , procedim amb normalitat
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

    ///METODES PER EL LOGUIN

    public function LoginHome()
    {
        return view('login'); 
    }
    //ENTRADA
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'Les credencials no coincideixen amb usauari valid.',
        ])->onlyInput('email'); 
    }
    //SORTIDA
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/home');
    }
    //DEMANAR CONTRASENYA
    public function recuperarContrasenya()
    {
        return view('/recuperarContrasenya');
    }
    
    public function enviarResetContrasenya(Request $request)
    {

        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('login')
                ->with('status', 'T\'hem enviat un enllaç al correu per recuperar la contrasenya!');
        }

        return back()->withErrors(['email' => 'No hem trobat cap usuari amb aquest correu.']);
    }

    //RESTAURAR CONTRASENYA
    public function resetContrasenya(Request $request, $token = null)
    {
        return view('/resetContrasenya')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    
    public function resetContrasenyaValidate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed', 
        ]);

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
            // Mandamos al login con un mensaje de éxito
            return redirect()->route('login')->with('status', 
                'La teva contrasenya s\'ha restablert correctament! Ja pots iniciar sessió.');
        }

        return back()->withErrors(['email' => __($status)]);
    }


    // Mostrar el formulari de registre
    public function registroNuevo()
    {
        return view('registroNuevo'); 
    }

    // Registre
    public function registro(Request $request)
    {
        //Validació usuari
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

        // Creem l'usuari
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client', 
        ]);

        Auth::login($user);

        return redirect('/home');
    }
}