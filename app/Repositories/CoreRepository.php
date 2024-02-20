<?php

namespace App\Repositories;

use App\Entities\CoreEntity;
use App\Exceptions\RepositoryBaseException;
use App\Interfaces\Repositories\CoreRepositoryInterface;
use App\User;

abstract class CoreRepository implements CoreRepositoryInterface
{
    protected $entity;
    protected $user = null;

    abstract public function getNewEntity();
    public function __construct($entity = null)
    {
        $this->setEntity($entity);
    }

    /**
     * @return $this
     */
    public function setEntity($entity){
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return CoreEntity
     */
    public function getEntity(){
        return $this->entity;
    }

    /**
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return $this
     */
    public function fillMapper($mapper)
    {
        foreach ($mapper->getAttributes() as $attribute => $value){
            $this->getEntity()->{$attribute} = $value;
        }
        return $this;
    }
}
