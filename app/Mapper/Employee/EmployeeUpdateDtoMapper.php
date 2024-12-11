<?php

namespace App\Mapper\Employee;

use App\Dto\Employee\EmployeeUpdateDto;
use App\Mapper\CoreMapper;

class EmployeeUpdateDtoMapper extends CoreMapper
{
    protected function getNewDto(): EmployeeUpdateDto
    {
        return new EmployeeUpdateDto();
    }
}