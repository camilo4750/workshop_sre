<?php

namespace App\Http\Controllers\Lists\PaymentMethod;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\PaymentMethod\PaymentMethodServiceInterface;
use Illuminate\Http\JsonResponse;

class PaymentMethodController
{
    protected $paymentMethodService;

    public function __construct(
        PaymentMethodServiceInterface $paymentMethodService
    ) {
        $this->paymentMethodService = $paymentMethodService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista metodos de pago',
                'data' => $this->paymentMethodService->getAll(),
            ];
        });
    }
}