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
                        <th>phone</th>
                        <th>Direccion empresa</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="supplier in suppliers">
                        <td>@{{ supplier?.companyName }}</td>
                        <td>@{{ supplier?.nit }}</td>
                        <td>@{{ supplier?.phoneCompany }}</td>
                        <td>@{{ supplier?.address }}</td>
                        <td>@{{ supplier?.email }}</td>
                        <td>
                            <span v-if="supplier.active" class="badge badge-success">Activo</span>
                            <span v-else class="badge badge-danger">Inactivo</span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-info"
                                        :id="'btnToggleStatus' + supplier.id"
                                        data-toggle="tooltip" data-placement="top" title="Cambiar estado del proveedor"
                                        @click="toggleSupplierStatus(supplier.id, supplier.active)">
                                    <i class="fas fa-exchange-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary"
                                        data-toggle="tooltip" data-placement="top" title="Editar proveedor"
                                        @click="openSupplierShowModal(supplier)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-warning"
                                        data-toggle="tooltip" data-placement="top" title="Editar proveedor"
                                        @click="openSupplierEditingModal(supplier)">
                                    <i class="fas fa-pencil-alt"></i>
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
        @include('Supplier.Modals.create_supplier')
        @include('Supplier.Modals.edit_supplier')
        @include('Supplier.Modals.show_supplier')
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
                    editSupplier: {
                        companyName: '',
                        nit: '',
                        phoneCompany: '',
                        email: '',
                        address: '',
                        representative: '',
                        phoneRepresentative: '',
                    },
                    showSupplier: [],
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
                    this.fetchErrors = []
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

                async toggleSupplierStatus(id, status) {
                    const btn = $('#btnToggleStatus' + id);
                    btn.loading()
                    try {
                        const newStatus = !status
                        const res = await fetch('{{ route('Supplier.ToggleStatus') }}', {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                'supplierId': id,
                                'active': newStatus
                            })
                        });
                        const response = await res.json()
                        btn.unLoading()
                        if (!response.success) {
                            utilities.toastr_('error', 'Alerta', response.message)
                            return false;
                        }
                        await this.getSuppliers();
                        utilities.toastr_('success', 'Exito', response.message)
                    } catch (e) {
                        console.log(11123)
                        btn.unLoading()
                        alert(e)
                    }
                },

                openSupplierEditingModal(supplierData) {
                    this.fetchErrors = []
                    this.editSupplier = supplierData
                    $('#updateSupplier').modal('show')
                },

                async updateSupplier() {
                    const btn = $('#btnUpdateSupplier')
                    btn.loading()
                    try {
                        const res = await fetch('{{ route('Supplier.Update') }}', {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(this.editSupplier)
                        })
                        const response = await res.json()
                        btn.unLoading()
                        if (!response.success) {
                            this.validateFieldsStatus(response.errors)
                            utilities.toastr_('error', 'Alerta', response.message);
                            return false
                        }
                        await this.getSuppliers()
                        $('#updateSupplier').modal('hide');
                        utilities.toastr_('success', 'Exito', response.message)
                    } catch (e) {
                        btn.unLoading()
                        alert(e)
                    }
                },

                openSupplierShowModal (supplier) {
                    supplier.createdAt = utilities.formatterDate(supplier.createdAt)
                    this.showSupplier = supplier
                    $('#showSupplier').modal('show')
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
