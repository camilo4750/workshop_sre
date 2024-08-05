<?php

namespace App\Http\Controllers\Supplier;

use Illuminate\Http\Request;

class SupplierControllerValidate
{
    public function validateForm(Request $request): void
    {
        $request->validate([
            'companyName' => ['required', 'string'],
            'nit' => ['required', 'int'],
            'phoneCompany' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'address' => ['required', 'string'],
            'representative' => ['required', 'string'],
            'phoneRepresentative' => ['required', 'string'],
            'active' => ['required', 'boolean'],
        ], [
            'companyName.required' => 'El campo nombre es obligatorio',
            'nit.required' => 'El campo nit es obligatorio',
            'phoneCompany.required' => 'El campo telefono es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'address.required' => 'El campo direccion es obligatorio',
            'representative.required' => 'El campo representante es obligatorio',
            'phoneRepresentative.required' => 'El campo telefono es obligatorio',
            'active.required' => 'El campo estado es obligatorio',
        ]);
    }
}
