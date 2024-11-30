<?php

namespace App\Mapper\user;

use App\Dto\User\UserDto;
use App\Mapper\CoreMapper;

class UserDtoMapper extends CoreMapper
{
    protected function getNewDto(): UserDto
    {
        return new UserDto();
    }

    public function createFromDbRecord(object  $dbRecord): UserDto
    {
        $dto = $this->getNewDto();
        $dto->fullName = $dbRecord->full_name;
        $dto->phone = $dbRecord->phone;
        $dto->email = $dbRecord->email;
        $dto->active = $dbRecord->active;
        $dto->createAt = $dbRecord->created_at;
        return $dto;
    }
}
