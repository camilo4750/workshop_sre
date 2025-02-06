<?php

namespace App\Dto\EmployeeManagement\EmployeePayment;

use App\Dto\CoreDto;

class EmployeePaymentTableDto extends CoreDto
{
    public int $id;

    public string $employeeName;

    public string $startPeriod;

    public string $endPeriod;

    public string $paymentMethodName;

    public int $overtimeTotal;

    public float $bonus;

    public string $paymentStatusName;
}
