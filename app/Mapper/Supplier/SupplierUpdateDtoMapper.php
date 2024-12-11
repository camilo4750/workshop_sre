<?php

namespace App\Mapper\Supplier;

use App\Dto\Supplier\SupplierUpdateDto;
use Illuminate\Http\Request;

class SupplierUpdateDtoMapper
{
    protected function getNewDto(): SupplierUpdateDto
    {
        return new SupplierUpdateDto();
    }

    public function createFromRequest(Request $request): SupplierUpdateDto
    {
        $dto = $this->getNewDto();
        $dto->company_name = $request->get('companyName');
        $dto->company_phone = $request->get('companyPhone');
        $dto->contact_information = $request->get('contactInformation');
        $dto->nit = $request->get('nit');
        $dto->address = $request->get('address');
        $dto->email = $request->get('email');
        $dto->municipality_id = $request->get('municipalityId');
        $dto->status_id = $request->get('statusId');
        return $dto;
    }
}
