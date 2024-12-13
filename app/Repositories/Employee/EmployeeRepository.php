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

    public function getById(int $employeeId)
    {
        return EmployeeEntity::query()->select(
            'employees.*',
             'municipalities.name as municipality_name',
              'departments.id as department_id',
            'departments.name as department_name',
             'countries.id as country_id', 
             'countries.name as country_name',
            'types_documents.name as type_document_name',
             'genders.name as gender_name',
            'job_positions.name as job_position_name',
             'eps.name as eps_name',
            'pension_funds.name as pension_fund_name', 
            'arl.name as arl_name', 
            'contract_types.name as contract_type_name',
             'banks.name as bank_name', 
            'employees_status.name as employee_status_name',
            'users_created.full_name as user_who_created_name',
            'users_updated.full_name as user_who_updated_name'
        )
        ->leftJoin('municipalities', 'employees.municipality_id', '=', 'municipalities.id')
        ->leftJoin('departments', 'municipalities.department_id', '=', 'departments.id')
        ->leftJoin('countries', 'departments.country_id', '=', 'countries.id')
        ->leftJoin('types_documents', 'employees.type_document_id', '=', 'types_documents.id')
        ->leftJoin('genders', 'employees.gender_id', '=','genders.id')
        ->leftJoin('job_positions', 'employees.job_position_id', '=','job_positions.id')
        ->leftJoin('eps', 'employees.eps_id', '=','eps.id')
        ->leftJoin('pension_funds', 'employees.pension_fund_id', '=','pension_funds.id')
        ->leftJoin('arl', 'employees.arl_id', '=','arl.id')
        ->leftJoin('contract_types', 'employees.contract_type_id', '=','contract_types.id')
        ->leftJoin('banks', 'employees.bank_id', '=','banks.id')
        ->leftJoin('employees_status', 'employees.employee_status_id', '=','employees_status.id')
        ->leftJoin('users as users_created', 'employees.user_who_created_id', '=','users_created.id')
        ->leftJoin('users as users_updated', 'employees.user_who_updated_id', '=','users_updated.id')
        ->find($employeeId);
    }
}
