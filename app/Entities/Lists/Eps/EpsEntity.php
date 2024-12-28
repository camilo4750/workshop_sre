<?php

namespace App\Entities\Lists\Eps;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EpsEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'eps';
}
