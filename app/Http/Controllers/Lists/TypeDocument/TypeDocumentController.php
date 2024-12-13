<?php

namespace App\Http\Controllers\Lists\TypeDocument;

use App\Http\Controllers\Wrappers\ControllerWrapper;
use App\Interfaces\Services\Lists\TypeDocument\TypeDocumentServiceInterface;
use Illuminate\Http\JsonResponse;

class TypeDocumentController
{
    protected $typeDocumentService;

    public function __construct(
        TypeDocumentServiceInterface $typeDocumentService
    ) {
        $this->typeDocumentService = $typeDocumentService;
    }

    public function getAll(): array|JsonResponse
    {
        return ControllerWrapper::execWithJsonSuccessResponse(function () {
            return [
                'message' => 'Lista de tipos documentos',
                'data' => $this->typeDocumentService->getTypesDocuments(),
            ];
        });
    }
}