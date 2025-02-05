<?php

namespace App\Mapper\EmployeeManagement\Payment;

use App\Dto\EmployeeManagement\EmployeePayment\EmployeePaymentNewDto;
use App\Mapper\CoreMapper;
use Illuminate\Http\Request;

class PaymentNewDtoMapper extends CoreMapper
{
    protected function getNewDto(): EmployeePaymentNewDto
    {
        return new EmployeePaymentNewDto();
    }

    public function createFormRequest(Request $request): EmployeePaymentNewDto
    {
        $dto = $this->getNewDto();
        $dto->employee_id = $request->get('employeeId');
        $dto->start_period = $request->get('startPeriod');
        $dto->end_period = $request->get('endPeriod');
        $dto->payment_method_id = $request->get('paymentMethodId');
        $dto->payment = $request->get('payment');
        $dto->overtime_total = $request->get('overtimeTotal');
        $dto->overtime_payment = $request->get('overtimePayment');
        $dto->bonus = $request->get('bonus');
        $dto->total_accrued = $request->get('totalAccrued');
        $dto->payment_status_id = $request->get('paymentStatusId');
        $dto->observations = $request->get('observations');
        return $dto;
    }
}
