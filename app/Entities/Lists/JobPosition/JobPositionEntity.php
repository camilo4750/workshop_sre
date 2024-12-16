<?php

namespace App\Entities\Lists\JobPosition;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPositionEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'job_positions';
}
