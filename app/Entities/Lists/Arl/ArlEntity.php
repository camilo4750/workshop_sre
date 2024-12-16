<?php

namespace App\Entities\Lists\Arl;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArlEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'arl';
}
