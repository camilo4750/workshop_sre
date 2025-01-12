<?php

namespace App\Entities\EmployeeManagement\Payment;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'employee_payments';
}