<?php

namespace App\Interfaces\Services\Geographic;

use Illuminate\Support\Collection;

interface MunicipalityServiceInterface 
{
    public function getById(int $id): Collection;

    public function getMunicipalities();
}