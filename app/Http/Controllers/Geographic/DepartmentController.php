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

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function() {
            return [
                'message' => 'Lista departamentos',
                'data' => $this->departmentService->getDepartments(),
            ];
        });
    }

    public function getById(int $countryId): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function() use ($countryId) {
            return [
                'message' => 'departamento por id',
                'data' => $this->departmentService->getById($countryId),
            ];
        });
    }
}