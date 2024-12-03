<?php

namespace App\Mapper\User;

use App\Dto\User\UserUpdateDto;
use App\Mapper\CoreMapper;
use Illuminate\Http\Request;

class UserUpdateDtoMapper extends CoreMapper
{
    protected function getNewDto(): UserUpdateDto
    {
        return new UserUpdateDto();
    }

    public function createFromRequest(Request $request): UserUpdateDto
    {
        $dto = $this->getNewDto();
        $dto->full_name = $request->get('fullName');
        $dto->phone = $request->get('phone');
        $dto->email = $request->get('email');
        $dto->active = $request->get('active');
        return $dto;
    }
}
