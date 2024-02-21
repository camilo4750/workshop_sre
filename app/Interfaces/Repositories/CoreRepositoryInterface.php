<?php

namespace App\Interfaces\Repositories;

use App\Dto\CoreDto;
use App\Entities\CoreEntity;
use App\User;

interface CoreRepositoryInterface
{
    /**
     * @return $this
     */
    public function setEntity($entity);

    /**
     * @return $this
     */
    public function setUser(User $user);

    /**
     * @return CoreEntity
     */
    public function getEntity();

    /**
     * @return $this
     */
    public function fillMapper($mapper);

    /**
     * @return $this
     */
    public function fillDto(CoreDto $dto);

    /**
     * @return QueryBuilder
     */
    public function query();

}
