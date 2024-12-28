<?php

namespace App\Services\Lists\TypeDocument;

use App\Interfaces\Repositories\Lists\TypeDocument\TypeDocumentRepositoryInterface;
use App\Interfaces\Services\Lists\TypeDocument\TypeDocumentServiceInterface;
use App\Mapper\Employee\EmployeeDtoMapper;
use Illuminate\Support\Collection;

class TypeDocumentService implements TypeDocumentServiceInterface
{
    private array $errors = [];
    protected TypeDocumentRepositoryInterface $typeDocumentRepo;

    public function __construct()
    {
        $this->typeDocumentRepo = app(TypeDocumentRepositoryInterface::class);
    }


    public function getTypesDocuments(): Collection
    {
        return $this->typeDocumentRepo->getAll();
    }
}