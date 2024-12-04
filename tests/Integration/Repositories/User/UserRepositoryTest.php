<?php

namespace Tests\Integration\Repositories\User;

use App\Dto\user\UserNewDto;
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

        $userNewDto = new UserNewDto();
        $userNewDto->full_name = "Nombre de prueba 2";
        $userNewDto->email = "prueba3@workshop.com";
        $userNewDto->password = bcrypt('password');
        $userNewDto->phone = "53455653";
        $userNewDto->active = 1;

        (App::make(UserRepositoryInterface::class))
            ->setUser($this->user)
            ->store($userNewDto);

        $this->assertNull(Session::get('errors'));

        $this->assertDatabaseHas('users', [
            'full_name' => 'Nombre de prueba 2',
            'email' => 'prueba3@workshop.com',
            'phone' => '53455653',
            'active' => 1,
        ]);
    }


    /**
     * @test
     */
    public function is_update_repo()
    {
        $this->actingAs($this->user);

        $existingUser = User::factory()->create([
            'full_name' => 'Nombre de prueba',
            'email' => 'prueba@workshop.com',
            'phone' => '12345678',
            'active' => 1,
        ]);

        $userUpdateDto = new UserUpdateDto();
        $userUpdateDto->id = $existingUser->id;
        $userUpdateDto->full_name = "Nombre de prueba actualizado";
        $userUpdateDto->email = "prueba_actualizada@workshop.com";
        $userUpdateDto->phone = "87654321";
        $userUpdateDto->active = 1;

        (App::make(UserRepositoryInterface::class))
            ->setUser($this->user)
            ->update($userUpdateDto);

        $this->assertNull(Session::get('errors'));

        $this->assertDatabaseHas('users', [
            'id' => $existingUser->id,
            'full_name' => 'Nombre de prueba actualizado',
            'email' => 'prueba_actualizada@workshop.com',
            'phone' => '87654321',
            'active' => 1,
        ]);
    }
}
