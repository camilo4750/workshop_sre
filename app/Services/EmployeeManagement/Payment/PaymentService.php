<?php

namespace App\Services\EmployeeManagement\Payment;

use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentDto;
use App\Exceptions\EmployeeManagement\EmployeePayment\EmployeePaymentNotFoundException;
use App\Interfaces\Repositories\EmployeeManagement\Payment\PaymentRepositoryInterface;
use App\Interfaces\Services\EmployeeManagement\Payment\PaymentServiceInterface;
use App\Mapper\EmployeeManagement\Payment\PaymentDtoMapper;
use App\Mapper\EmployeeManagement\Payment\PaymentNewDtoMapper;
use Illuminate\Http\Request;

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

    public function getById(int $paymentId): EmployeePaymentDto
    {
        $payment = $this->paymentRepo->getById($paymentId);

        throw_if(
            !$payment,
            new EmployeePaymentNotFoundException()
        );

        return $payment;
    }

    public function store(Request $request): EmployeePaymentDto
    {
        $paymentDto = (new PaymentNewDtoMapper())
            ->createFormRequest($request);

        return $this->paymentRepo
            ->setUser(auth()->user())
            ->store($paymentDto);
    }
}
