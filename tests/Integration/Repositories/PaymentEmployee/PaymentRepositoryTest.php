<?php

namespace Tests\Integration\Repositories\PaymentEmployee;

use App\Interfaces\Repositories\EmployeeManagement\Payment\PaymentRepositoryInterface;
use Illuminate\Support\Facades\App;
use Tests\BaseTest;

class PaymentRepositoryTest extends BaseTest
{
    /**
     * @test
     */
    public function is_get_employees_repo()
    {
        $this->actingAs($this->user);

        $employees = (App::make(PaymentRepositoryInterface::class))
            ->getAll();

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employee_payments', [
            'id' => $employees[0]->id,
        ]);
    }
}
