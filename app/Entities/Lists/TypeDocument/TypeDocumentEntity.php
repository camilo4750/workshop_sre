<?php

namespace App\Entities\Lists\TypeDocument;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeDocumentEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'types_documents';
}
