<?php

namespace App\Mapper;

use App\Dto\BaseDto;

abstract class CoreMapper
{
    protected BaseDto $dto;
    protected $entity;

    abstract protected function getNewDto():BaseDto;

    public function getDto():BaseDto{
        return $this->dto;
    }

    public function setNewDto():self{
        $this->dto= $this->getNewDto();
        return $this;
    }
}
