<?php

namespace App\Interfaces\Repositories\Lists\Gender;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface GenderRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}