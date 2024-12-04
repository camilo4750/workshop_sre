<?php

namespace Tests\Integration\Services\User;

use App\Interfaces\services\User\UserServiceInterface;
use App\Mapper\user\UserNewDtoMapper;
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
}