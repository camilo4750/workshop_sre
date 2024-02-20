<?php

namespace App;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticate
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';


    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];
}
