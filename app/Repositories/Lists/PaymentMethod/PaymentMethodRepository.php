<?php

namespace App\Repositories\Lists\PaymentMethod;

use App\Entities\Lists\PaymentMethod\PaymentMethodEntity;
use App\Interfaces\Repositories\Lists\PaymentMethod\PaymentMethodRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class PaymentMethodRepository extends CoreRepository implements PaymentMethodRepositoryInterface
{
    public function getAll(): Collection
    {
        return PaymentMethodEntity::query()
        ->select([
            'id',
            'name',
        ])
        ->orderBy('id')
        ->get();
    } 
}