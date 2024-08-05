<?php

namespace App\Mapper\Supplier;

use App\Dto\Supplier\SupplierNewDto;
use App\Mapper\CoreMapper;

class SupplierNewDtoMapper extends CoreMapper
{
    protected function getNewDto():SupplierNewDto
    {
        return new SupplierNewDto();
    }

    public function createFormRequest($request): SupplierNewDto
    {
        $dto = $this->getNewDto();
        $dto->company_name = $request['companyName'];
        $dto->nit = $request['nit'];
        $dto->phone_company = $request['phoneCompany'];
        $dto->email = $request['email'];
        $dto->address = $request['address'];
        $dto->representative = $request['representative'];
        $dto->phone_representative = $request['phoneRepresentative'];
        $dto->state = $request['state'];
        return $dto;
    }
}
