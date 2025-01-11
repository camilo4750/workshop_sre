<?php

namespace App\Mapper\EmployeeManagement\Employee;

use App\Dto\EmployeeManagement\Employee\EmployeeUpdateDto;
use App\Mapper\CoreMapper;
use Illuminate\Http\Request;

class EmployeeUpdateDtoMapper extends CoreMapper
{
    protected function getNewDto(): EmployeeUpdateDto
    {
        return new EmployeeUpdateDto();
    }

    public function createFromRequest(Request $request): EmployeeUpdateDto
    {
        $dto = $this->getNewDto();
        $dto->id = $request->id;
        $dto->full_name = $request->fullName;
        $dto->type_document_id = $request->typeDocumentId;
        $dto->document_number = $request->documentNumber;
        $dto->municipality_id = $request->municipalityId;
        $dto->address = $request->address;
        $dto->telephone = $request->telephone;
        $dto->gender_id = $request->genderId;
        $dto->job_position_id = $request->jobPositionId;
        $dto->eps_id = $request->epsId;
        $dto->pension_fund_id = $request->pensionFundId;
        $dto->arl_id = $request->arlId;
        $dto->contract_type_id = $request->contractTypeId;
        $dto->salary = $request->salary;
        $dto->entry_date = $request->entryDate;
        $dto->withdrawal_date = $request->withdrawalDate;
        $dto->bank_id = $request->bankId;
        $dto->bank_account_number = $request->bankAccountNumber;
        $dto->emergency_contact = $request->emergencyContact;
        $dto->employee_status_id = $request->employeeStatusId;
        return $dto;
    }
}
