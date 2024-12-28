<?php

namespace App\Dto\Employee;

use App\Dto\CoreDto;

class EmployeeUpdateDto extends CoreDto
{
    public int $id;
    public string $full_name;

    public int $type_document_id;

    public string $document_number;  

    public int $municipality_id;

    public string $address;

    public string $telephone;

    public int $gender_id;

    public int $job_position_id;

    public int $eps_id;

    public int $pension_fund_id;

    public int $arl_id;

    public int $contract_type_id;

    public float $salary;

    public string $entry_date;

    public ?string $withdrawal_date;

    public int $bank_id;

    public ?string $bank_account_number;

    public string $emergency_contact;

    public int $employee_status_id;

    public ?int $user_who_updated_id;

    public ?string $updated_at;
}