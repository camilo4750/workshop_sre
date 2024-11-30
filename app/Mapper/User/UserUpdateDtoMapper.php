<?php

namespace App\Mapper\user;

use App\Dto\User\UserUpdateDto;
use App\Mapper\CoreMapper;
use Illuminate\Http\Request;

class UserUpdateDtoMapper extends CoreMapper
{
    protected function getNewDto(): UserUpdateDto
    {
        return new UserUpdateDto();
    }

    public function updateFormRequest(Request $request): UserUpdateDto
    {
        $dto = $this->getNewDto();
        $dto->id = $request['id'];
        $dto->name_1 = $request['firstName'];
        $dto->name_2 = $request['secondName'];
        $dto->surname_1 = $request['firstSurname'];
        $dto->surname_2 = $request['secondSurname'];
        $dto->phone = $request['telephone'];
        $dto->email = $request['email'];
        $dto->active = $request['isActive'];
        return $dto;
    }
}
