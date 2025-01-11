<?php

namespace App\Http\Controllers\EmployeeManagement\Employee;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Employee\EmployeeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmployeeController
{
    protected $employeeService;

    public function __construct(
        EmployeeServiceInterface $employeeService
    ) {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        return view('Employee.index');
    }

    public function getEmployees(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista de empleados',
                'employees' => $this->employeeService->getAll(),
            ];
        });
    }

    public function getById(int $employeeId): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($employeeId) {
            return [
                'message' => 'Información del empleado',
                'data' => $this->employeeService->getById($employeeId),
            ];
        });
    }

    public function store(Request $request): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request) {
            (new EmployeeControllerValidate)
                ->validateStoreRequest($request);

            $employee = $this->employeeService
                ->store($request);

            return [
                'message' => 'Empleador registrado exitosamente',
                'id' => $employee->id,
            ];
        });
    }

    public function update(Request $request, int $employeeId): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () use ($request, $employeeId) {
            (new EmployeeControllerValidate)
                ->validateUpdatedRequest($request);

            $employee = $this->employeeService
                ->update($employeeId, $request);

            return [
                'message' => 'Empleador Actualizado exitosamente',
            ];
        });
    }
}
