<?php

namespace App\Interfaces\Repositories\Lists\PaymentStatus;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use Illuminate\Support\Collection;

interface PaymentStatusRepositoryInterface extends CoreRepositoryInterface
{
    public function getAll(): Collection;
}