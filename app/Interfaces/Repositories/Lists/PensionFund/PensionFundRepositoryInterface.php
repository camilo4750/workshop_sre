<?php

namespace App\Interfaces\Repositories\Lists\PensionFund;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface PensionFundRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}