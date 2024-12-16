<?php

namespace App\Http\Controllers\Lists\JobPosition;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\JobPosition\JobPositionServiceInterface;
use Illuminate\Http\JsonResponse;

class JobPositionController
{
    protected $JobPositionService;

    public function __construct(
        JobPositionServiceInterface $JobPositionService
    ) {
        $this->JobPositionService = $JobPositionService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista puestos de trabajo',
                'data' => $this->JobPositionService->getJobPositions(),
            ];
        });
    }
}