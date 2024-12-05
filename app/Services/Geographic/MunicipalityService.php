<?php

namespace App\Services\Geographic;

use App\Interfaces\Repositories\Geographic\MunicipalityRepositoryInterface;
use App\Interfaces\services\Geographic\MunicipalityServiceInterface;

class MunicipalityService implements MunicipalityServiceInterface
{
    private array $errors = [];
    protected MunicipalityRepositoryInterface $municipalityRepo;

    public function __construct()
    {
        $this->municipalityRepo = app(MunicipalityRepositoryInterface::class);
    }

    public function getMunicipality(int $id)
    {
        $municipality = $this->municipalityRepo->find($id);
    }
}