<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserControllerValidate
{

    public function validateStoreRequest(Request $request): void
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', Password::default(), 'confirmed'],
            'password_confirmation' => ['required', 'string'],
        ], [
            'fullName' => 'El nombre es obligatorio.',
            'phone' => 'El número de teléfono es obligatorio.',
            'email' => 'El correo electrónico es obligatorio.',
            'password' => 'La contraseña es obligatoria.',
            'password_confirmation' => 'La confirmación de la contraseña es obligatoria.',
        ]);
    }

    public function validateUpdateRequest(Request $request): void
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ], [
            'fullName.required' => 'El nombre es obligatorio.',
            'phone.required' => 'El número de teléfono es obligatorio.',
            'phone.string' => 'El número de teléfono debe ser un número entero.',
            'phone.max' => 'El numero maximo de digitos son 20',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
        ]);
    }

}
