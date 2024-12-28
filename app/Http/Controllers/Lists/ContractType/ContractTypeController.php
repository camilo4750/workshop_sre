<?php

namespace App\Http\Controllers\Lists\ContractType;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\ContractType\ContractTypeServiceInterface;
use Illuminate\Http\JsonResponse;

class ContractTypeController
{
    protected $contractTypeService;

    public function __construct(
        ContractTypeServiceInterface $contractTypeService
    ) {
        $this->contractTypeService = $contractTypeService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista tipos de contrato',
                'data' => $this->contractTypeService->getContractTypes(),
            ];
        });
    }
}