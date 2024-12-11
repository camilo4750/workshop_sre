<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Supplier\SupplierServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SupplierController
{
    protected $supplierService;

    public function __construct(
        SupplierServiceInterface $supplierService
    ) {
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        return view('Supplier.index');
    }

    public function getSuppliers(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista de proveedores',
                'suppliers' => $this->supplierService->getSuppliers(),
            ];
        });
    }

    public function store(Request $request): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request) {
            (new SupplierControllerValidate())
                ->validateStoreRequest($request);

            $supplier = $this->supplierService
                ->store($request);

            return [
                'message' => 'Proveedor registrado exitosamente',
                'id' => $supplier->id,
            ];
        });
    }

    public function update(Request $request, int $supplierId): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request, $supplierId) {
            (new SupplierControllerValidate())
                ->validateUpdateRequest($request);

            $this->supplierService
                ->update($supplierId, $request);

            return [
                "message" => "Proveedor actualizado con exito"
            ];
        });
    }
}
