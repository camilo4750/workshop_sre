<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CoreRepositoryInterface;
use App\Models\User;

abstract class CoreRepository extends DbRepository implements CoreRepositoryInterface
{
    protected ?User $user = null;
    
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
}
