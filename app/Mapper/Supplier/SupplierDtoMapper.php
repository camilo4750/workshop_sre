<?php

namespace App\Mapper\Supplier;

use App\Dto\Supplier\SupplierDto;
use App\Mapper\CoreMapper;

class SupplierDtoMapper extends CoreMapper
{
    protected function getNewDto():SupplierDto
    {
        return new SupplierDto();
    }

    public function createFromDbRecord(object  $dbRecord): SupplierDto {
        $dto = $this->getNewDto();
        $dto->id = $dbRecord->id;
        $dto->companyName = $dbRecord->company_name;
        $dto->companyPhone = $dbRecord->company_phone;
        $dto->contactInformation = $dbRecord->contact_information;
        $dto->nit = $dbRecord->nit;
        $dto->email = $dbRecord->email;
        $dto->address = $dbRecord->address;
        $dto->municipalityId = $dbRecord->municipality_id;
        $dto->municipalityName = $dbRecord->municipality_name;
        $dto->departmentId = $dbRecord->department_id;
        $dto->departmentName = $dbRecord->department_name;
        $dto->countryId = $dbRecord->country_id;
        $dto->countryName = $dbRecord->country_name;
        $dto->statusId = $dbRecord->status_id;
        $dto->statusName = $dbRecord->status_name;
        $dto->userWhoCreatedId = $dbRecord->user_who_created_id;
        $dto->userWhoUpdatedId = $dbRecord->user_who_updated_id;
        $dto->createdAt = $dbRecord->created_at;
        $dto->updatedAt = $dbRecord->updated_at;
        return $dto;
    }

}
