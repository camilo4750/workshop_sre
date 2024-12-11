<?php

namespace App\Services\Geographic;

use App\Interfaces\Repositories\Geographic\CountryRepositoryInterface;
use App\Interfaces\Services\Geographic\CountryServiceInterface;
use Illuminate\Support\Collection;

class CountryService implements CountryServiceInterface
{
    private array $errors = [];
    protected CountryRepositoryInterface $countryRepo;

    public function __construct()
    {
        $this->countryRepo = app(CountryRepositoryInterface::class);
    }
    
    public function getCountries(): Collection  
    {
        return $this->countryRepo->findAll();
    }
}