<?php

namespace App\Dto\Supplier;

use App\Dto\CoreDto;

class supplierDto extends CoreDto
{
    public int $id;
    public string $companyName;

    public int $nit;

    public string $phoneCompany;

    public string $email;

    public string $address;

    public string $representative;

    public string $phoneRepresentative;

    public bool $active;

    public ?int $userWhoCreatedId = null;

    public ?int $userWhoUpdatedId = null;

    public ?int $userWhoDeletedId = null;

    public ?string $createdAt = null;

    public ?string $updatedAt = null;

    public ?string $deletedAt = null;
}
