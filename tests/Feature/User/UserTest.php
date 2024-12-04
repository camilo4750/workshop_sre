<?php

namespace Tests\Feature\User;

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
}
