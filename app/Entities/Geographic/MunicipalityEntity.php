<?php

namespace App\Entities\Geographic;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MunicipalityEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'municipalities';
}