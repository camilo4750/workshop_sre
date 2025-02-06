<?php

namespace Tests\Integration\Repositories\PaymentEmployee;

use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentNewDto;
use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentUpdateDto;
use App\Entities\EmployeeManagement\Payment\PaymentEntity;
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

    /**
     * @test
     */
    public function is_get_by_id_repo():void
    {
        $this->actingAs($this->user);

        $employee = (App::make(PaymentRepositoryInterface::class))
            ->getById(1);

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employee_payments', [
            'id' => $employee->id,
        ]);
    }

    /**
     * @test
     */
    public function is_store_repo():void
    {
        $this->actingAs($this->user);

        $paymentData = PaymentEntity::factory()->make()->toArray();

        $employeePaymentNewDto = new EmployeePaymentNewDto();
        $employeePaymentNewDto->employee_id = $paymentData['employee_id'];
        $employeePaymentNewDto->start_period = $paymentData['start_period'];
        $employeePaymentNewDto->end_period = $paymentData['end_period'];
        $employeePaymentNewDto->payment_method_id = $paymentData['payment_method_id'];
        $employeePaymentNewDto->payment = $paymentData['payment'];
        $employeePaymentNewDto->overtime_total = $paymentData['overtime_total'];
        $employeePaymentNewDto->overtime_payment = $paymentData['overtime_payment'];
        $employeePaymentNewDto->bonus = $paymentData['bonus'];
        $employeePaymentNewDto->total_accrued = $paymentData['total_accrued'];
        $employeePaymentNewDto->payment_status_id = $paymentData['payment_status_id'];
        $employeePaymentNewDto->observations = $paymentData['observations'];

        (App::make(PaymentRepositoryInterface::class))
            ->setUser($this->user)
            ->store($employeePaymentNewDto);

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employee_payments', [
            'employee_id' => $paymentData['employee_id'],
            'start_period' => $paymentData['start_period'],
        ]);
    }

    /**
     * @test
     */
    public function is_update_repo():void
    {
        $this->actingAs($this->user);

        $paymentData = PaymentEntity::factory()->make()->toArray();

        $employeePaymentUpdateDto = new EmployeePaymentUpdateDto();
        $employeePaymentUpdateDto->id = 1;
        $employeePaymentUpdateDto->employee_id = $paymentData['employee_id'];
        $employeePaymentUpdateDto->start_period = $paymentData['start_period'];
        $employeePaymentUpdateDto->end_period = $paymentData['end_period'];
        $employeePaymentUpdateDto->payment_method_id = $paymentData['payment_method_id'];
        $employeePaymentUpdateDto->payment = $paymentData['payment'];
        $employeePaymentUpdateDto->overtime_total = $paymentData['overtime_total'];
        $employeePaymentUpdateDto->overtime_payment = $paymentData['overtime_payment'];
        $employeePaymentUpdateDto->bonus = $paymentData['bonus'];
        $employeePaymentUpdateDto->total_accrued = $paymentData['total_accrued'];
        $employeePaymentUpdateDto->payment_status_id = $paymentData['payment_status_id'];
        $employeePaymentUpdateDto->observations = $paymentData['observations'];

        (App::make(PaymentRepositoryInterface::class))
            ->setUser($this->user)
            ->update($employeePaymentUpdateDto);

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employee_payments', [
            'id' => 1,
            'employee_id' => $paymentData['employee_id'],
            'start_period' => $paymentData['start_period'],
        ]);
    }
}
