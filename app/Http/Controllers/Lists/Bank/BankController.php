<?php

namespace App\Http\Controllers\Lists\Bank;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\Bank\BankServiceInterface;
use Illuminate\Http\JsonResponse;

class BankController
{
    protected $banckService;

    public function __construct(
        BankServiceInterface $banckService
    ) {
        $this->banckService = $banckService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista de bancos',
                'data' => $this->banckService->getBanks(),
            ];
        });
    }
}