<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Supplier\SupplierStatusServiceInterface;
use Illuminate\Http\JsonResponse;

class SupplierStatusController
{
    protected $supplierStatusService;

    public function __construct(
        SupplierStatusServiceInterface $supplierStatusService
    ) {
        $this->supplierStatusService = $supplierStatusService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {    
            return [
                'message' => 'Listado status proveedores',
                'data' => $this->supplierStatusService->getAll(),
            ];
        });
    }
}
