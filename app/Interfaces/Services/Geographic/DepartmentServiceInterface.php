<?php

namespace App\Interfaces\Services\Geographic;

use Illuminate\Support\Collection;

interface DepartmentServiceInterface 
{
    public function getById(int $id): Collection;

    public function getDepartments(): Collection;
}