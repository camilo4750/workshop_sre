<?php

namespace App\Mapper\EmployeeManagement\Payment;

use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentTableDto;
use App\Mapper\CoreMapper;

class PaymentTableDtoMapper extends CoreMapper
{
    protected function getNewDto(): EmployeePaymentTableDto
    {
        return new EmployeePaymentTableDto();
    }

    public function createFromDbRecord(object $dbRecord): EmployeePaymentTableDto
    {
        $dto = $this->getNewDto();
        $dto->id = $dbRecord->id;
        $dto->startPeriod = $dbRecord->start_period;
        $dto->endPeriod = $dbRecord->end_period;
        $dto->paymentMethodId = $dbRecord->payment_method;
        $dto->overtimeTotal = $dbRecord->overtime_total;
        $dto->bonus = $dbRecord->bonus;
        $dto->paymentStatusId = $dbRecord->payment_status;
        return $dto;
    }
}
