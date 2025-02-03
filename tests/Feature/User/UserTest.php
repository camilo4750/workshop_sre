<?php

namespace Tests\Feature\User;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Tests\BaseTest;

class UserTest extends BaseTest
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function is_store_working(): void
    {
        $this->actingAs($this->user);

        $userData = User::factory()->make()->toArray();

        $response = $this->post(route('User.Create'), [
            'fullName' => $userData['full_name'],
            'email' => $userData['email'],
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => $userData['phone'],
            'active' => $userData['active'],
        ]);

        $response->assertStatus(200);
        $this->assertNull(session('errors'));
        $response->assertJsonStructure(['success', 'message']);

        $this->assertDatabaseHas('users', [
            'full_name' => $userData['full_name'],
            'email' => $userData['email'],
        ]);
    }


    /**
     * @test
     */
    public function is_update_working()
    {
        $this->actingAs($this->user);

        $userData = User::factory()->make()->toArray();

        $response = $this->post(route('User.Update', ['userId' => $this->user->id]), [
            'fullName' => $userData['full_name'],
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'active' => $userData['active'],
        ]);

        $response->assertStatus(200);
        $this->assertNull(session('errors'));
        $response->assertJsonStructure(['success', 'message']);

        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'full_name' => $userData['full_name'],
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'active' => $userData['active'],
        ]);
    }
}
