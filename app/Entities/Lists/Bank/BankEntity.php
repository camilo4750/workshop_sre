<?php

namespace App\Entities\Lists\Bank;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'banks';
}
