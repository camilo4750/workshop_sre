<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserControllerValidate
{

    public function validateStoreRequest(Request $request): void
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'firstSurname' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', Password::default(), 'confirmed'],
        ], [
            'firstName.required' => 'El nombre es obligatorio.',
            'firstSurname.required' => 'El primer apellido es obligatorio.',
            'telephone.required' => 'El número de teléfono es obligatorio.',
            'telephone.int' => 'El número de teléfono debe ser un número entero.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ]);
    }

    public function validateUpdateRequest(Request $request): void
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'firstSurname' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ], [
            'firstName.required' => 'El nombre es obligatorio.',
            'firstSurname.required' => 'El primer apellido es obligatorio.',
            'telephone.required' => 'El número de teléfono es obligatorio.',
            'telephone.int' => 'El número de teléfono debe ser un número entero.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
        ]);
    }

}
