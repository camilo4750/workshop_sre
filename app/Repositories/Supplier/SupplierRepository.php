<?php

namespace App\Repositories\Supplier;

use App\Dto\Supplier\supplierNewDto;
use App\Dto\Supplier\SupplierUpdateDto;
use App\Entities\Supplier\SupplierEntity;
use App\Interfaces\Repositories\Supplier\SupplierRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class SupplierRepository extends CoreRepository implements SupplierRepositoryInterface
{
    public function getById(int $id): ?SupplierEntity
    {
        $supplier = SupplierEntity::findOrFail($id);
        return $supplier;
    }

    public function findAll(): Collection
    {
        return SupplierEntity::query()
            ->select(
                'suppliers.*', 'municipalities.name as municipality_name', 'suppliers_status.name as status_name',
                'departments.id as department_id', 'departments.name as department_name', 'departments.country_id',
                'countries.id as country_id', 'countries.name as country_name'
                )
            ->leftJoin('municipalities', 'suppliers.municipality_id', '=', 'municipalities.id')
            ->leftJoin('departments', 'municipalities.department_id', '=', 'departments.id')
            ->leftJoin('countries', 'departments.country_id', '=', 'countries.id')
            ->leftJoin('suppliers_status', 'suppliers.status_id', '=', 'suppliers_status.id')
            ->orderBy('id')
            ->get();
    }

    public function store(supplierNewDto $dto): SupplierEntity
    {
        $userId = SupplierEntity::query()
            ->insertGetId([
                'company_name' => $dto->company_name,
                'company_phone' => $dto->company_phone,
                'contact_information' => $dto->contact_information,
                'nit' => $dto->nit,
                'address' => $dto->address,
                'email' => $dto->email,
                'municipality_id' => $dto->municipality_id,
                'status_id' => $dto->status_id,
                'user_who_created_id' => $this->user->id,
                'created_at' => 'now()'
            ]);

        return $this->getById($userId);
    }

    public function update(SupplierUpdateDto $dto): self
    {
        SupplierEntity::query()
            ->where("id", $dto->id)
            ->update([
                'company_name' => $dto->company_name,
                'company_phone' => $dto->company_phone,
                'contact_information' => $dto->contact_information,
                'nit' => $dto->nit,
                'address' => $dto->address,
                'email' => $dto->email,
                'municipality_id' => $dto->municipality_id,
                'status_id' => $dto->status_id,
                'user_who_updated_id' => $this->user->id,
                'updated_at' => 'now()'
            ]);

        return $this;
    }

    public function existByEmail(string $email): bool
    {
        return SupplierEntity::where('email', $email)->exists();
    }
}
