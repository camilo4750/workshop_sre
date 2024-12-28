<?php

namespace App\Repositories\Lists\TypeDocument;

use App\Entities\Lists\TypeDocument\TypeDocumentEntity;
use App\Interfaces\Repositories\Lists\TypeDocument\TypeDocumentRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class TypeDocumentRepository extends CoreRepository implements TypeDocumentRepositoryInterface
{
    public function getAll(): Collection
    {
        return TypeDocumentEntity::query()
        ->select([
            'types_documents.id',
            'types_documents.name',
        ])
        ->orderBy('types_documents.id')
        ->get();
    } 
}