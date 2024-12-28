<?php

namespace App\Dto\Employee;

use App\Dto\CoreDto;

class EmployeeDto extends CoreDto
{
    public int $id;
    
    public string $fullName;

    public int $typeDocumentId;

    public string $typeDocumentName;

    public string $documentNumber;  

    public int $countryId;

    public int $departmentId;
    
    public int $municipalityId;

    public string $municipalityName;

    public string $address;

    public string $telephone;

    public int $genderId;

    public string $genderName;

    public ?int $jobPositionId;

    public ?string $jobPositionName;

    public int $epsId;

    public string $epsName;

    public int $pensionFundId;

    public string $pensionFundName;

    public int $arlId;

    public string $arlName;

    public int $contractTypeId;
    
    public string $contractTypeName;

    public float $salary;

    public string $entryDate;

    public ?string $withdrawalDate;

    public int $bankId;

    public string $bankName;

    public ?string $bankAccountNumber;

    public string $emergencyContact;
    public int $employeeStatusId;

    public string $employeeStatusName;

    public ?int $userWhoCreatedId ;

    public ?string $userWhoCreatedName;

    public ?int $userWhoUpdatedId;

    public ?string $userWhoUpdatedName;

    public ?string $createdAt;

    public ?string $updatedAt;
}
