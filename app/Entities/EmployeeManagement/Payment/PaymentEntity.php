<?php

namespace App\Entities\EmployeeManagement\Payment;

use App\Entities\CoreEntity;
use Database\Factories\EmployeePaymentFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'employee_payments';

    protected static function newFactory(): EmployeePaymentFactory|Factory
    {
        return EmployeePaymentFactory::new();
    }
}
