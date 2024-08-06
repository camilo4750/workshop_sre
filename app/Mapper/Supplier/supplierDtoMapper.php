<?php

namespace App\Mapper\Supplier;

use App\Dto\Supplier\supplierDto;
use App\Mapper\CoreMapper;

class supplierDtoMapper extends CoreMapper
{
    protected function getNewDto():supplierDto
    {
        return new supplierDto();
    }

    public function createFromDbRecord(array $data): supplierDto {
        $dto = $this->getNewDto();
        $dto->id = $data['id'];
        $dto->companyName = $data['company_name'];
        $dto->nit = $data['nit'];
        $dto->phoneCompany = $data['phone_company'];
        $dto->email = $data['email'];
        $dto->address = $data['address'];
        $dto->representative = $data['representative'];
        $dto->phoneRepresentative = $data['phone_representative'];
        $dto->active = $data['active'];
        $dto->userWhoCreatedId = $data['user_who_created_id'] ?? null;
        $dto->userWhoUpdatedId = $data['user_who_updated_id'] ?? null;
        $dto->userWhoDeletedId = $data['user_who_deleted_id'] ?? null;
        $dto->createdAt = $data['created_at'] ?? null;
        $dto->updatedAt = $data['updated_at'] ?? null;
        $dto->deletedAt = $data['deleted_at']  ?? null;
        return $dto;
    }

}
