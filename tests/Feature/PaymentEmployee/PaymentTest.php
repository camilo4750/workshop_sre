<?php

namespace Tests\Feature\PaymentEmployee;

use App\Entities\EmployeeManagement\Payment\PaymentEntity;
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

    /**
     * @test
     */
    public function is_store_working():void
    {
        $this->actingAs($this->user);

        $paymentData = PaymentEntity::factory()->make()->toArray();

        $response = $this->postJson(route('EmployeePayment.Store'), [
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

        $response->assertStatus(200);
        $this->assertNull(session('errors'));
        $response->assertJsonStructure(['message', 'id']);

        $this->assertDatabaseHas('employee_payments', [
            'employee_id' => $paymentData['employee_id'],
            'start_period' => $paymentData['start_period'],
        ]);
    }

    /**
     * @test
     */
    public function is_update_working():void
    {
        $this->actingAs($this->user);

        $paymentData = PaymentEntity::factory()->make()->toArray();

        $response = $this->postJson(route('EmployeePayment.Update', ['paymentId' => 1]), [
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


        $response->assertStatus(200);
        $this->assertNull(session('errors'));
        $response->assertJsonStructure(['success', 'message']);

        $this->assertDatabaseHas('employee_payments', [
            'employee_id' => $paymentData['employee_id'],
            'start_period' => $paymentData['start_period'],
            'end_period' => $paymentData['end_period'],
            'payment_method_id' => $paymentData['payment_method_id'],
            'payment' => $paymentData['payment'],
            'overtime_total' => $paymentData['overtime_total'],
            'overtime_payment' => $paymentData['overtime_payment'],
            'bonus' => $paymentData['bonus'],
            'total_accrued' => $paymentData['total_accrued'],
            'payment_status_id' => $paymentData['payment_status_id'],
            'observations' => $paymentData['observations'],
        ]);
    }
}
