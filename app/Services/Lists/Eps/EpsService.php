<?php

namespace App\Services\Lists\Eps;

use App\Interfaces\Repositories\Lists\Eps\EpsRepositoryInterface;
use App\Interfaces\Services\Lists\Eps\EpsServiceInterface;
use Illuminate\Support\Collection;

class EpsService implements EpsServiceInterface
{
    private array $errors = [];
    protected EpsRepositoryInterface $epsRepo;

    public function __construct()
    {
        $this->epsRepo = app(EpsRepositoryInterface::class);
    }


    public function getEps(): Collection
    {
        return $this->epsRepo->getAll();
    }
}