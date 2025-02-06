<?php

namespace App\Http\Controllers\EmployeeManagement\Payment;

use Illuminate\Http\Request;

class PaymentControllerValidate
{
    public function validateStoreRequest(Request $request): void
    {
        $request->validate([
            'employeeId' => ['required', 'int'],
            'startPeriod' => ['required', 'string'],
            'endPeriod' => ['required', 'string'],
            'paymentMethodId' => ['required', 'int'],
            'payment' => ['required'],
            'totalAccrued' => ['required'],
            'paymentStatusId' => ['required', 'int'],
        ], [
            'employeeId' => 'El campo empleado es obligator',
            'startPeriod' => 'El campo periodo de inicio es obligator',
            'endPeriod' => 'El campo periodo final es obligator',
            'paymentMethodId' => 'El campo metodo de pago es obligatorio',
            'payment' => 'El campo pago es obligatorio',
            'totalAccrued' => 'El campo total acomulado es obligator',
            'paymentStatusId' => 'El campo estado de pago es obligator',
        ]);
    }

    public function validateUpdateRequest(Request $request): void
    {
        $request->validate([
            'employeeId' => ['required', 'int'],
            'startPeriod' => ['required', 'string'],
            'endPeriod' => ['required', 'string'],
            'paymentMethodId' => ['required', 'int'],
            'payment' => ['required'],
            'totalAccrued' => ['required'],
            'paymentStatusId' => ['required', 'int'],
        ], [
            'employeeId' => 'El campo empleado es obligator',
            'startPeriod' => 'El campo periodo de inicio es obligator',
            'endPeriod' => 'El campo periodo final es obligator',
            'paymentMethodId' => 'El campo metodo de pago es obligatorio',
            'payment' => 'El campo pago es obligatorio',
            'totalAccrued' => 'El campo total acomulado es obligator',
            'paymentStatusId' => 'El campo estado de pago es obligator',
        ]);
    }
}
