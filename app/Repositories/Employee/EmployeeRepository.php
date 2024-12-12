<?php

namespace App\Repositories\Employee;

use App\Entities\Employee\EmployeeEntity;
use App\Interfaces\Repositories\Employee\EmployeeRepositoryInterface;
use App\Repositories\CoreRepository;
use Illuminate\Support\Collection;

class EmployeeRepository extends CoreRepository implements EmployeeRepositoryInterface
{
    public function getAll(): Collection
    {
        return EmployeeEntity::query()
            ->select(
                'employees.id',
                'employees.full_name',
                'employees.document_number',
                'employees.telephone',
                'employees.job_position_id',
                'job_positions.name as job_position_name',
                'employees.entry_date',
                'employees.employee_status_id',
                'employees_status.name as employee_status_name',
                'created_at',
            )
            ->leftJoin('job_positions', 'employees.job_position_id', '=', 'job_positions.id')
            ->leftJoin('employees_status', 'employees.employee_status_id', '=', 'employees_status.id')
            ->get();
    }
}
