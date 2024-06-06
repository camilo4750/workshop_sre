@extends('adminlte::page')
@section('title', 'Panel de usuarios')
<style>
    #tableUsers colgroup {
        display: none;
    }
</style>
@section('content_header')
    <div class="d-flex align-items-center">
        <h1 class="font-weight-bold ml-3">Usuarios</h1>
    </div>
@stop

@section('content')
    <div id="app">
        <div class="card border-color-1 p-2">
            <div class="d-flex justify-content-end mb-2     ">
                <button type="button" class="btn btn-secondary font-weight-bolder" @click="openModalCreateUser">
                    Crear Usuario
                </button>
            </div>
            <div class="my-3" v-if="!isLoading">
                <table id="tableUsers" class="table table-striped table-bordered table-hover dataTable"
                       style="width: 100% !important;">
                    <thead>
                    <tr class="text-center">
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="">

                    <tr v-for="(user, index) in users" :key="index">
                        <td>@{{ user.name_1 + ' ' + user.name_2 }}</td>
                        <td>@{{ user.surname_1 + ' ' + user.surname_2 }}</td>
                        <td>@{{ user.phone }}</td>
                        <td>@{{ user.type_user_id == 1 ? 'Administrador' : 'Empleador'}}</td>
                        <td>@{{ user.email }}</td>
                        <td>@{{ user.active == true ? 'Activo' : 'Inactivo'}}</td>
                        <td class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-warning"
                                    data-toggle="tooltip" data-placement="top" title="Editar Usuario"
                                    @click="openModalEditUser(user)">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-info"
                                    data-toggle="tooltip" data-placement="top"
                                    @click="openModalPermissions"
                                    title="Permisos Usuario">
                                <i class="fas fa-key"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center align-items-center" v-else>
                <div class="" style="width: 80px; height: 80px">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200">
                        <circle fill="#110202" stroke="#110202" stroke-width="15" r="15" cx="40" cy="65">
                            <animate attributeName="cy" calcMode="spline" dur="1" values="65;135;65;"
                                     keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4">
                            </animate>
                        </circle>
                        <circle fill="#110202" stroke="#110202" stroke-width="15" r="15" cx="100" cy="65">
                            <animate attributeName="cy" calcMode="spline" dur="1" values="65;135;65;"
                                     keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2">
                            </animate>
                        </circle>
                        <circle fill="#110202" stroke="#110202" stroke-width="15" r="15" cx="160" cy="65">
                            <animate attributeName="cy" calcMode="spline" dur="1" values="65;135;65;"
                                     keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0">
                            </animate>
                        </circle>
                    </svg>
                </div>

            </div>
        </div>
        @include('User.Modals.create_user')
        @include('User.Modals.edit_user')
        @include('User.Modals.permissions')
    </div>

    <script>
        const app = Vue.createApp({
            data() {
                return {
                    isLoading: false,
                    users: null,
                    createUser: {
                        firstName: '',
                        secondName: '',
                        firstSurname: '',
                        secondSurname: '',
                        telephone: '',
                        typeUser: '',
                        email: '',
                        password: '',
                        password_confirmation: '',
                        isActive: true
                    },
                    editUser: {
                        id: '',
                        firstName: '',
                        secondName: '',
                        firstSurname: '',
                        secondSurname: '',
                        telephone: '',
                        typeUser: '',
                        email: '',
                        isActive: null
                    },
                    fieldsStatus: {
                        firstName: false,
                        secondName: false,
                        firstSurname: false,
                        secondSurname: false,
                        telephone: false,
                        typeUser: false,
                        email: false,
                        password: false,
                        password_confirmation: false,
                    },
                    fieldsStatusEdit: {
                        firstName: false,
                        secondName: false,
                        firstSurname: false,
                        secondSurname: false,
                        telephone: false,
                        typeUser: false,
                        email: false,
                    },
                    fetchErrors: [],
                }
            },
            mounted() {
                this.getUsers();
            },
            methods: {
                openModalCreateUser() {
                    this.fetchErrors = []
                    $('#createUser').modal('show');
                },

                async getUsers() {
                    this.isLoading = true;
                    if ($.fn.DataTable.isDataTable('#tableUsers')) {
                        let table = $('#tableUsers').DataTable();
                        table.destroy();
                    }
                    try {
                        const res = await fetch('{{ route('User.AllUsers') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        });
                        const response = await res.json();
                        this.isLoading = false;
                        if (!response.success) {
                            alert('Fallo en la peticion: ', response.message);
                        }
                        this.users = response.users;
                        await this.executeDataTable();
                    } catch (e) {
                        this.isLoading = false;
                        alert('Error al obtener usuarios: ' + e);
                    }
                },

                async storeUser() {
                    const btn = $('#btnCreateUser')
                    btn.loading()
                    try {
                        const res = await fetch('{{ route('User.Create') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(this.createUser)
                        });
                        const response = await res.json()
                        btn.unLoading()
                        if (!response.success) {
                            utilities.toastr_('error', 'Alerta', 'Error al almacenar el usuario: ' + response.message);
                            this.validateFieldsStatus(response.errors);
                            return false;
                        }
                        await this.getUsers();
                        $('#createUser').modal('hide');
                        utilities.toastr_('success', response.message);
                    } catch (e) {
                        btn.unLoading()
                        alert('Error creating user: ' + e);
                    }
                },

                openModalEditUser(user) {
                    this.fetchErrors = []
                    this.editUser.id = user.id;
                    this.editUser.firstName = user.name_1;
                    this.editUser.secondName = user.name_2;
                    this.editUser.firstSurname = user.surname_1;
                    this.editUser.secondSurname = user.surname_2;
                    this.editUser.telephone = user.phone;
                    this.editUser.typeUser = user.type_user_id;
                    this.editUser.email = user.email;
                    this.editUser.isActive = user.active;
                    $('#editUserModal').modal('show')
                },

                async updateUser() {
                    const btn = $('#btnEditUser');
                    btn.loading();
                    try {
                        const res = await fetch('{{ route('User.Update') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(this.editUser)
                        });
                        const response = await res.json();
                        console.log(response)
                        btn.unLoading();
                        if (!response.success) {
                            utilities.toastr_('error', 'Alerta', 'Error al almacenar el usuario: ' + response.message);
                            this.validateFieldsEdit(response.errors);
                            return false;
                        }
                        await this.getUsers()
                        $('#editUserModal').modal('hide')
                        utilities.toastr_('success', 'Exito', response.message)
                    } catch (e) {
                        btn.unLoading();
                        alert('Error al actulizar: ' + e);
                    }
                },

                openModalPermissions() {
                    $('#permissionsModal').modal('show')
                },

                async executeDataTable() {
                    await this.$nextTick();
                    $('#tableUsers').DataTable({
                        language: es_datatables,
                        retrieve: true,
                        order: []
                    });
                },

                validateFieldsStatus(errors) {
                    this.fetchErrors = errors;
                    Object.keys(this.fetchErrors).forEach(key => {
                        this.fieldsStatus[key] = true;
                    })
                },

                validateFieldsEdit(errors) {
                    this.fetchErrors = errors;
                    Object.keys(this.fetchErrors).forEach(key => {
                        this.fieldsStatusEdit[key] = true;
                    })
                },
            }
        });
        const vm = app.mount('#app');
    </script>
@stop


