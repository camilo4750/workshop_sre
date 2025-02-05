<?php

namespace App\Mapper\EmployeeManagement\Payment;

use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentDto;
use App\Mapper\CoreMapper;

class PaymentDtoMapper extends CoreMapper
{
    protected function getNewDto(): EmployeePaymentDto
    {
        return new EmployeePaymentDto();
    }

    public function createFromDbRecord(object  $dbRecord): EmployeePaymentDto
    {
        $dto = $this->getNewDto();
        $dto->id = $dbRecord->id;
        $dto->employeeId = $dbRecord->employe_id;
        $dto->employeeName = $dbRecord->employee_name;
        $dto->startPeriod = $dbRecord->start_period;
        $dto->endPeriod = $dbRecord->end_period;
        $dto->paymentMethodId = $dbRecord->payment_method_id;
        $dto->paymentMethodName = $dbRecord->payment_method_name;
        $dto->payment = $dbRecord->payment;
        $dto->overtimeTotal = $dbRecord->overtime_total;
        $dto->overtimePayment = $dbRecord->overtime_payment;
        $dto->bonus = $dbRecord->bonus;
        $dto->totalAccrued = $dbRecord->total_accrued;
        $dto->paymentStatusId = $dbRecord->payment_status_id;
        $dto->paymentStatusName = $dbRecord->payment_status_name;
        $dto->observations = $dbRecord->observations;
        $dto->userWhoCreatedId = $dbRecord->user_who_created_id;
        $dto->userCreatedName = $dbRecord->user_created_name;
        $dto->userWhoUpdatedId = $dbRecord->user_who_updated_id;
        $dto->userUpdatedName = $dbRecord->user_updated_name;
        $dto->createdAt = $dbRecord->created_at;
        $dto->updatedAt = $dbRecord->updated_at;
        return $dto;
    }
}
