<?php

namespace App\Mapper\Supplier;

use App\Dto\Supplier\SupplierUpdateDto;

class SupplierUpdateDtoMapper
{
    protected function getNewDto(): SupplierUpdateDto
    {
        return new SupplierUpdateDto();
    }

    public function createFormRequest($request): SupplierUpdateDto
    {
        $dto = $this->getNewDto();
        $dto->company_name = $request['companyName'];
        $dto->nit = $request['nit'];
        $dto->phone_company = $request['phoneCompany'];
        $dto->email = $request['email'];
        $dto->address = $request['address'];
        $dto->representative = $request['representative'];
        $dto->phone_representative = $request['phoneRepresentative'];
        return $dto;
    }
}
