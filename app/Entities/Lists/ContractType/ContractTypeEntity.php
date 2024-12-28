<?php

namespace App\Entities\Lists\ContractType;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContractTypeEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'contract_types';
}
