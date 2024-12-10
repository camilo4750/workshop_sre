<?php

namespace Tests\Integration\Services\User;

use App\Interfaces\Services\User\UserServiceInterface;
use App\Mapper\user\UserNewDtoMapper;
use App\Mapper\User\UserUpdateDtoMapper;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Tests\BaseTest;

class UserServiceTest extends BaseTest
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function is_store_working()
    {
        $this->actingAs($this->user);

        $request = (new Request())->merge([
            'fullName' => 'Nombre de prueba 2',
            'email' => 'prueba3@workshop.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '53455653',
            'active' => 1,
        ]);

        (App::make(UserServiceInterface::class))
            ->store($request);

        $userNewDto = (App::make(UserNewDtoMapper::class))
            ->createFormRequest($request);

        (App::make(UserServiceInterface::class))
            ->storeUser($userNewDto);

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
    public function is_user_updating_correctly()
    {
        $this->actingAs($this->user);
        $existingUser = User::factory()->create([
            'full_name' => 'Nombre de prueba',
            'email' => 'prueba@workshop.com',
            'phone' => '12345678',
            'active' => 1,
        ]);

        $request = (new Request())->merge([
            'id' => $existingUser->id,
            'fullName' => 'Nombre de prueba actualizado',
            'email' => 'prueba_actualizada@workshop.com',
            'password' => 'nuevopassword',
            'password_confirmation' => 'nuevopassword',
            'phone' => '87654321',
            'active' => 1,
        ]);

        (App::make(UserServiceInterface::class))
            ->update($request);

        $userUpdateDto = (App::make(UserUpdateDtoMapper::class))
            ->createFormRequest($request);

        (App::make(UserServiceInterface::class))
            ->updateUser($userUpdateDto);

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
