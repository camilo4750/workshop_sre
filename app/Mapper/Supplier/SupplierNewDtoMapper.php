<?php

namespace App\Mapper\Supplier;

use App\Dto\Supplier\SupplierNewDto;
use App\Mapper\CoreMapper;
use Illuminate\Http\Request;

class SupplierNewDtoMapper extends CoreMapper
{
    protected function getNewDto():SupplierNewDto
    {
        return new SupplierNewDto();
    }

    public function createFormRequest(Request $request): SupplierNewDto
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
