<?php

namespace App\Dto\EmployeeManagement\EmployeePayment;

use App\Dto\CoreDto;

class EmployeePaymentNewDto extends CoreDto
{
    public int $employee_id;

    public string $start_period;

    public string $end_period;

    public int $payment_method_id;

    public float $payment;

    public ?int $overtime_total;

    public ?float $overtime_payment;

    public ?float $bonus;

    public float $total_accrued;

    public int $payment_status_id;

    public ?string $observations;
}
