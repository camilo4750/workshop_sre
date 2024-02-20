<?php

namespace App\Dto;

abstract class BaseDto
{
    public $entity__= null;

    public function getAttributes():array
    {
        $attributes= array_merge(
            get_class_vars(get_class($this)),
            get_object_vars($this)
        );
        unset($attributes['entity__']);
        return $attributes;
    }

}
