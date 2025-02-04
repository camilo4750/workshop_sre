<?php

namespace App\Http\Controllers\EmployeeManagement\Payment;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\EmployeeManagement\Payment\PaymentServiceInterface;
use Illuminate\Http\JsonResponse;

class PaymentController
{
    protected $paymentService;

    public function __construct(
        PaymentServiceInterface $paymentService
    ) {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return view('EmployeeManagement.Payment.index');
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista de empleados',
                'data' => $this->paymentService->getAll(),
            ];
        });
    }
}
