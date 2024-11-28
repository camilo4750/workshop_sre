<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticate;
use App\Repositories\System\User\UserRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticate
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $table = 'users';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'phone',
        'email',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @return UserRepository
     */
    public function getRepo()
    {
        $repo= App::make(UserRepository::class);
        return $repo->setEntity($this);
    }
}
