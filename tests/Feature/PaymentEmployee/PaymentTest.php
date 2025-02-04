<?php

namespace Tests\Feature\PaymentEmployee;

use Tests\BaseTest;

class PaymentTest extends BaseTest
{
    /**
     * @test
     */
    public function is_get_all_working()
    {
        $this->actingAs($this->user);

        $response = $this->getJson(route('EmployeePayment.GetAll'));

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'data']);
    }
}
