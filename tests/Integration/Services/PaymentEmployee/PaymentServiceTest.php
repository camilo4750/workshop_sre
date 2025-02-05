<?php

namespace Tests\Integration\Services\PaymentEmployee;

use App\Entities\EmployeeManagement\Payment\PaymentEntity;
use App\Mapper\EmployeeManagement\Payment\PaymentNewDtoMapper;
use Illuminate\Http\Request;
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

    /**
     * @test
     */
    public function is_store_service():void
    {
        $this->actingAs($this->user);

        $paymentData = PaymentEntity::factory()->make()->toArray();

        $request = (new Request())->merge([
            'employeeId' => $paymentData['employee_id'],
            'startPeriod' => $paymentData['start_period'],
            'endPeriod' => $paymentData['end_period'],
            'paymentMethodId' => $paymentData['payment_method_id'],
            'payment' => $paymentData['payment'],
            'overtimeTotal' => $paymentData['overtime_total'],
            'overtimePayment' => $paymentData['overtime_payment'],
            'bonus' => $paymentData['bonus'],
            'totalAccrued' => $paymentData['total_accrued'],
            'paymentStatusId' => $paymentData['payment_status_id'],
            'observations' => $paymentData['observations'],
        ]);

        $payment = (App::make(PaymentServiceInterface::class))
            ->store($request);

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employee_payments', [
            'employee_id' => $paymentData['employee_id'],
            'start_period' => $paymentData['start_period'],
        ]);
    }
}
