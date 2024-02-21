<?php

namespace App\Services\User;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface UserServiceInterface
{
    public function createUser(Request $request);
    public function getAllUsers(): Collection;
}
