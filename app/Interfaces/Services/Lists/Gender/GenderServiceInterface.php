<?php

namespace App\Interfaces\Services\Lists\Gender;

use Illuminate\Support\Collection;

interface GenderServiceInterface
{
    public function getGenders(): Collection;
}