<?php 

namespace App\Http\Controllers\Geographic;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Geographic\DepartmentServiceInterface;
use Illuminate\Http\JsonResponse;

class DepartmentController
{
    protected $departmentService;

    public function __construct(
        DepartmentServiceInterface $departmentService
    ) {
        $this->departmentService = $departmentService;
    }

    public function getById(int $countryId): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function() use ($countryId) {
            return [
                'messagee' => 'Lista departamentos',
                'data' => $this->departmentService->getById($countryId),
            ];
        });
    }
}