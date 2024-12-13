<?php

namespace App\Mapper\Employee;

use App\Dto\Employee\EmployeeTableDto;
use App\Mapper\CoreMapper;

class EmployeeTableDtoMapper extends CoreMapper
{
    protected function getNewDto(): EmployeeTableDto
    {
        return new EmployeeTableDto();
    }

    public function createFromDbRecord(object  $dbRecord): EmployeeTableDto
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
