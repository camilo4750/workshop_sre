<?php

namespace App\Dto\Supplier;

use App\Dto\CoreDto;

class SupplierDto extends CoreDto
{
    public int $id;
    public string $companyName;

    public string $companyPhone;

    public string $contactInformation;

    public string $nit;

    public string $email;

    public string $address;

    public int $municipalityId;

    public string $municipalityName;

    public int $departmentId;
    
    public string $departmentName;

    public int $countryId;
    
    public string $countryName;

    public int $statusId;

    public string $statusName;

    public ?int $userWhoCreatedId;

    public ?int $userWhoUpdatedId;

    public ?string $createdAt;

    public ?string $updatedAt;
}
