<?php

namespace App\Interfaces\Services\Lists\Eps;

use Illuminate\Support\Collection;

interface EpsServiceInterface
{
    public function getEps(): Collection;
}