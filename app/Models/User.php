<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Sanctum\HasApiTokens;

class User extends \Illuminate\Foundation\Auth\User
{
    use Notifiable;

    
    protected $primaryKey = 'user_id';


    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function validationMessages(): array
    {
        return [           
            'email.required' => 'Please write a valid Email.',
            'email.min' => 'The email must have data after the @',
            'password.required' => 'Please input a valid Password.',
        ];
    }

}
