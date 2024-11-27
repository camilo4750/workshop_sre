@extends('adminlte::page')
@section('title', 'Panel de usuarios')
<style>
    #tableUsers colgroup {
        display: none;
    }

    .mx-3px {
        padding-inline: 3px;
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
            <button type="button" class="btn btn-color-dark font-weight-bolder" @click="openModalCreateUser">
                Crear Usuario
            </button>
        </div>
        <div v-if="!isLoading" class="my-3">
            <table id="tableUsers" class="table table-striped table-bordered table-hover dataTable"
                style="width: 100% !important;">
                <thead>
                    <tr class="text-center">
                        <th>Nombre completo</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr v-for="(user, index) in users" :key="index">
                        <td>@{{ user.full_name }}</td>
                        <td>@{{ user.phone }}</td>
                        <td>@{{ user.email }}</td>
                        <td>@{{ user.active == true ? 'Activo' : 'Inactivo'}}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-table "
                                    :class="user.active ? 'btn-color-table-active' : 'btn-color-table-inactive'"
                                    data-toggle="tooltip" data-placement="top" @click="toggleStatus"
                                    :title="user.active ? 'Inactivar usuario' : 'Activar usuario'">
                                    <i :class="`fas ${user.active ? 'fa-check' : 'fa-times mx-3px'}`"></i>
                                </button>
                                <button type="button" class="btn btn-color-table-edit btn-table" data-toggle="tooltip"
                                    data-placement="top" title="Editar Usuario" @click="openModalEditUser(user)">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-color-table-permissions btn-table" data-toggle="tooltip"
                                    data-placement="top" title="Permisos Usuario" @click="openModalPermissions">
                                    <i class="fas fa-key"></i>
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
    @include('User.Modals.create_user')
    @include('User.Modals.edit_user')
    @include('User.Modals.permissions')
</div>

<script>
    const app = Vue.createApp({
            data() {
                return {
                    isLoading: false,
                    users: [],
                    createUser: {
                        fullName: '',
                        telephone: '',
                        email: '',
                        password: '',
                        password_confirmation: '',
                        isActive: true
                    },
                    editUser: {
                        id: '',
                        fullName: '',
                        telephone: '',
                        email: '',
                        isActive: null
                    },
                    fieldsStatus: this.initializeFields(),
                    fieldsStatusEdit: this.initializeFields(),
                    fetchErrors: [],
                }
            },
            mounted() {
                this.getUsers();
            },
            methods: {
                initializeFields() {
                    return {
                        firstName: false,
                        secondName: false,
                        firstSurname: false,
                        secondSurname: false,
                        telephone: false,
                        email: false,
                        password: false,
                        password_confirmation: false,
                    };
                },

                openModalCreateUser() {
                    this.fetchErrors = []
                    $('#createUser').modal('show');
                },

                async getUsers() {
                    this.isLoading = true;
                    try {
                        dataTableUtils.destroyDataTable('tableUsers')

                        const response = await fetchUtils.fetchGet('{{ route('User.AllUsers') }}');

                        this.isLoading = false;

                        if (!response.success) {
                            alert('Fallo en la peticion: ', response.message);
                            return;
                        }

                        this.users = response.users;

                        await this.$nextTick();
                        dataTableUtils.initializeDataTable('tableUsers')
             
                    } catch (error) {
                        this.isLoading = false;
                        alert('Error al obtener usuarios: ' + error.message);
                    }
                },

                async submintFormStoreUser() {
                    const btn = $('#btnCreateUser')
                    btn.loading()
                    try {
                        const response = await fetchUtils.fetchPost(
                            '{{ route('User.Create') }}',
                            '{{ csrf_token() }}',
                            this.createUser
                        );
                       
                        btn.unLoading()

                        if (!response.success) {
                            fetchUtils.validateFields(response.errors, this.fieldsStatus, this.fetchErrors);
                            utilities.toastr_('error', 'Alerta', 'Error al almacenar el usuario');
                            return;
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
                    this.editUser.firstName = user.full_name;
                    this.editUser.telephone = user.phone;
                    this.editUser.email = user.email;
                    this.editUser.isActive = user.active;
                    $('#editUserModal').modal('show')
                },

                async updateUser() {
                    const btn = $('#btnEditUser');
                    btn.loading();
                    try {
                        const response = await fetchUtils.fetchPost(
                            '{{ route('User.Update') }}',
                            '{{ csrf_token() }}',
                            this.editUser
                        );

                        btn.unLoading();
                        if (!response.success) {
                            fetchUtils.validateFields(response.errors, this.fieldsStatus, this.fetchErrors);
                            utilities.toastr_('error', 'Alerta', 'Error al almacenar el usuario: ' + response.message);
                            return;
                        }

                        await this.getUsers()

                        utilities.toastr_('success', 'Exito', response.message)
                        $('#editUserModal').modal('hide')
                    } catch (e) {
                        btn.unLoading();
                        alert('Error al actulizar: ' + e);
                    }
                },

                openModalPermissions() {
                    $('#permissionsModal').modal('show')
                },


                toggleStatus () {

                },

                togglePassword(nameInput) {
                    const passwordInput = document.getElementById(nameInput);
                    const isPasswordVisible = passwordInput.type === 'password';
                    passwordInput.type = isPasswordVisible ? 'text' : 'password';
                    this.textContent = isPasswordVisible ? 'Hide' : 'Show';
                }
            }
        });
        const vm = app.mount('#app');
</script>
@stop