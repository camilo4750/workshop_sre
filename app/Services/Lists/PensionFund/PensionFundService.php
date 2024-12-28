<?php

namespace App\Services\Lists\PensionFund;

use App\Interfaces\Repositories\Lists\PensionFund\PensionFundRepositoryInterface;
use App\Interfaces\Services\Lists\PensionFund\PensionFundServiceInterface;
use Illuminate\Support\Collection;

class PensionFundService implements PensionFundServiceInterface
{
    private array $errors = [];
    protected PensionFundRepositoryInterface $pensionFundRepo;

    public function __construct()
    {
        $this->pensionFundRepo = app(PensionFundRepositoryInterface::class);
    }


    public function getPensionFunds(): Collection
    {
        return $this->pensionFundRepo->getAll();
    }
}