<?php

namespace App\Repositories\Geographic;

use App\Entities\Geographic\MunicipalityEntity;
use App\Interfaces\Repositories\Geographic\MunicipalityRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class MunicipalityRepository extends CoreRepository implements MunicipalityRepositoryInterface
{
    public function getById(int $id): Collection
    {
        return MunicipalityEntity::query()
        ->where('department_id' ,'=', $id)
        ->select('id', 'name', 'code')
        ->get();
    }

    public function getAll(): Collection
    {
        return MunicipalityEntity::all();
    }
}