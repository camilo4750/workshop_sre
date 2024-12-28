@extends('adminlte::page')
@section('title', 'Gestion de empleados')
<style>
    .modal-body {
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
            <button class="btn btn-secondary" @click="openCreateEmployeeModal">Crear empleado</button>
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
                                    data-placement="top" title="Editar Usuario"
                                    @click="openEditEmployeeModal(employee.id)">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-table bg-primary" data-toggle="tooltip"
                                    data-placement="top" title="Ver informacion completa"
                                    @click="openShowEmployeeModal(employee.id)">
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
    @include('Employee.Modals.create_employee')
    @include('Employee.Modals.edit_employee')
</div>

<script>
    const app = Vue.createApp({
            data() {
                return {
                    isLoading: false,
                    isModalLoading: false,
                    countries: [],
                    departments: [],
                    municipalities: [],
                    employees: [],
                    typesDocuments: [],
                    genders: [],
                    jobPositions: [],
                    eps: [],
                    pensionFunds: [],
                    arls: [],
                    contractTypes: [],
                    banks: [],
                    employeesStatus: [],
                    createEmployee: {
                        fullName: '',
                        typeDocumentId: null,
                        documentNumber: '',
                        municipalityId: null,
                        address: '',
                        telephone: '',
                        genderId: null,
                        jobPositionId: null,
                        epsId: null,
                        pensionFundId: '',
                        arlId: null,
                        contractTypeId: '',
                        salary: 0,
                        entryDate: '',
                        withdrawalDate: '',
                        bankId: null,
                        bankAccountNumber: '',
                        emergencyContact: '',
                        employeeStatusId: null,
                    },
                    showEmployee: this.initializeFormEditAndShow(),
                    editEmployee: this.initializeFormEditAndShow(),
                    fieldsStatus: this.initializeFieldsStatus(),
                    fetchErrors: [],
                }
            },
            mounted() {
                this.getEmployees()
                this.getCountries()
                this.getDepartments()
                this.getTypesDocuments()
                this.getGenders()
                this.getJobPositions()
                this.getEps()
                this.getPensionFunds()
                this.getArls()
                this.getContractTypes()
                this.getBanks()
                this.getEmployeesStatus()
            },
            watch: {
                'editEmployee.departmentId'(newDepartmentId) {
                    if(newDepartmentId !== null) 
                        this.getMunicipalities(newDepartmentId);
                },
            },
            methods: {
                initializeFieldsStatus() {
                    return {
                        fullName: false,
                        typeDocumentId: false,
                        documentNumber: false,
                        municipalityId: false,
                        address: false,
                        telephone: false,
                        genderId: false,
                        jobPositionId: false,
                        epsId: false,
                        pensionFundId: false,
                        arlId: false,
                        contractTypeId: false,
                        salary: false,
                        entryDate: false,
                        bankId: false,
                        emergencyContact: false,
                        employeeStatusId: false,
                    };
                },

                initializeFormEditAndShow() {
                    return {
                        id: null,
                        fullName: '',
                        typeDocumentId: null,
                        typeDocumentName: '',
                        documentNumber: '',
                        countryId: null,
                        departmentId: null,
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

                async getCountries() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('Country.GetAll') }}');
                        this.countries = response.data                        
                    } catch (error) {
                        alert(error);
                    }
                },

                async getDepartments(id) {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('Department.GetAll') }}');
                        this.departments = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                changeMunicipality(event) {
                    const departmentId = Number(event.target.value)
                    this.getMunicipalities(departmentId)
                },

                async getMunicipalities(id) {
                    try {
                        let url = "{{ route('Municipality.GetById', ['departmentId' => '?']) }}".replace('?', id);    
                        const response = await fetchUtils.fetchGet(url);
                        this.municipalities = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async getTypesDocuments() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('TypeDocument.GetAll') }}');
                        this.typesDocuments = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async getGenders() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('Gender.GetAll') }}');
                        this.genders = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async getJobPositions() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('JobPosition.GetAll') }}');
                        this.jobPositions = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async getEps() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('Eps.GetAll') }}');
                        this.eps = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async getPensionFunds() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('PensionFund.GetAll') }}');
                        this.pensionFunds = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async getArls() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('Arl.GetAll') }}');
                        this.arls = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async getContractTypes() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('ContractType.GetAll') }}');
                        this.contractTypes = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async getBanks() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('Bank.GetAll') }}');
                        this.banks = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async getEmployeesStatus() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('EmployeeStatus.GetAll') }}');
                        this.employeesStatus = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                openCreateEmployeeModal() {
                    this.fetchErrors = []
                    $('#createEmployee').modal('show')
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
                        let url = "{{ route('Employee.GetById', ['employeeId' => '?']) }}".replace('?', id)
                        const response = await fetchUtils.fetchGet(url)
                        return response.data;
                    } catch (error) {
                        this.isModalLoading = false;
                        alert(error)
                    }
                },

                async submintFormStoreEmployee() {
                    const btn = $('#btnStoreEmployee')
                    btn.loading()
                    
                    try {
                        const response = await fetchUtils.fetchPost(
                            '{{ route('Employee.Store') }}',
                            '{{ csrf_token() }}',
                            this.createEmployee
                        );

                        btn.unLoading()

                        if (!response.success) {
                            fetchUtils.validateFields(response.errors, this.fieldsStatus, this.fetchErrors);
                            utilities.toastr_('error', 'Alerta', 'Error al almacenar el empleador');
                            return;
                        }

                        await this.getEmployees();
                        $('#createEmployee').modal('hide');
                        utilities.toastr_('success', response.message);
                    } catch (error) {
                        btn.unLoading()
                        alert(error);
                    }
                },

                async openEditEmployeeModal(id) {
                    $('#editEmployee').modal('show')
                    const employee = await this.loadDataEmployee(id)
                    employee.salary = utilities.formatCurrency(employee.salary)
                    this.editEmployee = employee
                    this.isModalLoading = false;
                },


                async submintFormUpdateEmployee() {
                    const btn = $('#btnEditUser')
                    btn.loading()
                  
                    
                    try {
                        let editEmployeeCopy = JSON.parse(JSON.stringify(this.editEmployee));
                        editEmployeeCopy.salary = utilities.parseCurrency(this.editEmployee.salary);
                        let url = "{{ route('Employee.Update', ['employeeId' => '?']) }}".replace('?', this.editEmployee.id);    
                        const response = await fetchUtils.fetchPost(
                            url,
                            '{{ csrf_token() }}',
                            editEmployeeCopy
                        );

                        btn.unLoading()

                        if (!response.success) {
                            fetchUtils.validateFields(response.errors, this.fieldsStatus, this.fetchErrors);
                            utilities.toastr_('error', 'Alerta', 'Error al actualizar el empleador');
                            return;
                        }

                        await this.getEmployees();
                        $('#editEmployee').modal('hide');
                        utilities.toastr_('success', response.message);
                    } catch (error) {
                        btn.unLoading()
                        alert(error);
                    }
                }
            }
        });
        const vm = app.mount('#app');
</script>
@stop