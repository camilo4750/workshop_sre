@extends('adminlte::page')
@section('title', 'Gestion de proveedores')
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
        <div class="my-3" v-if="!isLoading && countries && supplierStatus">
            <table id="suppliersTable" class="table-striped table-bordered dataTable">
                <thead>
                    <tr>
                        <th>Nombre copañia</th>
                        <th>Informacion del contacto</th>
                        <th>Email</th>
                        <th>Municipio</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="supplier in suppliers">
                        <td>@{{ supplier?.companyName }}</td>
                        <td>@{{ supplier?.contactInformation }}</td>
                        <td>@{{ supplier?.email }}</td>
                        <td>@{{ supplier?.municipalityName }}</td>
                        <td>
                            <div class="badge badge-pill" :class="getBadgeClass(supplier.statusName )">
                                @{{ supplier?.statusName }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-table btn-color-table-edit"
                                    :id="'btnToggleStatus' + supplier.id" data-toggle="tooltip" data-placement="top"
                                    title="Editar proveedor" @click="openSupplierEditingModal(supplier)">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-table bg-primary" data-toggle="tooltip"
                                    data-placement="top" title="Ver datos" @click="openSupplierShowModal(supplier)">
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
                    countries: [],
                    departments: [],
                    municipalities: [],
                    supplierStatus: [],
                    supplier: {
                        companyName: '',
                        companyPhone: '',
                        contactInformation: '',
                        nit: '',
                        address: '',
                        email: '',
                        countryId: null,
                        departmentId: null,
                        municipalityId: null,
                        statusId: null,
                    },
                    editSupplier: this.initializeFormEditAndShow,
                    showSupplier: this.initializeFormEditAndShow,
                    fieldsStatus: this.initializeFieldsStatus(),
                    fetchErrors: [],
                }
            },
            mounted() {
                this.getSuppliers();
                this.getCountries();
                this.getSupplierStatus();
                select2Utils.initSimpleSelect2('#municipality');
                select2Utils.bindSelect2Event('#municipality', 'change', (e) => {
                    const selectedValue = $(e.target).val();
                    this.supplier.municipalityId = Number(selectedValue);
                });
            },
            watch: {
                'supplier.countryId'(newCountryId) {
                    if(newCountryId !== null) 
                        this.getDepartments(newCountryId);
                },

                'supplier.departmentId'(newDepartmentId) { 
                    if(newDepartmentId !== null)                    
                        this.getMunicipalities(newDepartmentId)
                },

                'editSupplier.countryId'(newCountryId) {
                    if(newCountryId !== null) 
                        this.getDepartments(newCountryId);
                },

                'editSupplier.departmentId'(newDepartmentId) {
                    if(newDepartmentId !== null) 
                        this.getMunicipalities(newDepartmentId);
                },
            },
            methods: {
                initializeFieldsStatus() {
                    return {
                        companyName: false,
                        companyPhone: false,
                        contactInformation: false,
                        nit: false,
                        address: false,
                        email: false,
                        municipalityId: false,
                        statusId: false,
                    };
                },

                initializeFormEditAndShow() {
                    return {
                        id: null,
                        companyName: '',
                        companyPhone: '',
                        contactInformation: '',
                        nit: '',
                        address: '',
                        email: '',
                        countryId: null,
                        countryName: '',
                        departmentId: null,
                        departmentName: '',
                        municipalityId: null,
                        municipalityName: '',
                        statusId: null,
                    }
                },

                async getSuppliers() {
                    this.isLoading = true;
          
                    try {
                        dataTableUtils.destroyDataTable('suppliersTable')

                        const response = await fetchUtils.fetchGet('{{ route('Supplier.getSuppliers') }}');

                        this.isLoading = false;

                        if (!response.success) {
                            utilities.toastr_('error', 'Alerta', response.message);
                            return;
                        }

                        this.suppliers = response.suppliers;
                        await this.$nextTick();
                        dataTableUtils.initializeDataTable('suppliersTable')
                    } catch (error) {
                        this.isLoading = false;
                        alert(error);
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
                        let url = "{{ route('Department.GetById', ['countryId' => '?']) }}".replace('?', id);    
                        const response = await fetchUtils.fetchGet(url);
                        this.departments = response.data
                    } catch (error) {
                        alert(error)
                    }
                },

                async getMunicipalities(id) {
                    $("#municipality").prop("disabled", true)
                    try {
                        let url = "{{ route('Municipality.GetById', ['departmentId' => '?']) }}".replace('?', id);    
                        const response = await fetchUtils.fetchGet(url);
                        this.municipalities = response.data
                        $("#municipality").prop("disabled", false)
                    } catch (error) {
                        alert(error)
                    }
                },

                async getSupplierStatus() {
                    try {
                        const response = await fetchUtils.fetchGet('{{ route('SupplierStatus.GetAll') }}');
                        this.supplierStatus = response.data                                            
                    } catch (error) {
                        alert(error);
                    }
                },

                openModalCreate() {
                    this.fetchErrors = []
                    $('#createSupplier').modal('show')
                },

                async submintFormStoreSupplier() {
                    const btn = $('#btnStoreSupplier')
                    btn.loading()
                    
                    try {
                        const response = await fetchUtils.fetchPost(
                            '{{ route('Supplier.Store') }}',
                            '{{ csrf_token() }}',
                            this.supplier
                        );

                        btn.unLoading()

                        if (!response.success) {
                            fetchUtils.validateFields(response.errors, this.fieldsStatus, this.fetchErrors);
                            utilities.toastr_('error', 'Alerta', 'Error al almacenar el usuario');
                            return;
                        }

                        await this.getSuppliers();
                        $('#createSupplier').modal('hide');
                        utilities.toastr_('success', response.message);
                    } catch (e) {
                        btn.unLoading()
                        alert('Creating supplier: ' + e);
                    }
                },

                getBadgeClass(status) {
                    switch (status) {
                        case 'Activo':
                        case 'Preferencial':
                        case 'Reactivado':
                            return 'badge-success';
                        case 'Inactivo':
                        case 'Retirado':
                            return 'badge-warning';
                        case 'Suspendido':
                        case 'Bloqueado':
                            return 'badge-danger';
                        case 'Nuevo':
                            return 'badge-info';
                        default:
                            return 'badge-secondary';
                    }
                },

                openSupplierEditingModal(supplierData) {
                   this.initSelectEditMunicipality()
                    this.editSupplier = this.initializeFormEditAndShow()
                    this.fetchErrors = []
                    this.editSupplier = supplierData
                    $('#updateSupplier').modal('show')
                },

                initSelectEditMunicipality() {
                    setTimeout(() => {
                        select2Utils.initSimpleSelect2('#editMunicipality');
                        select2Utils.bindSelect2Event('#editMunicipality', 'change', (e) => {
                            const selectedValue = $(e.target).val();
                            this.editSupplier.municipalityId = Number(selectedValue);
                        });
                    }, 100)
                },

                async updateSupplier() {
                    const btn = $('#btnUpdateSupplier')
                    btn.loading()
                    try {
                        let url = "{{ route('Supplier.Update', ['supplierId' => '?']) }}".replace('?', this.editSupplier.id);    
                        const response = await fetchUtils.fetchPost(
                            url,
                            '{{ csrf_token() }}',
                            this.editSupplier
                        );

                        btn.unLoading()
                        
                        if (!response.success) {
                            fetchUtils.validateFields(response.errors, this.fieldsStatus, this.fetchErrors);
                            utilities.toastr_('error', 'Alerta', 'Error al almacenar el usuario');
                            return;
                        }

                        await this.getSuppliers();
                        $('#updateSupplier').modal('hide');
                        utilities.toastr_('success', response.message);
                    } catch (error) {
                        btn.unLoading()
                        alert(error)
                    }
                },

                openSupplierShowModal (supplier) {
                    this.showSupplier = this.initializeFormEditAndShow()
                    supplier.createdAt = utilities.formatterDate(supplier.createdAt)
                    supplier.updatedAt = utilities.formatterDate(supplier.updatedAt)
                    this.showSupplier = supplier
                    $('#showSupplier').modal('show')
                },

            }
        });
        const vm = app.mount('#app');
</script>
@stop