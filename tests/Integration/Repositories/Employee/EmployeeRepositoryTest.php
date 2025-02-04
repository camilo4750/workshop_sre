<?php

namespace Tests\Integration\Repositories\Employee;

use App\Dto\EmployeeManagement\Employee\EmployeeNewDto;
use App\Dto\EmployeeManagement\Employee\EmployeeUpdateDto;
use App\Entities\EmployeeManagement\Employee\EmployeeEntity;
use App\Interfaces\Repositories\EmployeeManagement\Employee\EmployeeRepositoryInterface;
use Illuminate\Support\Facades\App;
use Tests\BaseTest;

class EmployeeRepositoryTest extends BaseTest
{
    /**
     * @test
     */
    public function is_get_employees_repo()
    {
        $this->actingAs($this->user);

        $employees = (App::make(EmployeeRepositoryInterface::class))
            ->getAll();

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employees', [
            'full_name' => $employees[0]->fullName,
        ]);
    }

    /**
     * @test
     */
    public function is_get_by_id_repo()
    {
        $this->actingAs($this->user);

        $employee = (App::make(EmployeeRepositoryInterface::class))->getById(1);

        $this->assertNull(session('errors'));
        $this->assertDatabaseHas('employees', [
            'full_name' => $employee->full_name,
        ]);
    }

    /**
     * @test
     */
    public function is_store_repo()
    {
        $this->actingAs($this->user);

        $employeeData = EmployeeEntity::factory()->make()->toArray();

        $employeeNewDto = new EmployeeNewDto();
        $employeeNewDto->full_name = $employeeData['full_name'];
        $employeeNewDto->type_document_id = $employeeData['type_document_id'];
        $employeeNewDto->document_number = $employeeData['document_number'];
        $employeeNewDto->municipality_id = $employeeData['municipality_id'];
        $employeeNewDto->address = $employeeData['address'];
        $employeeNewDto->telephone = $employeeData['telephone'];
        $employeeNewDto->gender_id = $employeeData['gender_id'];
        $employeeNewDto->job_position_id = $employeeData['job_position_id'];
        $employeeNewDto->eps_id = $employeeData['eps_id'];
        $employeeNewDto->pension_fund_id = $employeeData['pension_fund_id'];
        $employeeNewDto->arl_id = $employeeData['arl_id'];
        $employeeNewDto->contract_type_id = $employeeData['contract_type_id'];
        $employeeNewDto->salary = $employeeData['salary'];
        $employeeNewDto->entry_date = $employeeData['entry_date'];
        $employeeNewDto->withdrawal_date = $employeeData['withdrawal_date'];
        $employeeNewDto->bank_id = $employeeData['bank_id'];
        $employeeNewDto->bank_account_number = $employeeData['bank_account_number'];
        $employeeNewDto->emergency_contact = $employeeData['emergency_contact'];
        $employeeNewDto->employee_status_id = $employeeData['employee_status_id'];


        (App::make(EmployeeRepositoryInterface::class))
            ->setUser($this->user)
            ->store($employeeNewDto);

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employees', [
            'full_name' => $employeeData['full_name'],
            'document_number' => $employeeData['document_number'],
        ]);
    }

    /**
     * @test
     */
    public function is_update_repo()
    {
        $this->actingAs($this->user);

        $employeeData = EmployeeEntity::factory()->make()->toArray();

        $employeeUpdateDto = new EmployeeUpdateDto();
        $employeeUpdateDto->id = $employeeData['id'];
        $employeeUpdateDto->full_name = $employeeData['full_name'];
        $employeeUpdateDto->type_document_id = $employeeData['type_document_id'];
        $employeeUpdateDto->document_number = $employeeData['document_number'];
        $employeeUpdateDto->municipality_id = $employeeData['municipality_id'];
        $employeeUpdateDto->address = $employeeData['address'];
        $employeeUpdateDto->telephone = $employeeData['telephone'];
        $employeeUpdateDto->gender_id = $employeeData['gender_id'];
        $employeeUpdateDto->job_position_id = $employeeData['job_position_id'];
        $employeeUpdateDto->eps_id = $employeeData['eps_id'];
        $employeeUpdateDto->pension_fund_id = $employeeData['pension_fund_id'];
        $employeeUpdateDto->arl_id = $employeeData['arl_id'];
        $employeeUpdateDto->contract_type_id = $employeeData['contract_type_id'];
        $employeeUpdateDto->salary = $employeeData['salary'];
        $employeeUpdateDto->entry_date = $employeeData['entry_date'];
        $employeeUpdateDto->withdrawal_date = $employeeData['withdrawal_date'];
        $employeeUpdateDto->bank_id = $employeeData['bank_id'];
        $employeeUpdateDto->bank_account_number = $employeeData['bank_account_number'];
        $employeeUpdateDto->emergency_contact = $employeeData['emergency_contact'];
        $employeeUpdateDto->employee_status_id = $employeeData['employee_status_id'];
        $employeeUpdateDto->user_who_updated_id = $this->user->id;
        $employeeUpdateDto->updated_at = now();

        (App::make(EmployeeRepositoryInterface::class))
            ->setUser($this->user)
            ->update($employeeUpdateDto);

        $this->assertNull(session('errors'));
    }


    /**
     * @test
     */
    public function is_get_list_active_employees_repo()
    {
        $this->actingAs($this->user);

        $employees = (App::make(EmployeeRepositoryInterface::class))
            ->getListActiveEmployees();

        $this->assertNull(session('errors'));
        $this->assertDatabaseHas('employees', [
            'full_name' => $employees[0]->full_name,
        ]);
    }
}
