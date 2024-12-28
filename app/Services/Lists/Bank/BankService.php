<?php

namespace App\Services\Lists\Bank;

use App\Interfaces\Repositories\Lists\Bank\BankRepositoryInterface;
use App\Interfaces\Services\Lists\Bank\BankServiceInterface;
use Illuminate\Support\Collection;

class BankService implements BankServiceInterface
{
    private array $errors = [];
    protected BankRepositoryInterface $bankRepo;

    public function __construct()
    {
        $this->bankRepo = app(BankRepositoryInterface::class);
    }


    public function getBanks(): Collection
    {
        return $this->bankRepo->getAll();
    }
}