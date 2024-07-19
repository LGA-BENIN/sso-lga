<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('login'); // Afficher la vue login.blade.php
    }

    // Affiche le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('register'); // Afficher la vue register.blade.php
    }

    // Gère la connexion des utilisateurs
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone_number' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('phone_number', $request->phone_number)->first();


        // Tentative d'authentification
        if ($user && md5($request->password) === $user->password) {
            Auth::login($user); // Connecter l'utilisateur
            // Redirection vers la page d'accueil après connexion réussie
            return redirect('/home')->with('status', 'Vous êtes connecté');
        }

        return back()->withErrors([
            'phone_number' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    // Gère l'inscription des utilisateurs
    public function register(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_gender' => ['nullable', 'integer'],
            'birthday' => ['nullable', 'date'],
            'newsletter' => ['nullable', 'boolean'],
            'optin' => ['nullable', 'boolean'],
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => md5($request->password),
            'id_gender' => $request->id_gender,
            'birthday' => $request->birthday,
            'newsletter' => $request->newsletter,
            'optin' => $request->optin,
        ]);

        // Redirection vers la page d'accueil après inscription réussie
        return redirect('/home')->with('status', 'Vous êtes inscrit et connecté');
    }

    // Gère la déconnexion des utilisateurs
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
