<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;

class SupplierControllerValidate
{
    public function validateStoreRequest(Request $request): void
    {
        $request->validate([
            'companyName' => ['required', 'string', 'max:150'],
            'companyPhone' => ['required', 'string', 'max:20'],
            'contactInformation' => ['required', 'string', 'max:200'],
            'nit' => ['max:20'],
            'email' => ['required', 'string', 'email', 'max:150'],
            'address' => ['required', 'string', 'max:200'],
            'municipalityId' => ['required', 'int'],
            'statusId' => ['required', 'int'],

        ], [
            'companyName.required' => 'El campo nombre es obligatorio',
            'companyName.max' => 'El campo nombre no debe tener más de 150 caracteres.',
            'companyPhone.required' => 'El campo telefono es obligatorio',
            'companyPhone.max' => 'El campo telefono no debe tener más de 20 caracteres.',
            'contactInformation.required' => 'la informacion del proveedor es obligatorio',
            'nit.max' => 'El campo nit no debe tener más de 20 caracteres.',
            'email.required' => 'El campo email es obligatorio',
            'email.max' => 'El campo email no debe tener más de 150 caracteres.',
            'address.required' => 'El campo direccion es obligatorio',
            'address.max' => 'El campo dirección no debe tener más de 200 caracteres.',
            'municipalityId.required' => 'El campo municipio es obligatorio',
            'statusId.required' => 'El campo estado es obligatorio',
        ]);
    }

    public function validateUpdateRequest(Request $request): void
    {
        $request->validate([
            'companyName' => ['required', 'string', 'max:150'],
            'companyPhone' => ['required', 'string', 'min:0', 'max:20'],
            'contactInformation' => ['required', 'max:200'],
            'nit' => ['max:20'],
            'email' => ['required', 'string', 'email', 'max:150'],
            'address' => ['required', 'string', 'max:200'],
            'municipalityId' => ['required', 'int'],
            'statusId' => ['required', 'int'],
        ],
        [
            'companyName.required' => 'El campo nombre es obligatorio',
            'companyName.max' => 'El campo nombre no debe tener más de 150 caracteres.',
            'companyPhone.required' => 'El campo telefono es obligatorio',
            'companyPhone.max' => 'El campo telefono no debe tener más de 20 caracteres.',
            'contactInformation.required' => 'la informacion del proveedor es obligatorio',
            'nit.max' => 'El campo nit no debe tener más de 20 caracteres.',
            'email.required' => 'El campo email es obligatorio',
            'email.max' => 'El campo email no debe tener más de 150 caracteres.',
            'address.required' => 'El campo direccion es obligatorio',
            'address.max' => 'El campo dirección no debe tener más de 200 caracteres.',
            'municipalityId.required' => 'El campo municipio es obligatorio',
            'statusId.required' => 'El campo estado es obligatorio',
        ]);
    }
}
