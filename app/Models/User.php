<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone_number',
        'password',
        'id_gender', 
        'birthday',   
        'newsletter', 
        'optin',      
        'active',     
        'prestashop_customer_id' 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Ajout de la méthode pour spécifier l'algorithme de hachage MD5
    public function getAuthPassword()
    {
        return $this->password; // Retourne le mot de passe déjà haché en MD5
    }
}