<?php

namespace App\Dto\Supplier;

use App\Dto\CoreDto;

class SupplierNewDto extends CoreDto
{
    public string $company_name;

    public int $nit;

    public string $phone_company;

    public string $email;

    public string $address;

    public string $representative;

    public string $phone_representative;

    public bool $active;
}
