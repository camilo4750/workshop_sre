<?php

namespace App\Services\Lists\PaymentStatus;

use App\Interfaces\Repositories\Lists\PaymentStatus\PaymentStatusRepositoryInterface;
use App\Interfaces\Services\Lists\PaymentStatus\PaymentStatusServiceInterface;
use Illuminate\Support\Collection;

class PaymentStatusService implements PaymentStatusServiceInterface
{
    private array $errors = [];
    protected PaymentStatusRepositoryInterface $paymentStatusRepo;

    public function __construct()
    {
        $this->paymentStatusRepo = app(PaymentStatusRepositoryInterface::class);
    }


    public function getAll(): Collection
    {
        return $this->paymentStatusRepo->getAll();
    }
}