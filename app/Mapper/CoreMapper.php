<?php

namespace App\Mapper;

use App\Dto\CoreDto;

abstract class CoreMapper
{
    protected CoreDto $dto;

    abstract protected function getNewDto():CoreDto;

    public function getDto():CoreDto{
        return $this->dto;
    }

    public function setNewDto():self{
        $this->dto= $this->getNewDto();
        return $this;
    }
}
