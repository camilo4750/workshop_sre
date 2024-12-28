<?php

namespace App\Services\Lists\Arl;

use App\Interfaces\Repositories\Lists\Arl\ArlRepositoryInterface;
use App\Interfaces\Services\Lists\Arl\ArlServiceInterface;
use Illuminate\Support\Collection;

class ArlService implements ArlServiceInterface
{
    private array $errors = [];
    protected ArlRepositoryInterface $arlRepo;

    public function __construct()
    {
        $this->arlRepo = app(ArlRepositoryInterface::class);
    }


    public function getArl(): Collection
    {
        return $this->arlRepo->getAll();
    }
}