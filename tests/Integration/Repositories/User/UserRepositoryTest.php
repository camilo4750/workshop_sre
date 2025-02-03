<?php

namespace Tests\Integration\Repositories\User;

use App\Dto\User\UserNewDto;
use App\Dto\User\UserUpdateDto;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Tests\BaseTest;

class UserRepositoryTest extends BaseTest
{

    /**
     * @test
     */
    public function is_store_repo()
    {
        $this->actingAs($this->user);

        $userData = User::factory()->make()->toArray();

        $userNewDto = new UserNewDto();
        $userNewDto->full_name = $userData['full_name'];
        $userNewDto->email = $userData['email'];
        $userNewDto->password = bcrypt('password');
        $userNewDto->phone = $userData['phone'];
        $userNewDto->active = $userData['active'];

        (App::make(UserRepositoryInterface::class))
            ->setUser($this->user)
            ->store($userNewDto);

        $this->assertNull(Session::get('errors'));

        $this->assertDatabaseHas('users', [
            'full_name' => $userData['full_name'],
            'email' => $userData['email'],
        ]);
    }


    /**
     * @test
     */
    public function is_update_repo()
    {
        $this->actingAs($this->user);

        $userData = User::factory()->make()->toArray();

        $userUpdateDto = new UserUpdateDto();
        $userUpdateDto->id = $this->user->id;
        $userUpdateDto->full_name = $userData['full_name'];
        $userUpdateDto->email = $userData['email'];
        $userUpdateDto->phone = $userData['phone'];
        $userUpdateDto->active = $userData['active'];

        (App::make(UserRepositoryInterface::class))
            ->setUser($this->user)
            ->update($userUpdateDto);

        $this->assertNull(Session::get('errors'));

        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'active' => $userData['active'],
        ]);
    }
}
