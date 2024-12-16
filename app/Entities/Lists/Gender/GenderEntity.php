<?php

namespace App\Entities\Lists\Gender;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GenderEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'genders';
}
