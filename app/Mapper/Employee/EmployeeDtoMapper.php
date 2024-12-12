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

    public function createFromDbRecord(object  $dbRecord): EmployeeDto
    {
        $dto = $this->getNewDto();
        $dto->id = $dbRecord->id;
        $dto->fullName = $dbRecord->full_name;
        $dto->documentNumber = $dbRecord->document_number;
        $dto->telephone = $dbRecord->telephone;
        $dto->jobPositionId = $dbRecord->job_position_id;
        $dto->jobPositionName = $dbRecord->job_position_name;
        $dto->entryDate = $dbRecord->entry_date;
        $dto->employeeStatusId = $dbRecord->employee_status_id;
        $dto->employeeStatusName = $dbRecord->employee_status_name;
        return $dto;
    }
}
