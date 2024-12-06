<?php 

namespace App\Http\Controllers\Geographic;

use App\Interfaces\Services\Geographic\DepartmentServiceInterface;

class DepartmentController
{
    protected $departmentService;

    public function __construct(
        DepartmentServiceInterface $departmentService
    ) {
        $this->departmentService = $departmentService;
    }
}