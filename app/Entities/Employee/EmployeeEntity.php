<?php

namespace App\Entities\Employee;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'employees';
}