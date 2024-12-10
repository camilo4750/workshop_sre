<?php 

namespace App\Http\Controllers\Geographic;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Geographic\MunicipalityServiceInterface;
use Illuminate\Http\JsonResponse;

class MunicipalityController
{
    protected $municipalityService;

    public function __construct(
        MunicipalityServiceInterface $municipalityService
    ) {
        $this->municipalityService = $municipalityService;
    }

    public function getById(int $departmentId): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function() use ($departmentId) {
            return [
                'message' => 'Lista municipios',
                'data' => $this->municipalityService->getById($departmentId),
            ];
        });
    }
}