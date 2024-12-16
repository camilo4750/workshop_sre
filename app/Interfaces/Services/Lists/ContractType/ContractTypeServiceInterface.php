<?php

namespace App\Interfaces\Services\Lists\ContractType;

use Illuminate\Support\Collection;

interface ContractTypeServiceInterface
{
    public function getContractTypes(): Collection;
}