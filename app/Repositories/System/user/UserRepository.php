<?php

namespace App\Repositories\System\user;

use App\Dto\user\userNewDto;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Mapper\users\userNewDtoMapper;
use App\Repositories\CoreRepository;
use App\User;

class UserRepository extends CoreRepository implements UserRepositoryInterface
{
    /**
     * @return User
     */
    public function getNewEntity()
    {
        return new User();
    }

    public function store(userNewDto $userNewDto)
    {
        $this->setNewEntity();
        $this->fillDto($userNewDto);
        $this->getEntity()->save();
        return $this;
    }

    public function findUserByEmail($email)
    {
        return $this->newQuery()->where('email', '=', "$email")->get();
    }

    public function findAllUsers()
    {
        return $this->newQuery()->selectRaw('*')->get();
    }
}
