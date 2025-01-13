<?php

namespace App\Entities\Lists\PaymentMethod;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethodEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'payment_methods';
}
