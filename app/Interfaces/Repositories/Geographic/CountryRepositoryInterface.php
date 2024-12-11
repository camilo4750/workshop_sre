<?php

namespace App\Interfaces\Repositories\Geographic;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface CountryRepositoryInterface extends CoreRepositoryInterface
{
    public function findAll(): Collection;
}
