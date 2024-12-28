<?php

namespace App\Services\Lists\JobPosition;

use App\Interfaces\Repositories\Lists\JobPosition\JobPositionRepositoryInterface;
use App\Interfaces\Services\Lists\JobPosition\JobPositionServiceInterface;
use Illuminate\Support\Collection;

class JobPositionService implements JobPositionServiceInterface
{
    private array $errors = [];
    protected JobPositionRepositoryInterface $GenderRepo;

    public function __construct()
    {
        $this->GenderRepo = app(JobPositionRepositoryInterface::class);
    }


    public function getJobPositions(): Collection
    {
        return $this->GenderRepo->getAll();
    }
}