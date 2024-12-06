<?php

namespace App\Entities\Supplier;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierStatusEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'suppliers_status';
}
