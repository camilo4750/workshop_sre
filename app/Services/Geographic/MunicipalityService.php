<?php

namespace App\Services\Geographic;

use App\Interfaces\Repositories\Geographic\MunicipalityRepositoryInterface;
use App\Interfaces\Services\Geographic\MunicipalityServiceInterface;

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
        return $this->municipalityRepo->find($id);
    }

    public function getMunicipalities()
    {
        return $this->municipalityRepo->getAll();
    }
}