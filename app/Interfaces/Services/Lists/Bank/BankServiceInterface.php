<?php

namespace App\Interfaces\Services\Lists\Bank;

use Illuminate\Support\Collection;

interface BankServiceInterface
{
    public function getBanks(): Collection;
}