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

    /**
     * @test
     */
    public function is_get_by_id_working():void
    {
        $this->actingAs($this->user);

        $response = $this->getJson(route('EmployeePayment.GetById', ['paymentId' => 1]));

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'data']);
    }
}
