<?php

namespace App\Repositories\System\user;

use App\Dto\user\userNewDto;
use App\Dto\user\userUpdateDto;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;
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

    public function store(userNewDto $userNewDto): static
    {
        $this->setNewEntity();
        $this->fillDto($userNewDto);
        $this->getEntity()->save();
        return $this;
    }

    public function getAllUsers(): Collection
    {
        return User::all();
    }

    public function update(userUpdateDto $userUpdateDto): static
    {
        $this->fillDto($userUpdateDto);
        $this->getEntity()->save();
        return $this;
    }
}
