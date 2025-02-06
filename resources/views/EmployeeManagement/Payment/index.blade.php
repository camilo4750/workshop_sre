@extends('adminlte::page')
@section('title', 'Pagos empleados')
<style>
    /* .card-info {
        max-width: 300px;
    } */
</style>
@section('content_header')
    <div class="d-flex align-items-center">
        <h1 class="font-weight-bold ml-3">Pago nominas</h1>
    </div>
@stop
@section('content')
    <div id="app">
        <div class="card border-color-1 p-2">
            <div class="d-flex justify-content-end">
                <button class="btn btn-secondary" @click="openModalCreatePayment">Agregar pago</button>
            </div>
            <div class="my-3" v-if="!isLoading">
                <table id="paymentTable" class="table table-striped table-bordered table-hover dataTable">
                    <thead>
                    <tr>
                        <th>Empleador</th>
                        <th>Fecha inicio de pago</th>
                        <th>Fecha fin de pago</th>
                        <th>Metodo de pago</th>
                        <th>Horas extra</th>
                        <th>Aplica bono</th>
                        <th>Estado de pago</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(payment, index) in paymentDataTable" :key="index">
                        <td>@{{ payment?.employeeName }}</td>
                        <td>@{{ payment?.startPeriod }}</td>
                        <td>@{{ payment?.endPeriod }}</td>
                        <td>
                        <span class="text-bold">
                            @{{ payment?.paymentMethodName }}
                        </span>
                        </td>
                        <td>@{{ payment?.overtimeTotal }}</td>
                        <td>
                            <span class="text-success" v-if="payment.bonus > 0">Si</span>
                            <span class="text-secondary" v-else>No</span>
                        </td>
                        <td>
                            <div class="badge badge-pill" :class="getBadgeClass(payment.paymentStatusName )">
                                @{{  payment?.paymentStatusName }}
                            </div>
                        </td>
                        <td class="d-flex gap-2">
                            <button type="button" class="btn btn-color-table-edit btn-table" data-toggle="tooltip"
                                    data-placement="top" title="Editar Usuario">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button type="button" class="btn btn-table bg-primary" data-toggle="tooltip"
                                    data-placement="top" title="Ver informacion completa">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center align-items-center" v-else>
                @include('preloader')
            </div>
        </div>
        @include('EmployeeManagement.Payment.Modals.create_payment')

    </div>
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    isLoading: false,
                    isLoadInfoModal: false,
                    paymentDataTable: [],
                    activeEmployees: [],
                    paymentMethods: [],
                    paymentStatus: [],
                    createPayment: {
                        employeeId: '',
                        startperiod: '',
                        endperiod: '',
                        paymentMethod: '',
                        payment: null,
                        overtimeTotal: null,
                        overtimePayment: null,
                        bonus: null,
                        total_accured: null,
                        paymentStatusId: null,
                        observations: '',
                    }
                }
            },
            mounted() {
                this.getPaymentTable()
                this.getActiveEmployees()
                this.getPaymentMethods()
                this.getPaymentStatus()
            },
            methods: {
                openModalCreatePayment() {
                    $('#createEmployeePayment').modal('show');
                },

                submitFormStorePayment() {
                    console.log('submit');
                },

                async getPaymentTable() {
                    this.isLoading = true;
                    try {
                        dataTableUtils.destroyDataTable('paymentTable')

                        const response = await fetchUtils.fetchGet('{{ route('EmployeePayment.GetAll') }}');

                        this.isLoading = false;

                        if (!response.success) {
                            alert(response.message);
                            return;
                        }

                        this.paymentDataTable = response.data
                        await this.$nextTick();
                        dataTableUtils.initializeDataTable('paymentTable')
                    }catch (error) {
                        this.isLoading = false;
                        alert(error);
                    }
                },

                async getActiveEmployees() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('Employee.GetListActiveEmployees') }}');
                        this.activeEmployees = response.data
                    } catch (error) {
                        alert(error);
                    }
                },

                async getPaymentMethods() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('PaymentMethod.GetAll') }}');
                        this.paymentMethods = response.data
                    } catch (error) {
                        alert(error);
                    }
                },

                async getPaymentStatus () {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('PaymentStatus.GetAll') }}');
                        this.paymentStatus = response.data
                    } catch (error) {
                        alert(error);
                    }
                },

                getBadgeClass(status) {
                    switch (status) {
                        case "Pago realizado":
                            return 'badge-success';
                        case "Pago en proceso":
                            return 'badge-primary'
                        case "Pago cancelado":
                            return "badge-danger"
                        case "Pago pendiente":
                            return "badge-warning"
                    }
                },
            }
        });
        const vm = app.mount('#app');
    </script>
@stop
