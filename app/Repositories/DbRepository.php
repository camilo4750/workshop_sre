<?php

namespace App\Repositories;

abstract class DbRepository
{
    abstract public function getTableName():string;

    abstract public function getDatabaseConnection():string;

}
