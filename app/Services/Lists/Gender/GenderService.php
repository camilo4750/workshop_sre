<?php

namespace App\Services\Lists\Gender;

use App\Interfaces\Repositories\Lists\Gender\GenderRepositoryInterface;
use App\Interfaces\Services\Lists\Gender\GenderServiceInterface;
use Illuminate\Support\Collection;

class GenderService implements GenderServiceInterface
{
    private array $errors = [];
    protected GenderRepositoryInterface $GenderRepo;

    public function __construct()
    {
        $this->GenderRepo = app(GenderRepositoryInterface::class);
    }


    public function getGenders(): Collection
    {
        return $this->GenderRepo->getAll();
    }
}