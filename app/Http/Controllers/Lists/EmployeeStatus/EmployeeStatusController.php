<?php

namespace App\Http\Controllers\Lists\EmployeeStatus;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\EmployeeStatus\EmployeeStatusServiceInterface;
use Illuminate\Http\JsonResponse;

class EmployeeStatusController
{
    protected $employeeStatusService;

    public function __construct(
        EmployeeStatusServiceInterface $employeeStatusService
    ) {
        $this->employeeStatusService = $employeeStatusService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista estados empleado',
                'data' => $this->employeeStatusService->getEmployeesStatus(),
            ];
        });
    }
}