<?php 

namespace App\Http\Controllers\Geographic;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Geographic\CountryServiceInterface;
use Illuminate\Http\JsonResponse;

class CountryController
{
    protected $countryService;

    public function __construct(
        CountryServiceInterface $countryService
    ) {
        $this->countryService = $countryService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista de Países',
                'data' => $this->countryService->getCountries(),
            ];
        });
    }
}