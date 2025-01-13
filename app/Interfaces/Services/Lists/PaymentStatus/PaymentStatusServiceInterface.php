<?php

namespace App\Interfaces\Services\Lists\PaymentStatus;

use Illuminate\Support\Collection;

interface PaymentStatusServiceInterface
{
    public function getAll(): Collection;
}