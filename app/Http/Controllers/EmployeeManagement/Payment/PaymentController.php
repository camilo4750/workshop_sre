<?php

namespace App\Http\Controllers\EmployeeManagement\Payment;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\EmployeeManagement\Payment\PaymentServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    public function getById(int $paymentId): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($paymentId) {
            return [
                'message' => 'Información del pago',
                'data' => $this->paymentService->getById($paymentId),
            ];
        });
    }

    public function store(Request $request): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request) {
            (new PaymentControllerValidate())
                ->validateStoreRequest($request);

            $payment = $this->paymentService
                ->store($request);

            return [
                'message' => 'Pago registrado exitosamente',
                'id' => $payment->id,
            ];
        });
    }

    public function update(Request $request, int $paymentId): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request, $paymentId) {
            (new PaymentControllerValidate)
                ->validateUpdateRequest($request);

            $this->paymentService
                ->update($request, $paymentId);

            return [
                'message' => 'Pago Actualizado exitosamente',
            ];
        });
    }
}
