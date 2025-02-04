<?php

namespace App\Entities\EmployeeManagement\Employee;

use App\Entities\CoreEntity;
use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'employees';

    protected static function newFactory()
    {
        return EmployeeFactory::new();
    }
}
