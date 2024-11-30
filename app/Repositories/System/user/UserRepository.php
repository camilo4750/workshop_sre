<?php

namespace App\Repositories\System\user;

use App\Dto\User\UserNewDto;
use App\Dto\User\UserUpdateDto;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class UserRepository extends CoreRepository implements UserRepositoryInterface
{
    /**
     * @return User
     */
    public function getNewEntity()
    {
        return new User();
    }

    public function getById(int $id): ?User
    {
        $user = User::findOrFail($id);

        return $user;
    }

    public function store(UserNewDto $dto): ?User
    {
        $this->setNewEntity();
        $this->fillDto($dto);
        $this->getEntity()->save();
        return $this->getById(
            $this->getEntity()->id
        );
    }

    public function getAllUsers(): Collection
    {
        return User::all();
    }

    public function existByEmail(string $email): bool
    {
        return User::where("email", $email)->exists();
    }

    public function update(UserUpdateDto $userUpdateDto): static
    {
        $this->fillDto($userUpdateDto);
        $this->getEntity()->save();
        return $this;
    }
}
