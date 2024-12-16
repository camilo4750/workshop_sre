<?php

namespace App\Services\Lists\ContractType;

use App\Interfaces\Repositories\Lists\ContractType\ContractTypeRepositoryInterface;
use App\Interfaces\Services\Lists\ContractType\ContractTypeServiceInterface;
use Illuminate\Support\Collection;

class ContractTypeService implements ContractTypeServiceInterface
{
    private array $errors = [];
    protected ContractTypeRepositoryInterface $contractTypeRepo;

    public function __construct()
    {
        $this->contractTypeRepo = app(ContractTypeRepositoryInterface::class);
    }


    public function getContractTypes(): Collection
    {
        return $this->contractTypeRepo->getAll();
    }
}