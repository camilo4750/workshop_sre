<?php

namespace App\Http\Controllers\Lists\Gender;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\Gender\GenderServiceInterface;
use Illuminate\Http\JsonResponse;

class GenderController
{
    protected $genderService;

    public function __construct(
        GenderServiceInterface $genderService
    ) {
        $this->genderService = $genderService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista de generos',
                'data' => $this->genderService->getGenders(),
            ];
        });
    }
}