<?php

namespace App\Dto\EmployeeManagement\Employee;

use App\Dto\CoreDto;

class EmployeeTableDto extends CoreDto
{
    public int $id;
    public string $fullName;

    public string $documentNumber;

    public string $telephone;

    public ?int $jobPositionId;

    public string $jobPositionName;

    public string $entryDate;

    public ?int $employeeStatusId;

    public ?string $employeeStatusName;
}