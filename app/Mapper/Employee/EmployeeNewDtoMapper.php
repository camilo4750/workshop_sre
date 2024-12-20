<?php

namespace App\Mapper\Employee;

use App\Dto\Employee\EmployeeNewDto;
use App\Mapper\CoreMapper;
use Illuminate\Http\Request;

class EmployeeNewDtoMapper extends CoreMapper
{
    protected function getNewDto(): EmployeeNewDto
    {
        return new EmployeeNewDto();
    }

    public function createFormRequest(Request $request): EmployeeNewDto 
    {
        $dto = $this->getNewDto();
        $dto->full_name = $request->get('fullName');
        $dto->type_document_id = $request->get('typeDocumentId');
        $dto->document_number = $request->get('documentNumber');
        $dto->municipality_id = $request->get('municipalityId');
        $dto->address = $request->get('address');
        $dto->telephone = $request->get('telephone');
        $dto->gender_id = $request->get('genderId');
        $dto->job_position_id = $request->get('jobPositionId');
        $dto->eps_id = $request->get('epsId');
        $dto->pension_fund_id = $request->get('pensionFundId');
        $dto->arl_id = $request->get('arlId');
        $dto->contract_type_id = $request->get('contractTypeId');
        $dto->salary = $request->get('salary');
        $dto->entry_date = $request->get('entryDate');
        $dto->withdrawal_date = $request->get('withdrawalDate');
        $dto->bank_id = $request->get('bankId');
        $dto->bank_account_number = $request->get('bankAccountNumber');
        $dto->emergency_contact = $request->get('emergencyContact');
        $dto->employee_status_id = $request->get('employeeStatusId');
        return $dto;
    }
}