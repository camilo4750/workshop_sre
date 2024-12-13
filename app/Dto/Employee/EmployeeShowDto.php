<?php

namespace App\Dto\Employee;

use App\Dto\CoreDto;

class EmployeeShowDto extends CoreDto
{
    public int $id;
    public string $full_name;

    public int $type_document_id;

    public string $type_document_name;

    public string $document_number;  

    public int $municipality_id;

    public string $municipality_name;

    public string $address;

    public string $telephone;

    public int $gender_id;

    public string $gender_name;

    public ?int $job_position_id;

    public ?string $job_position_name;

    public int $eps_id;

    public string $eps_name;

    public int $pension_fund_id;

    public string $pension_fund_name;

    public int $arl_id;

    public string $arl_name;

    public int $contract_type_id;

    public float $salary;

    public string $entry_date;

    public ?string $withdrawal_date;

    public int $bank_id;

    public string $bank_name;

    public ?string $bank_account_number;

    public string $emergency_contact;

    public ?int $user_who_created_id ;

    public ?string $user_who_created_name;

    public ?int $user_who_updated_id;

    public ?string $user_who_updated_name;

    public ?string $created_at;

    public ?string $updated_at;
}