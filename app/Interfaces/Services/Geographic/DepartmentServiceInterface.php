<?php

namespace App\Interfaces\Services\Geographic;

interface DepartmentServiceInterface 
{
    public function getDepartment(int $id);

    public function getDepartments();
}