<?php

namespace App\Mapper\Employee;

use App\Dto\Employee\EmployeeNewDto;
use App\Mapper\CoreMapper;

class EmployeeNewDtoMapper extends CoreMapper
{
    protected function getNewDto(): EmployeeNewDto
    {
        return new EmployeeNewDto();
    }
}