<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;

class EmployeeControllerValidate
{
    public function validateStoreRequest(Request $request): void
    {
        $request->validate([
            'fullName' => ['required', 'string'],
            'typeDocumentId' => ['required', 'int'],
            'documentNumber' => ['required', 'string', 'max:20'],
            'municipalityId' => ['required', 'int'],
            'address' => ['required', 'string'],
            'telephone' => ['required', 'string', 'max:20'],
            'genderId' => ['required', 'int'],
            'jobPositionId' => ['required', 'int'],
            'epsId' => ['required', 'int'],
            'pensionFundId' => ['required', 'int'],
            'arlId' => ['required', 'int'],
            'contractTypeId' => ['required', 'int'],
            'salary' => ['required', 'string'],
            'entryDate' => ['required', 'string'],
            'bankId' => ['required', 'int'],
            'emergencyContact' => ['required', 'string'],
            'employeeStatusId' => ['required', 'int'],
        ], [
            'fullName' => 'El campo nombre completo es obligator',
            'typeDocumentId' => 'El campo tipo documento es obligator',
            'documentNumber' => 'El campo numero documento es obligator',
            'documentNumber.max' => 'El maximo de caracteres es 20',
            'municipalityId' => 'El campo municipio es obligator',
            'address' => 'El campo dirección es obligator',
            'telephone' => 'El campo telefono es obligator',
            'telephone.max' => 'El maximo de caracteres es 20',
            'genderId' => 'El campo genero es obligator',
            'jobPositionId' => 'El campo cargo es obligator',
            'epsId' => 'El campo eps es obligator',
            'pensionFundId' => 'El campo fondo pension es obligator',
            'arlId' => 'El campo arl es obligator',
            'contractTypeId' => 'El campo tipo contrato es obligator',
            'salary' => 'El campo salario es obligator',
            'entryDate' => 'El campo fecha inicio es obligator',
            'bankId' => 'El campo banco es obligator',
            'emergencyContact' => 'El campo informacion emergencia es obligator',
            'employeeStatusId' => 'El campo estado del empleador es obligator',
        ]);
    }
}