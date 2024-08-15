<?php

namespace App\Http\Controllers\Supplier;

use App\Exceptions\RepositoryBaseException;
use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\services\Supplier\SupplierServiceInterface;
use App\Mapper\Supplier\SupplierNewDtoMapper;
use App\Mapper\Supplier\SupplierUpdateDtoMapper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SupplierController
{
    /**
     * @var SupplierServiceInterface
     */
    protected $supplierService;

    public function __construct(
        SupplierServiceInterface $supplierService
    )
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        return view('Supplier.index');
    }

    public function allSuppliers(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista de proveedores',
                'suppliers' => $this->supplierService->getAllSuppliers()
            ];
        });
    }

    public function store(Request $request): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request) {
            (new SupplierControllerValidate())->validateForm($request);

            $supplierNewDto = (new SupplierNewDtoMapper())->createFormRequest($request->all());
            $this->supplierService->createSupplier($supplierNewDto);
            return [
                'message' => 'Proveedor registrado exitosamente',
            ];
        });
    }

    public function toggleStatus(Request $request): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request) {
            $this->supplierService->toggleStatus(
                $request->input('active'),
                $request->input('supplierId')
            );
            return [
                "message" => 'Cambio de estado exitoso',
            ];
        });
    }

    public function update(Request $request): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request) {
            (new SupplierControllerValidate())->validateForm($request);
            $supplierUpdateDto = (new SupplierUpdateDtoMapper())->createFormRequest($request);
            $this->supplierService->update(
                $supplierUpdateDto,
                $request->input('id')
            );
            return [
                $this->supplierService
            ];
        });
    }
}


