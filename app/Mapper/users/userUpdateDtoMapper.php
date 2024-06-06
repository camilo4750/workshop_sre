<?php

namespace App\Mapper\users;

use App\Dto\user\userUpdateDto;
use App\Mapper\CoreMapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userUpdateDtoMapper extends CoreMapper
{
    protected function getNewDto(): userUpdateDto
    {
        return new userUpdateDto();
    }

    public function updateFormRequest(Request $request)
    {
        $dto = $this->getNewDto();
        $dto->id = $request['id'];
        $dto->name_1 = $request['firstName'];
        $dto->name_2 = $request['secondName'];
        $dto->surname_1 = $request['firstSurname'];
        $dto->surname_2 = $request['secondSurname'];
        $dto->phone = $request['telephone'];
        $dto->type_user_id = $request['typeUser'];
        $dto->email = $request['email'];
        $dto->active = $request['isActive'];
        return $dto;
    }
}
