<?php

namespace App\Interfaces\Services\Geographic;

use Illuminate\Support\Collection;

interface CountryServiceInterface 
{
    public function getCountries(): Collection;
}