<?php

namespace App\Interfaces\Services\Lists\Arl;

use Illuminate\Support\Collection;

interface ArlServiceInterface
{
    public function getArl(): Collection;
}