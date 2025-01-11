<?php

namespace App\Repositories\EmployeeManagement\Employee;

use App\Dto\EmployeeManagement\Employee\EmployeeNewDto;
use App\Dto\EmployeeManagement\Employee\EmployeeUpdateDto;
use App\Entities\EmployeeManagement\Employee\EmployeeEntity;
use App\Interfaces\Repositories\EmployeeManagement\Employee\EmployeeRepositoryInterface;
use App\Mapper\EmployeeManagement\Employee\EmployeeTableDtoMapper;
use App\Repositories\CoreRepository;

class EmployeeRepository extends CoreRepository implements EmployeeRepositoryInterface
{
    public function getAll(): array
    {
        $employees =  EmployeeEntity::query()
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

        return  $employees->map(function ($employee) {
            return (new EmployeeTableDtoMapper)->createFromDbRecord($employee);
        })->toArray();
    }

    public function getById(int $employeeId): ?EmployeeEntity
    {
        return EmployeeEntity::query()->select([
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
        ])
            ->leftJoin('municipalities', 'employees.municipality_id', '=', 'municipalities.id')
            ->leftJoin('departments', 'municipalities.department_id', '=', 'departments.id')
            ->leftJoin('countries', 'departments.country_id', '=', 'countries.id')
            ->leftJoin('types_documents', 'employees.type_document_id', '=', 'types_documents.id')
            ->leftJoin('genders', 'employees.gender_id', '=', 'genders.id')
            ->leftJoin('job_positions', 'employees.job_position_id', '=', 'job_positions.id')
            ->leftJoin('eps', 'employees.eps_id', '=', 'eps.id')
            ->leftJoin('pension_funds', 'employees.pension_fund_id', '=', 'pension_funds.id')
            ->leftJoin('arl', 'employees.arl_id', '=', 'arl.id')
            ->leftJoin('contract_types', 'employees.contract_type_id', '=', 'contract_types.id')
            ->leftJoin('banks', 'employees.bank_id', '=', 'banks.id')
            ->leftJoin('employees_status', 'employees.employee_status_id', '=', 'employees_status.id')
            ->leftJoin('users as users_created', 'employees.user_who_created_id', '=', 'users_created.id')
            ->leftJoin('users as users_updated', 'employees.user_who_updated_id', '=', 'users_updated.id')
            ->find($employeeId);
    }

    public function existByDocument(string $documentNumber): bool
    {
        return EmployeeEntity::where('document_number', $documentNumber)->exists();
    }

    public function store(EmployeeNewDto $dto): ?EmployeeEntity
    {
        $employeeId = EmployeeEntity::query()
            ->insertGetId([
                'full_name' => $dto->full_name,
                'type_document_id' => $dto->type_document_id,
                'document_number' => $dto->document_number,
                'municipality_id' => $dto->municipality_id,
                'address' => $dto->address,
                'telephone' => $dto->telephone,
                'gender_id' => $dto->gender_id,
                'job_position_id' => $dto->job_position_id,
                'eps_id' => $dto->eps_id,
                'pension_fund_id' => $dto->pension_fund_id,
                'arl_id' => $dto->arl_id,
                'contract_type_id' => $dto->contract_type_id,
                'salary' => $dto->salary,
                'entry_date' => $dto->entry_date,
                'withdrawal_date' => $dto->withdrawal_date,
                'bank_id' => $dto->bank_id,
                'bank_account_number' => $dto->bank_account_number,
                'emergency_contact' => $dto->emergency_contact,
                'employee_status_id' => $dto->employee_status_id,
                'user_who_created_id' => $this->user->id,
                'created_at' => 'now()'
            ]);

        return $this->getById($employeeId);
    }

    public function update(EmployeeUpdateDto $dto): self
    {
        EmployeeEntity::query()
            ->where("id", $dto->id)
            ->update([
                'full_name' => $dto->full_name,
                'type_document_id' => $dto->type_document_id,
                'document_number' => $dto->document_number,
                'municipality_id' => $dto->municipality_id,
                'address' => $dto->address,
                'telephone' => $dto->telephone,
                'gender_id' => $dto->gender_id,
                'job_position_id' => $dto->job_position_id,
                'eps_id' => $dto->eps_id,
                'pension_fund_id' => $dto->pension_fund_id,
                'arl_id' => $dto->arl_id,
                'contract_type_id' => $dto->contract_type_id,
                'salary' => $dto->salary,
                'entry_date' => $dto->entry_date,
                'withdrawal_date' => $dto->withdrawal_date,
                'bank_id' => $dto->bank_id,
                'bank_account_number' => $dto->bank_account_number,
                'emergency_contact' => $dto->emergency_contact,
                'employee_status_id' => $dto->employee_status_id,
                'user_who_updated_id' => $this->user->id,
                'updated_at' => 'now()',
            ]);

        return $this;
    }
}
