<?php

namespace App\Services\Geographic;

use App\Interfaces\Repositories\Geographic\MunicipalityRepositoryInterface;
use App\Interfaces\Services\Geographic\MunicipalityServiceInterface;
use Illuminate\Support\Collection;

class MunicipalityService implements MunicipalityServiceInterface
{
    private array $errors = [];
    protected MunicipalityRepositoryInterface $municipalityRepo;

    public function __construct()
    {
        $this->municipalityRepo = app(MunicipalityRepositoryInterface::class);
    }

    public function getById(int $id): Collection
    {
        return $this->municipalityRepo->getById($id);
    }

    public function getMunicipalities()
    {
        return $this->municipalityRepo->getAll();
    }
}