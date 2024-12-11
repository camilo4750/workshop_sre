<?php

namespace App\Mapper\Employee;

use App\Dto\Employee\EmployeeDto;
use App\Mapper\CoreMapper;

class EmployeeDtoMapper extends CoreMapper
{
    protected function getNewDto(): EmployeeDto
    {
        return new EmployeeDto();
    }
}