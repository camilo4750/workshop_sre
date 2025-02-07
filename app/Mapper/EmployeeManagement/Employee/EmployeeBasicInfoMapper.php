<?php

namespace App\Mapper\EmployeeManagement\Employee;

use App\Dto\EmployeeManagement\Employee\EmployeeBasicInfoDto;
use App\Mapper\CoreMapper;

class EmployeeBasicInfoMapper extends CoreMapper
{
    protected function getNewDto(): EmployeeBasicInfoDto
    {
        return new EmployeeBasicInfoDto();
    }

    public function createFromDbRecord(object  $dbRecord): EmployeeBasicInfoDto
    {
        $dto = $this->getNewDto();
        $dto->id = $dbRecord->id;
        $dto->fullName = $dbRecord->full_name;
        $dto->documentNumber = $dbRecord->document_number;
        $dto->salary = $dbRecord->salary;
        return $dto;
    }
}
