<?php

namespace App\Interfaces\Repositories\Lists\ContractType;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface ContractTypeRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}