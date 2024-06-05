<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Méthode de connexion
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si l'authentification réussit, vérifiez le mot de passe haché
            $user = Auth::user();
            if (Hash::check($request->password, $user->password)) {
                return redirect()->intended('/dashboard');
            } else {
                // Si le mot de passe ne correspond pas, déconnectez l'utilisateur et redirigez-le vers la page de connexion avec un message d'erreur
                Auth::logout();
                return redirect()->back()->withInput($request->only('email'))->withErrors([
                    'loginError' => 'Invalid login credentials. Please try again.',
                ]);
            }
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'loginError' => 'Invalid login credentials. Please try again.',
        ]);
    }

     /**
     * Déconnecter l'utilisateur de l'application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        // Échec de l'authentification
        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }
}
