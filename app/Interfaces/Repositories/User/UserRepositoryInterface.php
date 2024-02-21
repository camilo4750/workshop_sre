<?php

namespace App\Interfaces\Repositories\User;

use App\Dto\user\userNewDto;
use App\Interfaces\Repositories\CoreRepositoryInterface;

interface UserRepositoryInterface extends CoreRepositoryInterface
{
    public function store(userNewDto $userNewDto);
}
