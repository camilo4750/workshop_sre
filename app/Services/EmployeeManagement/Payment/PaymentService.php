<?php

namespace App\Services\EmployeeManagement\Payment;

use App\Exceptions\EmployeeManagement\EmployeePayment\EmployeePaymentNotFoundException;
use App\Interfaces\Repositories\EmployeeManagement\Payment\PaymentRepositoryInterface;
use App\Interfaces\Services\EmployeeManagement\Payment\PaymentServiceInterface;

class PaymentService implements PaymentServiceInterface
{
    private array $errors = [];
    protected PaymentRepositoryInterface $paymentRepo;

    public function __construct()
    {
        $this->paymentRepo = app(PaymentRepositoryInterface::class);
    }
    public function getAll():array
    {
        $payments = $this->paymentRepo->getAll();

        throw_if(
            count($payments) === 0,
            new EmployeePaymentNotFoundException(
                message: 'Pagos no encontrados en el sistema'
            )
        );

        return $payments;
    }
}
