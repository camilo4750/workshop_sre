<?php

namespace App\Http\Controllers\Lists\PaymentStatus;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\PaymentStatus\PaymentStatusServiceInterface;
use Illuminate\Http\JsonResponse;

class PaymentStatusController
{
    protected $paymentStatusService;

    public function __construct(
        PaymentStatusServiceInterface $paymentStatusService
    ) {
        $this->paymentStatusService = $paymentStatusService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista estados de pago',
                'data' => $this->paymentStatusService->getAll(),
            ];
        });
    }
}