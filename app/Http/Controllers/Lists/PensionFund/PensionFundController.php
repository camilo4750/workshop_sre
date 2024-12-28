<?php

namespace App\Http\Controllers\Lists\PensionFund;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\PensionFund\PensionFundServiceInterface;
use Illuminate\Http\JsonResponse;

class PensionFundController
{
    protected $pensionFundService;

    public function __construct(
        PensionFundServiceInterface $pensionFundService
    ) {
        $this->pensionFundService = $pensionFundService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista fondos de pensiones',
                'data' => $this->pensionFundService->getPensionFunds(),
            ];
        });
    }
}