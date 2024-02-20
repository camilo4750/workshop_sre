<?php

namespace App\Entities;

use App\Interfaces\Entities\CoreEntityInterface;
use Illuminate\Database\Eloquent\Model;

abstract class CoreEntity extends Model implements CoreEntityInterface
{
    protected $hidden = ['deleted_at', 'user_who_deleted_id'];

}
