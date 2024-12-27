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
        $dto->fullName = $dbRecord->full_name;
        $dto->typeDocumentId = $dbRecord->type_document_id;
        $dto->typeDocumentName = $dbRecord->type_document_name;
        $dto->documentNumber = $dbRecord->document_number;
        $dto->countryId = $dbRecord->country_id;
        $dto->departmentId = $dbRecord->department_id;
        $dto->municipalityId = $dbRecord->municipality_id;
        $dto->municipalityName = $dbRecord->municipality_name;
        $dto->address = $dbRecord->address;
        $dto->telephone = $dbRecord->telephone;
        $dto->genderId = $dbRecord->gender_id;
        $dto->genderName = $dbRecord->gender_name;
        $dto->jobPositionId = $dbRecord->job_position_id;
        $dto->jobPositionName = $dbRecord->job_position_name;
        $dto->epsId = $dbRecord->eps_id;
        $dto->epsName = $dbRecord->eps_name;
        $dto->pensionFundId = $dbRecord->pension_fund_id;
        $dto->pensionFundName = $dbRecord->pension_fund_name;
        $dto->arlId = $dbRecord->arl_id;
        $dto->arlName = $dbRecord->arl_name;
        $dto->contractTypeId = $dbRecord->contract_type_id;
        $dto->contractTypeName = $dbRecord->contract_type_name;
        $dto->salary = $dbRecord->salary;
        $dto->entryDate = $dbRecord->entry_date;
        $dto->withdrawalDate = $dbRecord->withdrawal_date;
        $dto->bankId = $dbRecord->bank_id;
        $dto->bankName = $dbRecord->bank_name;
        $dto->bankAccountNumber = $dbRecord->bank_account_number;
        $dto->emergencyContact = $dbRecord->emergency_contact;
        $dto->employeeStatusId = $dbRecord->employee_status_id;
        $dto->employeeStatusName = $dbRecord->employee_status_name;
        $dto->userWhoCreatedId = $dbRecord->user_who_created_id;
        $dto->userWhoCreatedName = $dbRecord->user_who_created_name;
        $dto->userWhoUpdatedId = $dbRecord->user_who_updated_id;
        $dto->userWhoUpdatedName = $dbRecord->user_who_updated_name;
        $dto->createdAt = $dbRecord->created_at;
        $dto->updatedAt = $dbRecord->updated_at;
        return $dto;
    }
}
