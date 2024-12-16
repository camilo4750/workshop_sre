<?php

namespace App\Interfaces\Repositories\Lists\Arl;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface ArlRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}