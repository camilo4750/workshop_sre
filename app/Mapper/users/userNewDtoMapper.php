<?php

namespace App\Mapper\users;

use App\Dto\user\userNewDto;
use App\Mapper\CoreMapper;
use Illuminate\Http\Request;

class userNewDtoMapper extends CoreMapper
{
    protected function getNewDto():userNewDto
    {
        return new userNewDto();
    }

    public function createFormRequest($request, $password)
    {
        $dto = $this->getNewDto();
        $dto->name_1 = $request['firstName'];
        $dto->name_2 = $request['secondName'];
        $dto->surname_1 = $request['firstSurname'];
        $dto->surname_2 = $request['secondSurname'];
        $dto->phone = $request['telephone'];
        $dto->type_user_id = $request['typeUser'];
        $dto->email = $request['email'];
        $dto->password = $password;
        $dto->active = $request['isActive'];
        return $dto;
    }
}
