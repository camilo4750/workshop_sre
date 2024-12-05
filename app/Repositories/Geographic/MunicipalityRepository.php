<?php

namespace App\Repositories\Geographic;

use App\Entities\Geographic\MunicipalityEntity;
use App\Interfaces\Repositories\Geographic\MunicipalityRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class MunicipalityRepository extends CoreRepository implements MunicipalityRepositoryInterface
{
    public function find(int $id): Collection
    {
        return MunicipalityEntity::find($id);
    }
}