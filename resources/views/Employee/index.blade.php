@extends('adminlte::page')
@section('title', 'Gestion de empleados')
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
                        <td>@{{ employee.fullName }}</td>
                        <td>@{{ employee.documentNumber }}</td>
                        <td>@{{ employee.telephone }}</td>
                        <td>@{{ employee.jobPositionName }}</td>
                        <td>@{{ employee.entryDate}}</td>
                        <td>@{{employee.status}}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-color-table-edit btn-table" data-toggle="tooltip"
                                    data-placement="top" title="Editar Usuario" @click="openEditEmployeeModal(employee.id)">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-table bg-primary" data-toggle="tooltip"
                                    data-placement="top" title="Ver informacion completa" @click="openShowEmploteeModal(employee.id)">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const app = Vue.createApp({
            data() {
                return {
                    isLoading: false,
                    employees: [],
                }
            },
            mounted() {
                this.getEmployees()
            },
            methods: {
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

                openEditEmployeeModal($id) {
                    $('#').modal('show')
                },
                
                openShowEmploteeModal($id) {
                    $('#').modal('show')
                },
            }
        });
        const vm = app.mount('#app');
</script>
@stop