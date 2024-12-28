<?php

namespace App\Interfaces\Repositories\Lists\EmployeeStatus;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface EmployeeStatusRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}