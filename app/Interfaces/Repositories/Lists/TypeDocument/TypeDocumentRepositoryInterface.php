<?php

namespace App\Interfaces\Repositories\Lists\TypeDocument;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface TypeDocumentRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}