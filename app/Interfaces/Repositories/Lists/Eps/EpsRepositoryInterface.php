<?php

namespace App\Interfaces\Repositories\Lists\Eps;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface EpsRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}