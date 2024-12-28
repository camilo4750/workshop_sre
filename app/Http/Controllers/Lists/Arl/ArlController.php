<?php

namespace App\Http\Controllers\Lists\Arl;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\Arl\ArlServiceInterface;
use Illuminate\Http\JsonResponse;

class ArlController
{
    protected $arlService;

    public function __construct(
        ArlServiceInterface $arlService
    ) {
        $this->arlService = $arlService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista de arls',
                'data' => $this->arlService->getArl(),
            ];
        });
    }
}