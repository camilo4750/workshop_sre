<?php

namespace App\Dto\Supplier;

use App\Dto\CoreDto;

class SupplierUpdateDto extends CoreDto
{
    public $id;
    
    public string $company_name;

    public string $company_phone;

    public string $contact_information;

    public string $nit;

    public string $address;

    public string $email;

    public int $municipality_id;

    public int $status_id;
}
