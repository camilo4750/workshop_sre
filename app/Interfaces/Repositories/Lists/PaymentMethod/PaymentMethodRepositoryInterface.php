<?php

namespace App\Interfaces\Repositories\Lists\PaymentMethod;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface PaymentMethodRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}