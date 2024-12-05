<?php

namespace App\Repositories\Geographic;

use App\Entities\Geographic\CountryEntity;
use App\Interfaces\Repositories\Geographic\CountryRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class CountryRepository extends CoreRepository implements CountryRepositoryInterface 
{
    public function findAll(): Collection
    {
        return CountryEntity::all();
    }
}