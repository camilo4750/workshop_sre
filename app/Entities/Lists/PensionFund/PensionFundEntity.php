<?php

namespace App\Entities\Lists\PensionFund;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PensionFundEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'pension_funds';
}
