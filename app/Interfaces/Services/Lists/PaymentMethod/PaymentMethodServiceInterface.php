<?php

namespace App\Interfaces\Services\Lists\PaymentMethod;

use Illuminate\Support\Collection;

interface PaymentMethodServiceInterface
{
    public function getAll(): Collection;
}