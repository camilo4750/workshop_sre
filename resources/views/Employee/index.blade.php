@extends('adminlte::page')
@section('title', 'Gestion de empleados')
<style>
    #showEmployee .modal-body {
        max-height: 700px;
        overflow-x: auto
    }

    #tableEmployees_wrapper .col-12 {
        overflow-y: auto;
    }
</style>
@section('content_header')
<div class="d-flex align-items-center">
    <h1 class="font-weight-bold ml-3">Gestion de empleados</h1>
</div>
@stop
@section('content')
<div id="app">
    <div class="card border-color-1 p-2">
        <div class="d-flex justify-content-end mb-2">
            <button class="btn btn-secondary">Crear empleado</button>
        </div>
        <div class="my-3" v-if="!isLoading">
            <table id="tableEmployees" class="table table-striped table-bordered table-hover dataTable"
                style="width: 100% !important;">
                <thead>
                    <tr class="text-center">
                        <th>Nombre completo</th>
                        <th>N° documento</th>
                        <th>Telefono</th>
                        <th>Cargo</th>
                        <th>Fecha Ingreso</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr v-for="(employee, index) in employees" :key="index">
                        <td>@{{ employee?.fullName }}</td>
                        <td>@{{ employee?.documentNumber }}</td>
                        <td>@{{ employee?.telephone }}</td>
                        <td>@{{ employee?.jobPositionName }}</td>
                        <td>@{{ employee?.entryDate }}</td>
                        <td>@{{ employee?.employeeStatusName }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-color-table-edit btn-table" data-toggle="tooltip"
                                    data-placement="top" title="Editar Usuario" @click="openEditEmployeeModal(employee.id)">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-table bg-primary" data-toggle="tooltip"
                                    data-placement="top" title="Ver informacion completa" @click="openShowEmployeeModal(employee.id)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center align-items-center" v-else>
            @include('preloader')
        </div>
    </div>
    
    @include('Employee.Modals.show_employee')
</div>

<script>
    const app = Vue.createApp({
            data() {
                return {
                    isLoading: false,
                    isModalLoading: false,
                    employees: [],
                    createEmployee: {
                        fullName: '',
                        typeDocumentId: null,
                        document_number: '',
                        municipality_id: null,
                        address: '',
                        telephone: '',
                        gender_id: null,
                        job_position_id: null,
                        eps_id: null,
                        pension_fund_id: '',
                        arl_id: null,
                        contract_type_id: '',
                        salary: 0,
                        entry_date: '',
                        withdrawal_date: '',
                        bank_id: null,
                        bank_account_number: '',
                        emergency_contact: '',
                        employee_status_id: null,
                    },
                    showEmployee: this.initializeFormEditAndShow()
                }
            },
            mounted() {
                this.getEmployees()
                this.getTypesDocuments()
            },
            methods: {
                initializeFieldsStatus() {
                    return {
                        fullName: false,
                        typeDocumentId: false,
                        document_number: false,
                        municipality_id: false,
                        address: false,
                        telephone: false,
                        gender_id: false,
                        eps_id: false,
                        pension_fund_id: false,
                        arl_id: false,
                        contract_type_id: false,
                        salary: false,
                        entry_date: false,
                        bank_id: false,
                        emergency_contact: false,
                    };
                },

                initializeFormEditAndShow() {
                    return {
                        fullName: '',
                        typeDocumentId: null,
                        typeDocumentName: '',
                        documentNumber: '',
                        municipalityId: null,
                        municipalityName: '',
                        address: '',
                        telephone: '',
                        genderId: null,
                        genderName: '',
                        jobPositionId: null,
                        jobPositionName: '',
                        epsId: null,
                        epsName: '',
                        pensionFundId: null,
                        pensionFundName: '',
                        arlId: null,
                        arlName: '',
                        contractTypeId: null,
                        contractTypeName: '',
                        salary: 0,
                        entryDate: '',
                        withdrawalDate: '',
                        bankId: null,
                        bankName: '',
                        bankAccountNumber: '',
                        emergencyContact: '',
                        employeeStatusId: null,
                        employeeStatusName: '',
                    }
                },

                async getEmployees() {
                    this.isLoading = true;
                    try {
                        dataTableUtils.destroyDataTable('tableEmployees')

                        const response = await fetchUtils.fetchGet('{{ route('Employee.GetAll') }}');

                        this.isLoading = false;

                        if (!response.success) {
                            alert(response.message);
                            return;
                        }

                        this.employees = response.employees;
                        await this.$nextTick();
                        dataTableUtils.initializeDataTable('tableEmployees')
                    } catch (error) {
                        this.isLoading = false;
                        alert(error.message);
                    }
                },

                async getTypesDocuments() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('typeDocument.GetAll') }}');
                        this.departments = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async openEditEmployeeModal(id) {
                    // $('#').modal('show')
                    this.editEmployee = await this.loadDataEmployee(id)
                    this.isModalLoading = false;
                    
                },
                
                async openShowEmployeeModal(id) {
                    $('#showEmployee').modal('show')
                    const employee = await this.loadDataEmployee(id)
                    employee.salary = utilities.formatCurrency(employee.salary)
                    this.showEmployee = employee
                    this.isModalLoading = false;
                },

                async loadDataEmployee(id) {
                    this.isModalLoading = true;
                    try {
                        let url = "{{ route('Employee.getById', ['employeeId' => '?']) }}".replace('?', id)
                        const response = await fetchUtils.fetchGet(url)
                        return response.data;
                    } catch (error) {
                        this.isModalLoading = false;
                        alert(error)
                    }
                },
            }
        });
        const vm = app.mount('#app');
</script>
@stop