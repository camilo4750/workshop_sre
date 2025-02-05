<?php

namespace App\Repositories\EmployeeManagement\Payment;

use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentDto;
use App\Entities\EmployeeManagement\Payment\PaymentEntity;
use App\Interfaces\Repositories\EmployeeManagement\Payment\PaymentRepositoryInterface;
use App\Mapper\EmployeeManagement\Payment\PaymentDtoMapper;
use App\Mapper\EmployeeManagement\Payment\PaymentTableDtoMapper;
use App\Repositories\CoreRepository;

class PaymentRepository extends CoreRepository implements PaymentRepositoryInterface
{
    public function getAll():array
    {
        $payments = PaymentEntity::query()
            ->select([
                'employee_payments.id',
                'employee_payments.start_period',
                'employee_payments.end_period',
                'payment_methods.name as payment_method',
                'employee_payments.overtime_total',
                'employee_payments.bonus',
                'payment_status.name as payment_status',
            ])
            ->leftJoin('payment_methods', 'employee_payments.payment_method_id', '=', 'payment_methods.id')
            ->leftJoin('payment_status', 'employee_payments.payment_status_id', '=', 'payment_status.id')
            ->get();

        return  $payments->map(function ($employee) {
            return (new PaymentTableDtoMapper())->createFromDbRecord($employee);
        })->toArray();
    }

    public function getById(int $paymentId): EmployeePaymentDto
    {
        $payment = PaymentEntity::query()
            ->select([
                'employee_payments.id',
                'employee_payments.employe_id',
                'employees.full_name as employee_name',
                'employee_payments.start_period',
                'employee_payments.end_period',
                'employee_payments.payment_method_id',
                'payment_methods.name as payment_method_name',
                'employee_payments.payment',
                'employee_payments.overtime_total',
                'employee_payments.overtime_payment',
                'employee_payments.bonus',
                'employee_payments.total_accrued',
                'employee_payments.payment_status_id',
                'payment_status.name as payment_status_name',
                'employee_payments.observations',
                'employee_payments.user_who_created_id',
                'user_created.full_name as user_created_name',
                'employee_payments.user_who_updated_id',
                'user_updated.full_name as user_updated_name',
                'employee_payments.created_at',
                'employee_payments.updated_at',
            ])
            ->leftJoin('employees', 'employee_payments.employe_id', '=', 'employees.id')
            ->leftJoin('payment_methods', 'employee_payments.payment_method_id', '=', 'payment_methods.id')
            ->leftJoin('payment_status', 'employee_payments.payment_status_id', '=', 'payment_status.id')
            ->leftJoin('users as user_created', 'employee_payments.user_who_created_id', '=', 'user_created.id')
            ->leftJoin('users as user_updated', 'employee_payments.user_who_updated_id', '=', 'user_updated.id')
            ->find($paymentId);

        return (new PaymentDtoMapper())->createFromDbRecord($payment);
    }
}
