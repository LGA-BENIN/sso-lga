<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail; // Add this line

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

    // Gérer la connexion avec Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
    
            // Récupérer les informations supplémentaires de l'utilisateur
            $additionalUserInfo = $user->user;
            $birthdate = $additionalUserInfo['birthdays'][0]['date'] ?? null;
            $phone = $additionalUserInfo['phoneNumbers'][0]['value'] ?? null;
    
            // Trouver ou créer un utilisateur avec les informations obtenues de Google
            $authUser = User::where('google_id', $user->id)->first();
    
            if (!$authUser) {
                $authUser = User::create([
                    'firstname' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => bcrypt(Str::random(16)), // Mot de passe aléatoire pour les utilisateurs créés
                    'birthday' => $birthdate,
                    'phone_number' => $phone,
                ]);
                
            } else {
                // Mettre à jour les informations supplémentaires
                $authUser->update([
                    'birthday' => $birthdate,
                    'phone_number' => $phone,
                ]);
            }
    
            Auth::login($authUser, true);
    
            // Rediriger vers la page d'accueil ou autre
            return redirect('/home');
    
        } catch (Exception $e) {
            return redirect('/login')->withErrors('Unable to login using Google. Please try again.');
        }
    }

    public function showForgotForm() {
        return view('forgot');
    }

    public function sendResetLink(Request $request) {

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
       
            $action_link = route('reset.password.from', ['token' => $token, 'email' => $request->email]);

            $body = "Hello, <br /><br />Please click the link below to reset your password:<br><a href='".$action_link."'>Reset Password</a><br><br>Thank you!";           
            Mail::send('email-forgot',['action_link' => $action_link, 'body'=>$body], function ($message) use ($request) {
                $message->from('noreply@example.com', 'Laravel');
                $message->to($request->email,"laravel")
                ->subject('Reset Password');
            });

        return back()->with('success', 'Email envoyé');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('reset')->with(['token' => $token, 'email' => $request->email]);
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if(!$check_token) {
            return back()->withInput()->with('error', 'Invalid token!');
        } else {
            User::where('email', $request->email)->update([
                'password' => md5($request->password),
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            return redirect('/login')->with('success', 'Password reset successfully')
            ->with('email', $request->email);

        }


    }


} 

