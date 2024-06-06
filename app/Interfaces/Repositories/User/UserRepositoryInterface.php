<?php

namespace App\Interfaces\Repositories\User;

use App\Dto\user\userNewDto;
use App\Dto\user\userUpdateDto;
use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface UserRepositoryInterface extends CoreRepositoryInterface
{
    public function store(userNewDto $userNewDto): static;

    public function findAllUsers(): Collection;

    public function update(userUpdateDto $userUpdateDto): static;
}
