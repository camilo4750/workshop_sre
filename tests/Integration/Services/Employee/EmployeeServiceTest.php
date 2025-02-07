<?php

namespace Tests\Integration\Services\Employee;

use App\Entities\EmployeeManagement\Employee\EmployeeEntity;
use App\Interfaces\Services\EmployeeManagement\Employee\EmployeeServiceInterface;
use App\Mapper\EmployeeManagement\Employee\EmployeeNewDtoMapper;
use App\Mapper\EmployeeManagement\Employee\EmployeeUpdateDtoMapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Tests\BaseTest;

class EmployeeServiceTest extends BaseTest
{
    /**
     * @test
     */
    public function is_get_employee_service()
    {
        $this->actingAs($this->user);

        $employees = (App::make(EmployeeServiceInterface::class))
            ->getAll();

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employees', [
            'full_name' => $employees[0]->fullName,
        ]);
    }

    /**
     * @test
     */
    public function is_get_by_id_service()
    {
        $this->actingAs($this->user);

        $employee = (App::make(EmployeeServiceInterface::class))
            ->getById(1);

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employees', [
            'full_name' => $employee->fullName,
        ]);
    }

    /**
     * @test
     */
    public function is_store_service()
    {
        $this->actingAs($this->user);

        $employee = EmployeeEntity::factory()->make()->toArray();

        $request = (new Request())->merge([
            'fullName' => $employee['full_name'],
            'typeDocumentId' => $employee['type_document_id'],
            'documentNumber' => $employee['document_number'],
            'municipalityId' => $employee['municipality_id'],
            'address' => $employee['address'],
            'telephone' => $employee['telephone'],
            'genderId' => $employee['gender_id'],
            'jobPositionId' => $employee['job_position_id'],
            'epsId' => $employee['eps_id'],
            'pensionFundId' => $employee['pension_fund_id'],
            'arlId' => $employee['arl_id'],
            'contractTypeId' => $employee['contract_type_id'],
            'salary' => $employee['salary'],
            'entryDate' => $employee['entry_date'],
            'withdrawalDate' => $employee['withdrawal_date'],
            'bankId' => $employee['bank_id'],
            'bankAccountNumber' => $employee['bank_account_number'],
            'emergencyContact' => $employee['emergency_contact'],
            'employeeStatusId' => $employee['employee_status_id'],
        ]);

        $employeeNewDto = (App::make(EmployeeNewDtoMapper::class))
            ->createFormRequest($request);

        $employee = (App::make(EmployeeServiceInterface::class))
            ->storeEmployee($employeeNewDto);

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employees', [
            'full_name' => $employee['full_name'],
            'document_number' => $employee['document_number'],
        ]);
    }

    /**
     * @test
     */
    public function is_update_service()
    {
        $this->actingAs($this->user);

        $employee = EmployeeEntity::factory()->make()->toArray();

        $request = (new Request())->merge([
            'id' => 1,
            'fullName' => $employee['full_name'],
            'typeDocumentId' => $employee['type_document_id'],
            'documentNumber' => $employee['document_number'],
            'municipalityId' => $employee['municipality_id'],
            'address' => $employee['address'],
            'telephone' => $employee['telephone'],
            'genderId' => $employee['gender_id'],
            'jobPositionId' => $employee['job_position_id'],
            'epsId' => $employee['eps_id'],
            'pensionFundId' => $employee['pension_fund_id'],
            'arlId' => $employee['arl_id'],
            'contractTypeId' => $employee['contract_type_id'],
            'salary' => $employee['salary'],
            'entryDate' => $employee['entry_date'],
            'withdrawalDate' => $employee['withdrawal_date'],
            'bankId' => $employee['bank_id'],
            'bankAccountNumber' => $employee['bank_account_number'],
            'emergencyContact' => $employee['emergency_contact'],
            'employeeStatusId' => $employee['employee_status_id'],
        ]);

        $employeeUpdateDto = (App::make(EmployeeUpdateDtoMapper::class))
            ->createFromRequest($request);

        (App::make(EmployeeServiceInterface::class))
            ->updateEmployee($employeeUpdateDto);

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employees', [
            'id' => 1,
            'full_name' => $employee['full_name'],
            'document_number' => $employee['document_number'],
        ]);
    }

    /**
     * @test
     */
    public function is_get_list_active_employees_service()
    {
        $this->actingAs($this->user);

        $ActiveEmployees = (App::make(EmployeeServiceInterface::class))
            ->getListActiveEmployees();

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employees', [
            'full_name' => $ActiveEmployees[0]->full_name,
        ]);
    }

    /**
     * @test
     */
    public function is_get_basic_info_by_id_service()
    {
        $this->actingAs($this->user);

        $employee = (App::make(EmployeeServiceInterface::class))
            ->getBasicInfoById(1);

        $this->assertNull(session('errors'));

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'full_name' => $employee->fullName,
            'document_number' => $employee->documentNumber,
            'salary' => $employee->salary,
        ]);
    }
}
