<?php

namespace App\Interfaces\Repositories\Lists\Bank;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface BankRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}