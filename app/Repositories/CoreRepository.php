<?php

namespace App\Repositories;

use App\Dto\CoreDto;
use App\Entities\CoreEntity;
use App\Exceptions\RepositoryBaseException;
use App\Interfaces\Repositories\CoreRepositoryInterface;
use App\User;
use Illuminate\Database\Query\Builder;

abstract class CoreRepository implements CoreRepositoryInterface
{
    protected $entity;
    protected $user = null;
    protected $query = null;

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
     * @return $this
     */
    protected function setNewEntity(){
        $this->entity = $this->getNewEntity();
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


    /**
     * @return $this
     */
    public function fillDto(CoreDto $dto)
    {
        foreach ($dto->getAttributes() as $attribute => $value) {
            $this->getEntity()->{$attribute} = $value;
        }
        return $this;
    }
    /**
     * @return Builder
     */
    protected function newQuery()
    {
        return $this->getNewEntity()->newQuery();
    }

    /**
     * @return Builder
     */
    public function query()
    {
        if(is_null($this->query))
            $this->query = $this->newQuery();

        return $this->query;
    }

}
