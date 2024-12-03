<?php

namespace App\Interfaces\Repositories;

use App\Dto\CoreDto;
use App\Entities\CoreEntity;
use App\Models\User;

interface CoreRepositoryInterface
{
    public function setUser(User $user);
}
