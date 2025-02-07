<?php

namespace Tests\Feature\Employee;

use App\Entities\EmployeeManagement\Employee\EmployeeEntity;
use Tests\BaseTest;

class EmployeeTest extends BaseTest
{
    /**
     * @test
     */
    public function is_get_employees_working()
    {
        $this->actingAs($this->user);

        $response = $this->getJson(route('Employee.GetAll'));

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'employees']);
    }

    /**
     * @test
     */
    public function is_get_by_id_working()
    {
        $this->actingAs($this->user);

        $response = $this->getJson(route('Employee.GetById', ['employeeId' => 1]));

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'data']);
    }

    /**
     * @test
     */
    public function is_store_working()
    {
        $this->actingAs($this->user);

        $employeeData = EmployeeEntity::factory()->make()->toArray();

        $response = $this->postJson(route('Employee.Store'), [
            'fullName' => $employeeData['full_name'],
            'typeDocumentId' => $employeeData['type_document_id'],
            'documentNumber' => $employeeData['document_number'],
            'municipalityId' => $employeeData['municipality_id'],
            'address' => $employeeData['address'],
            'telephone' => $employeeData['telephone'],
            'genderId' => $employeeData['gender_id'],
            'jobPositionId' => $employeeData['job_position_id'],
            'epsId' => $employeeData['eps_id'],
            'pensionFundId' => $employeeData['pension_fund_id'],
            'arlId' => $employeeData['arl_id'],
            'contractTypeId' => $employeeData['contract_type_id'],
            'salary' => $employeeData['salary'],
            'entryDate' => $employeeData['entry_date'],
            'withdrawalDate' => $employeeData['withdrawal_date'],
            'bankId' => $employeeData['bank_id'],
            'bankAccountNumber' => $employeeData['bank_account_number'],
            'emergencyContact' => $employeeData['emergency_contact'],
            'employeeStatusId' => $employeeData['employee_status_id'],
        ]);

        $response->assertStatus(200);
        $this->assertNull(session('errors'));
        $response->assertJsonStructure(['message', 'id']);

        $this->assertDatabaseHas('employees', [
            'full_name' => $employeeData['full_name'],
            'document_number' => $employeeData['document_number'],
        ]);
    }

    /**
     * @test
     */
    public function is_update_working()
    {
        $this->actingAs($this->user);

        $employeeData = EmployeeEntity::factory()->make()->toArray();

        $response = $this->postJson(route('Employee.Update'), ['employeeId' => $employeeData['employeeId']], [
            'fullName' => $employeeData['full_name'],
            'typeDocumentId' => $employeeData['type_document_id'],
            'documentNumber' => $employeeData['document_number'],
            'municipalityId' => $employeeData['municipality_id'],
            'address' => $employeeData['address'],
            'telephone' => $employeeData['telephone'],
            'genderId' => $employeeData['gender_id'],
            'jobPositionId' => $employeeData['job_position_id'],
            'epsId' => $employeeData['eps_id'],
            'pensionFundId' => $employeeData['pension_fund_id'],
            'arlId' => $employeeData['arl_id'],
            'contractTypeId' => $employeeData['contract_type_id'],
            'salary' => $employeeData['salary'],
            'entryDate' => $employeeData['entry_date'],
            'withdrawalDate' => $employeeData['withdrawal_date'],
            'bankId' => $employeeData['bank_id'],
            'bankAccountNumber' => $employeeData['bank_account_number'],
            'emergencyContact' => $employeeData['emergency_contact'],
            'employeeStatusId' => $employeeData['employee_status_id'],
        ]);

        $response->assertStatus(200);
        $this->assertNull(session('errors'));
        $response->assertJsonStructure(['success', 'message']);

        $this->assertDatabaseHas('employees', [
            'full_name' => $employeeData['full_name'],
            'document_number' => $employeeData['document_number'],
            'municipality_id' => $employeeData['municipality_id'],
            'address' => $employeeData['address'],
            'telephone' => $employeeData['telephone'],
            'genderId' => $employeeData['gender_id'],
            'job_position_id' => $employeeData['job_position_id'],
            'eps_id' => $employeeData['eps_id'],
            'pension_fund_id' => $employeeData['pension_fund_id'],
            'arl_id' => $employeeData['arl_id'],
            'contract_type_id' => $employeeData['contract_type_id'],
            'salary' => $employeeData['salary'],
            'entry_date' => $employeeData['entry_date'],
            'withdrawal_date' => $employeeData['withdrawal_date'],
            'bank_id' => $employeeData['bank_id'],
            'bank_account_number' => $employeeData['bank_account_number'],
            'emergency_contact' => $employeeData['emergency_contact'],
            'employee_status_id' => $employeeData['employee_status_id'],
        ]);
    }

    /**
     * @test
     */
    public function is_get_list_active_employees_working()
    {
        $this->actingAs($this->user);

        $response = $this->getJson(route('Employee.GetListActiveEmployees'));

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'data']);
    }

    /**
     * @test
     */
    public function is_get_basic_info_by_id_working()
    {
        $this->actingAs($this->user);

        $response = $this->getJson(route('Employee.getBasicInfoById', ['employeeId' => 1]));

        $response->assertStatus(200);
        $response->assertJsonStructure(['message', 'data']);
    }
}
