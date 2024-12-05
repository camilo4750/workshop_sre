<?php

namespace App\Interfaces\Repositories\Geographic;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface MunicipalityRepositoryInterface extends CoreRepositoryInterface
{
    public function find(int $id): Collection;
}
