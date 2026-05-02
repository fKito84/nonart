<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    public function verUsuario()
    {
        // Carreguem les compres que ha fet
        $usuario = User::with([
            'compras.detalls.obra', 
            'reserva_tallers.taller' 
        ])->find(Auth::id());

        return view('usuario', compact('usuario'));
    }
    ///METODOS PARA EL LOGUIN

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
    //SALIDA
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/home');
    }
    //PEDIR CONTRASENYA
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
                    'password' => Hash::make($password) // Encriptamos la nueva
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