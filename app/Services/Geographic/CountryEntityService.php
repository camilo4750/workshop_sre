<?php

namespace App\Services\Geographic;

use App\Interfaces\Repositories\Geographic\CountryRepositoryInterface;
use App\Interfaces\services\Geographic\CountryEntityServiceInterface;

class CountryEntityService implements CountryEntityServiceInterface
{
    private array $errors = [];
    protected CountryRepositoryInterface $countryRepo;

    public function __construct()
    {
        $this->countryRepo = app(CountryRepositoryInterface::class);
    }
    
    public function getCountries()
    {
        return $this->countryRepo->findAll();
    }
}