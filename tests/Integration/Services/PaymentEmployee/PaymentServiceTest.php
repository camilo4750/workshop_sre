<?php

namespace Tests\Integration\Services\PaymentEmployee;

use Illuminate\Support\Facades\App;
use App\Interfaces\Services\EmployeeManagement\Payment\PaymentServiceInterface;
use Tests\BaseTest;

class PaymentServiceTest extends BaseTest
{
    /**
     * @test
     */
    public function is_get_employee_service()
    {
        $this->actingAs($this->user);

        $employees = (App::make(PaymentServiceInterface::class))
            ->getAll();

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employees', [
            'id' => $employees[0]->id,
        ]);
    }
}
