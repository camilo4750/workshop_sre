<?php

namespace App\Mapper\user;

use App\Dto\User\UserNewDto;
use App\Mapper\CoreMapper;
use Illuminate\Http\Request;

class UserNewDtoMapper extends CoreMapper
{
    protected function getNewDto(): UserNewDto
    {
        return new UserNewDto();
    }

    public function createFormRequest(Request $request): UserNewDto  
    {
        $dto = $this->getNewDto();
        $dto->full_name = $request->get('fullName');
        $dto->phone = $request->get('phone');
        $dto->email = $request->get('email');
        $dto->password = $request->get('password');
        $dto->active = $request->get('active');
        return $dto;
    }
}
