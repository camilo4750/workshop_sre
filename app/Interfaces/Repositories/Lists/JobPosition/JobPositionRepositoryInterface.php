<?php

namespace App\Interfaces\Repositories\Lists\JobPosition;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface JobPositionRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}