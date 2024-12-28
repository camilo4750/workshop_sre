<?php

namespace App\Interfaces\Services\Lists\JobPosition;

use Illuminate\Support\Collection;

interface JobPositionServiceInterface
{
    public function getJobPositions(): Collection;
}