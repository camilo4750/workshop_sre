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

    /**
     * @test
     */
    public function is_get_by_id_service():void
    {
        $this->actingAs($this->user);

        $employee = (App::make(PaymentServiceInterface::class))
            ->getById(1);

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
        ]);
    }
}
