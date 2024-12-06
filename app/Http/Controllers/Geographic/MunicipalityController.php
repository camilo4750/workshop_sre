<?php 

namespace App\Http\Controllers\Geographic;

use App\Interfaces\Services\Geographic\MunicipalityServiceInterface;

class MunicipalityController
{
    protected $municipalityService;

    public function __construct(
        MunicipalityServiceInterface $municipalityService
    ) {
        $this->municipalityService = $municipalityService;
    }
}