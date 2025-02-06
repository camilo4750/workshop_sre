<?php

namespace App\Interfaces\Services\EmployeeManagement\Payment;

use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentDto;
use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentUpdateDto;
use Illuminate\Http\Request;

interface PaymentServiceInterface
{
    public function getAll():array;

    public function getById(int $paymentId): EmployeePaymentDto;

    public function store(Request $request): EmployeePaymentDto;

    public function update(Request $request, int $paymentId): static;

    public function updatePayment(EmployeePaymentUpdateDto $dto): static;

}
