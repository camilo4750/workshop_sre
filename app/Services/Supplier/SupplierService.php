<?php

namespace App\Services\Supplier;

use App\Dto\Supplier\supplierNewDto;
use App\Dto\Supplier\SupplierUpdateDto;
use App\Entities\Supplier\SupplierEntity;
use App\Exceptions\Supplier\CustomValidationException;
use App\Exceptions\Supplier\SupplierNotFoundException;
use App\Interfaces\Repositories\Supplier\SupplierRepositoryInterface;
use App\Interfaces\Services\Supplier\SupplierServiceInterface;
use App\Mapper\Supplier\SupplierDtoMapper;
use App\Mapper\Supplier\SupplierNewDtoMapper;
use App\Mapper\Supplier\SupplierUpdateDtoMapper;
use Illuminate\Http\Request;

class SupplierService implements SupplierServiceInterface
{
    private array $errors = [];
    protected SupplierRepositoryInterface $supplierRepo;

    public function __construct()
    {
        $this->supplierRepo = app(SupplierRepositoryInterface::class);
    }

    public function getSuppliers(): array
    {
        $suppliers = $this->supplierRepo->findAll();

        throw_if(
            $suppliers->isEmpty(),
            new SupplierNotFoundException(
                message: 'Proveedores no encontrados en el sistema'
            )
        );

        return $suppliers->map(function ($supplier) {
            return (new SupplierDtoMapper)->createFromDbRecord($supplier);
        })->toArray();
    }

    public function store(Request $request): SupplierEntity
    {
        $existByEmail = $this->supplierRepo->existByEmail($request->email);

        if ($existByEmail)
            $this->errors['email'] = 'Correo ya se encuentra registrado en el sistema.';

        throw_if(
            !empty($this->errors),
            new CustomValidationException($this->errors)
        );

        $supplier = $this->storeSupplier(
            (new SupplierNewDtoMapper())->createFormRequest($request)
        );

        return $supplier;
    }

    public function storeSupplier(SupplierNewDto $dto): SupplierEntity
    {
        return $this->supplierRepo
            ->setUser(auth()->user())
            ->store($dto);
    }

    public function update(int $supplierId, Request $request): self
    {
        $supplier = $this->supplierRepo->getById($supplierId);

        if (
            $supplier->email !== $request->get('email') &&
            $this->supplierRepo->existByEmail($request->get('email'))
        ) {
            $this->errors['email'] = 'Correo ya se encuentra registrado en el sistema.';
        }

        throw_if(
            !empty($this->errors),
            new CustomValidationException($this->errors)
        );

        $dto = (new SupplierUpdateDtoMapper())->createFromRequest($request);
        $dto->id = $supplierId;

        $this->updateSupplier($dto);

        return $this;
    }

    public function updateSupplier(SupplierUpdateDto $dto): object
    {
        return $this->supplierRepo
            ->setUser(auth()->user())
            ->update($dto);
    }
}
