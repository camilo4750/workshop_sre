<?php

namespace App\Http\Controllers\Supplier;

use App\Exceptions\RepositoryBaseException;
use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\services\Supplier\SupplierServiceInterface;
use App\Mapper\Supplier\SupplierNewDtoMapper;
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
            try {
                $supplierNewDto = (new SupplierNewDtoMapper())->createFormRequest($request->all());
                $this->supplierService->createSupplier($supplierNewDto);
                return [
                    'message' => 'Proveedor registrado exitosamente',
                ];
            } catch (\Exception $e) {
                throw new RepositoryBaseException("Fallo al crear ", $e->getCode(), $e);
            }
        });
    }
}


