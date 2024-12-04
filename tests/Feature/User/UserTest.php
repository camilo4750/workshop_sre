<?php

namespace Tests\Feature\User;

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
    public function is_store_working()
    {
        $this->actingAs($this->user);
        $response = $this->post(route('User.Create'), [
            'fullName' => 'Nombre de prueba 2',
            'email' => 'prueba2@workshop.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '53455653',
            'active' => 1,
        ]);

        $response->assertStatus(200);
        $this->assertNull(Session::get('errors'));
        $response->assertJsonStructure(['success', 'message']);

        $this->assertDatabaseHas('users', [
            'full_name' => 'Nombre de prueba 2',
            'email' => 'prueba2@workshop.com',
            'phone' => '53455653',
            'active' => 1,
        ]);
    }


    /**
     * @test
     */
    public function is_update_working()
    {
        $user = User::factory()->create([
            'full_name' => 'Nombre Original',
            'email' => 'original@workshop.com',
            'phone' => '12345678',
            'active' => 1,
        ]);

        $this->actingAs($this->user);
        $response = $this->post(route('User.Update', $user->id), [
            'full_name' => 'Nombre Actualizado',
            'email' => 'prueba@workshop.com',
            'phone' => '34344444',
            'active' => 1,
        ]);

        $response->assertStatus(200);
        $this->assertNull(Session::get('errors'));
        $response->assertJsonStructure(['success', 'message']);

        $this->assertDatabaseHas('users', [
            'full_name' => 'Nombre Actualizado',
            'email' => 'prueba2@workshop.com',
            'phone' => '34344444',
            'active' => 1,
        ]);
    }
}
