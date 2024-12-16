<?php

namespace App\Entities\Lists\EmployeeStatus;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeStatusEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'employees_status';
}
