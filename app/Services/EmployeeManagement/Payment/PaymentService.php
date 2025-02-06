<?php

namespace App\Services\EmployeeManagement\Payment;

use App\Dto\EmployeeManagement\Employee\EmployeeUpdateDto;
use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentDto;
use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentUpdateDto;
use App\Exceptions\EmployeeManagement\EmployeePayment\EmployeePaymentNotFoundException;
use App\Interfaces\Repositories\EmployeeManagement\Payment\PaymentRepositoryInterface;
use App\Interfaces\Services\EmployeeManagement\Payment\PaymentServiceInterface;
use App\Mapper\EmployeeManagement\Payment\PaymentDtoMapper;
use App\Mapper\EmployeeManagement\Payment\PaymentNewDtoMapper;
use App\Mapper\EmployeeManagement\Payment\PaymentUpdateDtoMapper;
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

    public function update(Request $request, int $paymentId): static
    {
        $payment = $this->paymentRepo
            ->getById($paymentId);

        throw_if(
            !$payment,
            new EmployeePaymentNotFoundException()
        );

        $paymentDto = (new PaymentUpdateDtoMapper())
            ->createFromRequest($request);
        $paymentDto->id = $paymentId;

        return $this->updatePayment($paymentDto);
    }
    public function updatePayment(EmployeePaymentUpdateDto $dto): static
    {
        $this->paymentRepo
            ->setUser(auth()->user())
            ->update($dto);

        return $this;
    }
}
