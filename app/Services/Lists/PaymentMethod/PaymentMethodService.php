<?php

namespace App\Services\Lists\PaymentMethod;

use App\Interfaces\Repositories\Lists\PaymentMethod\PaymentMethodRepositoryInterface;
use App\Interfaces\Services\Lists\PaymentMethod\PaymentMethodServiceInterface;
use Illuminate\Support\Collection;

class PaymentMethodService implements PaymentMethodServiceInterface
{
    private array $errors = [];
    protected PaymentMethodRepositoryInterface $paymentMethodRepo;

    public function __construct()
    {
        $this->paymentMethodRepo = app(PaymentMethodRepositoryInterface::class);
    }


    public function getAll(): Collection
    {
        return $this->paymentMethodRepo->getAll();
    }
}