<?php

namespace App\Repositories\Lists\PaymentStatus;

use App\Entities\Lists\PaymentStatus\PaymentStatusEntity;
use App\Interfaces\Repositories\Lists\PaymentStatus\PaymentStatusRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class PaymentStatusRepository extends CoreRepository implements PaymentStatusRepositoryInterface
{
    public function getAll(): Collection
    {
        return PaymentStatusEntity::query()
        ->select([
            'id',
            'name',
        ])
        ->orderBy('id')
        ->get();
    } 
}