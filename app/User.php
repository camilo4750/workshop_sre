<?php

namespace App;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticate
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $table = 'users';


    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];
}
