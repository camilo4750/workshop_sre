<?php

namespace App\Dto\EmployeeManagement\EmployeePayment;

use App\Dto\CoreDto;

class EmployeePaymentTableDto extends CoreDto
{
    public int $id;

    public string $startPeriod;

    public string $endPeriod;

    public string $paymentMethodId;

    public int $overtimeTotal;

    public float $bonus;

    public string $paymentStatusId;
}
