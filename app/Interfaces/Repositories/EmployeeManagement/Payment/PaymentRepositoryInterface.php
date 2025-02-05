<?php

namespace App\Interfaces\Repositories\EmployeeManagement\Payment;

use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentDto;
use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentNewDto;
use App\Interfaces\Repositories\CoreRepositoryInterface;

interface PaymentRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll():array;

    public function getById(int $paymentId): EmployeePaymentDto;

    public function store(EmployeePaymentNewDto $dto): EmployeePaymentDto;
}
