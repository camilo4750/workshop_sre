<?php

namespace App\Dto\EmployeeManagement\EmployeePayment;

use App\Dto\CoreDto;

class EmployeePaymentDto extends CoreDto
{
    public int $id;

    public int $employeeId;

    public string $employeeName;

    public string $startPeriod;

    public string $endPeriod;

    public int $paymentMethodId;

    public string $paymentMethodName;

    public float $payment;

    public int $overtimeTotal;

    public float $overtimePayment;

    public float $bonus;

    public float $totalAccrued;

    public int $paymentStatusId;

    public string $paymentStatusName;

    public ?string $observations;

    public ?int $userWhoCreatedId;

    public ?string $userCreatedName;

    public ?int $userWhoUpdatedId;

    public ?string $userUpdatedName;

    public ?string $createdAt;

    public ?string $updatedAt;
}
