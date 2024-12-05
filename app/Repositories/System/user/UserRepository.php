<?php

namespace App\Repositories\System\user;

use App\Dto\User\UserNewDto;
use App\Dto\User\UserUpdateDto;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class UserRepository extends CoreRepository implements UserRepositoryInterface
{
    public function getById(int $id): ?User
    {
        $user = User::findOrFail($id);

        return $user;
    }

    public function store(UserNewDto $dto): ?User
    {
        $userId = User::query()
            ->insertGetId([
                'full_name' => $dto->full_name,
                'email' => $dto->email,
                'phone' => $dto->phone,
                'password' => bcrypt($dto->password),
                'active' => 1,
                'user_who_created_id' => $this->user->id,
                'created_at' => 'now()'
            ]);

        return $this->getById($userId);
    }

    public function getAllUsers(): Collection
    {
        return User::all();
    }

    public function existByEmail(string $email): bool
    {
        return User::where("email", $email)->exists();
    }

    public function update(UserUpdateDto $dto): self
    {
        User::query()
            ->where('id', '=', $dto->id)
            ->update([
                'full_name' => $dto->full_name,
                'email' => $dto->email,
                'phone' => $dto->phone,
                'active' => $dto->active,
                'user_who_updated_id' => $this->user->id,
                'updated_at' => now(),
            ]);
        
        return $this;
    }
}
