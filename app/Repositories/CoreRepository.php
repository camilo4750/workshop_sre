<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use App\Models\User;

abstract class CoreRepository implements CoreRepositoryInterface
{
    protected ?User $user = null;
    
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
}
