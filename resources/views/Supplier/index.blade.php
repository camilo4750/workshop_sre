@extends('adminlte::page')
@section('title', 'Gestion de proveedores')
<style>
    #supplierTable th, #supplierTable td {
        text-align: left;
    }
</style>
@section('content_header')
    <div class="d-flex align-items-center">
        <h1 class="font-weight-bold ml-3">Gestion de proveedores</h1>
    </div>
@stop

@section('content')
    <div id="app">
        <div class="card border-color-1 p-2">
            <div class="d-flex justify-content-end mb-2">
                <button class="btn btn-secondary" @click="openModalCreate()">Crear proveedor</button>
            </div>
            <div class="my-3" v-if="!isLoading">
                <table id="supplierTable" class="display nowrap table-striped table-bordered w-100">
                    <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Nit</th>
                        <th>representante</th>
                        <th>phone</th>
                        <th>Direccion empresa</th>
                        <th>Email</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="supplier in suppliers">
                        <td>@{{ supplier?.company_name }}</td>
                        <td>@{{ supplier?.nit }}</td>
                        <td>@{{ supplier?.representative }}</td>
                        <td>@{{ supplier?.phone }}</td>
                        <td>@{{ supplier?.address }}</td>
                        <td>@{{ supplier?.email }}</td>
                        <td>
                            <span v-if="supplier.active" class="badge badge-success" >Activo</span>
                            <span v-else class="badge badge-danger">Inactivo</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center align-items-center" v-else>
                @include('preloader')
            </div>
        </div>
        @include('Supplier.Modals.create_supplier')
    </div>

    <script>
        const app = Vue.createApp({
            data() {
                return {
                    isLoading: false,
                    suppliers: [],
                    fetchErrors: [],
                    supplier: {
                        companyName: '',
                        nit: '',
                        phoneCompany: '',
                        email: '',
                        address: '',
                        representative: '',
                        phoneRepresentative: '',
                        active: false
                    },
                    fieldsStatus: {
                        companyName: false,
                        nit: false,
                        phoneCompany: false,
                        email: false,
                        address: false,
                        representative: false,
                        phoneRepresentative: false,
                        active: false
                    }
                }
            },
            mounted() {
                this.getSuppliers()
            },
            methods: {
                async getSuppliers() {
                    this.isLoading = true;
                    if ($.fn.DataTable.isDataTable('#tableUsers')) {
                        let table = $('#tableUsers').DataTable();
                        table.destroy();
                    }
                    try {
                        const res = await fetch('{{ route('Supplier.AllSuppliers') }}', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                            }
                        });
                        this.isLoading = false;
                        const response = await res.json()
                        if (!response.success) {
                            throw new Error(response.message);
                        }
                        this.suppliers = response.suppliers
                        await this.executeDataTable()
                    } catch (e) {
                        this.isLoading = false;
                        alert('Obtener proveedores -> ' + e);
                    }

                },

                openModalCreate() {
                    $('#createSupplier').modal('show')
                },

                async storeSupplier() {
                    const btn = $('#btnStoreSupplier')
                    btn.loading()
                    let formDataCopy = this.supplier;
                    try {
                        const res = await fetch('{{ route('Supplier.Store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(formDataCopy)
                        });
                        const response = await res.json()
                        btn.unLoading()
                        if (!response.success) {
                            this.validateFieldsStatus(response.errors);
                            utilities.toastr_('error', 'Alerta', response.message);
                            return false;
                        }
                        await this.getSuppliers();
                        $('#createSupplier').modal('hide')
                        utilities.toastr_('success', 'Exito', response.message);
                    } catch (e) {
                        btn.unLoading()
                        alert('Creating supplier: ' + e);
                    }
                },

                validateFieldsStatus(errors) {
                    this.fetchErrors = errors;
                    Object.keys(this.fetchErrors).forEach(key => {
                        this.fieldsStatus[key] = true
                    })
                },

                async executeDataTable() {
                    await this.$nextTick();
                    $('#supplierTable').DataTable({
                        language: es_datatables,
                        responsive: true,
                        retrieve: true,
                        order: []
                    });
                },
            }
        });
        const vm = app.mount('#app');
    </script>
@stop
