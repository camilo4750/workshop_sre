<?php

namespace App\Interfaces\Services\Geographic;

interface MunicipalityServiceInterface 
{
    public function getMunicipality(int $id);

    public function getMunicipalities();
}