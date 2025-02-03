<?php

namespace Tests\Integration\Services\User;

use App\Interfaces\Services\User\UserServiceInterface;
use App\Mapper\User\UserNewDtoMapper;
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
    public function is_store_service()
    {
        $this->actingAs($this->user);

        $userData = User::factory()->make()->toArray();

        $request = (new Request())->merge([
            'fullName' => $userData['full_name'],
            'email' => $userData['email'],
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => $userData['phone'],
            'active' => $userData['active'],
        ]);

        $userNewDto = (App::make(UserNewDtoMapper::class))
            ->createFormRequest($request);

        (App::make(UserServiceInterface::class))
            ->storeUser($userNewDto);

        $this->assertNull(Session::get('errors'));

        $this->assertDatabaseHas('users', [
            'full_name' => $userData['full_name'],
            'email' => $userData['email'],
        ]);
    }


    /**
     * @test
     */
    public function is_user_updating_service()
    {
        $this->actingAs($this->user);

        $userData = User::factory()->make()->toArray();

        $request = (new Request())->merge([
            'id' => $this->user->id,
            'fullName' => $userData['full_name'],
            'email' => $userData['email'],
            'password' => 'nuevopassword',
            'password_confirmation' => 'nuevopassword',
            'phone' => $userData['phone'],
            'active' => $userData['active'],
        ]);

        $userUpdateDto = (App::make(UserUpdateDtoMapper::class))
            ->createFormRequest($request);

        $userUpdateDto->id = $this->user->id;

        (App::make(UserServiceInterface::class))
            ->updateUser($userUpdateDto);

        $this->assertNull(Session::get('errors'));

        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'full_name' => $userData['full_name'],
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'active' => $userData['active'],
        ]);
    }
}
