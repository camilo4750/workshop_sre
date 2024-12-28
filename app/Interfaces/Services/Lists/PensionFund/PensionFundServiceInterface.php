<?php

namespace App\Interfaces\Services\Lists\PensionFund;

use Illuminate\Support\Collection;

interface PensionFundServiceInterface
{
    public function getPensionFunds(): Collection;
}