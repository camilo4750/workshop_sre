<?php

namespace App\Repositories\EmployeeManagement\Payment;

use App\Entities\EmployeeManagement\Payment\PaymentEntity;
use App\Interfaces\Repositories\EmployeeManagement\Payment\PaymentRepositoryInterface;
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
}
