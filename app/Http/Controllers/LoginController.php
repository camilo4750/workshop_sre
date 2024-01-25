<?php

namespace App\Http\Controllers;

class LoginController
{
    public function index()
    {
        return view('vendor.adminlte.auth.login');
    }
}
