<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

            // Hash the password
    $hashedPassword = Hash::make($request->input('password'));
        // Ajoutez cette ligne pour afficher le mot de passe haché dans les logs
        Log::info('Hashed Password: ' . $hashedPassword);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }


}
