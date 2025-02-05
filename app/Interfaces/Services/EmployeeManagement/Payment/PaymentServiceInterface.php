<?php

namespace App\Interfaces\Services\EmployeeManagement\Payment;

use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentDto;

interface PaymentServiceInterface
{
    public function getAll():array;

    public function getById(int $paymentId): EmployeePaymentDto;
}
