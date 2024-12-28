<?php

namespace App\Http\Controllers\Lists\Eps;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\Eps\EpsServiceInterface;
use Illuminate\Http\JsonResponse;

class EpsController
{
    protected $epsService;

    public function __construct(
        EpsServiceInterface $epsService
    ) {
        $this->epsService = $epsService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista de eps',
                'data' => $this->epsService->getEps(),
            ];
        });
    }
}