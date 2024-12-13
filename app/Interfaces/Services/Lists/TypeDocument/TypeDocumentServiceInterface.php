<?php

namespace App\Interfaces\Services\Lists\TypeDocument;

use Illuminate\Support\Collection;

interface TypeDocumentServiceInterface
{
    public function getTypesDocuments(): Collection;
}