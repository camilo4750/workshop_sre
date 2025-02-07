<?php

namespace App\Dto\EmployeeManagement\Employee;

use App\Dto\CoreDto;

class EmployeeBasicInfoDto extends CoreDto
{
    public int $id;

    public string $fullName;

    public string $documentNumber;

    public string $salary;
}
