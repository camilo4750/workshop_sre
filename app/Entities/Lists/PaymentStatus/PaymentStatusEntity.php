<?php

namespace App\Entities\Lists\PaymentStatus;

use App\Entities\CoreEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentStatusEntity extends CoreEntity
{
    use HasFactory;

    protected $table = 'payment_status';
}
