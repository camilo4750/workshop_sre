<?php 

namespace Tests\Integration\Repositories\User;

use App\Dto\user\UserNewDto;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Tests\BaseTest;

class UserRepositoryTest extends BaseTest 
{
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
}