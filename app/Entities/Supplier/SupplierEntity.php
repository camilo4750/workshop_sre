<?php

namespace App\Entities\Supplier;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'suppliers';

    public function getRepo()
    {
        // TODO: Implement getRepo() method.
    }
}
