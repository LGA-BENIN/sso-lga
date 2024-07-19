<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client; // Ajout pour Passport

class AuthController extends Controller
{
    // ... (showLoginForm et showRegistrationForm inchangés)

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone_number' => ['required'], // Utilisation du numéro de téléphone
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('PrestaShop')->accessToken;

            // Rediriger vers PrestaShop avec le token
            $prestaShopUrl = config('app.prestashop_url') . '/module/ssologin/login?token=' . $token;
            return redirect($prestaShopUrl);
        }

        return back()->withErrors([
            'phone_number' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:255'], // Ajout du numéro de téléphone
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
            'phone_number' => $request->phone_number, // Enregistrement du numéro de téléphone
            'password' => md5($request->password), // Hachage MD5
            'id_gender' => $request->id_gender,
            'birthday' => $request->birthday,
            'newsletter' => $request->newsletter,
            'optin' => $request->optin,
        ]);

        // Génération du token
        $token = $user->createToken('PrestaShop')->accessToken;

        // Rediriger vers PrestaShop avec le token
        $prestaShopUrl = config('app.prestashop_url') . '/module/ssologin/login?token=' . $token;
        return redirect($prestaShopUrl);
    }

    public function showLoginForm()
    {
        return view('login'); // Afficher la vue login.blade.php
    }

    public function showRegistrationForm()
    {
        return view('register'); // Afficher la vue register.blade.php
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Rediriger vers la page de connexion (à implémenter plus tard)
        return redirect('/login');
    }
}