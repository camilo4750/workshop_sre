@extends('adminlte::page')
@section('title', 'Panel de usuarios')
<style>
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
        <div class="d-flex justify-content-end mb-2">
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
                        <th>Fecha Creación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                    <tr v-for="(user, index) in users" :key="index">
                        <td>@{{ user.fullName }}</td>
                        <td>@{{ user.phone }}</td>
                        <td>@{{ user.email }}</td>
                        <td>@{{ user.createAt }}</td>
                        <td :class="user.active ? 'text-success' : 'text-red'">
                            @{{ user.active ? 'Activo' : 'Inactivo'}}
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-color-table-edit btn-table" data-toggle="tooltip"
                                    data-placement="top" title="Editar Usuario" @click="openModalEditUser(user)">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-color-table-permissions btn-table"
                                    data-toggle="tooltip" data-placement="top" title="Permisos Usuario"
                                    @click="openModalPermissions">
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
                        phone: '',
                        email: '',
                        password: '',
                        password_confirmation: '',
                        active: 1
                    },
                    editUser: {
                        id: null,
                        fullName: null,
                        phone: null,
                        email: null,
                        active: null
                    },
                    fieldsStatus: this.initializeFields(),
                    fetchErrors: [],
                }
            },
            mounted() {
                this.getUsers();
            },
            methods: {
                initializeFields() {
                    return {
                        fullName: false,
                        phone: false,
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
                            alert(response.message);
                            return;
                        }

                        this.users = response.users;
                        await this.$nextTick();
                        dataTableUtils.initializeDataTable('tableUsers')
                    } catch (error) {
                        this.isLoading = false;
                        alert(error.message);
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
                    this.fieldsStatus = this.initializeFields()
                    this.editUser = {...user};
                    $('#editUserModal').modal('show')
                },

                async submintFormUpdateUser() {
                    const btn = $('#btnEditUser');
                    btn.loading();
                    try {
                        let url = "{{ route('User.Update', ['userId' => '?']) }}".replace('?', this.editUser.id);                        
                        const response = await fetchUtils.fetchPost(
                            url,
                            '{{ csrf_token() }}',
                            this.editUser
                        );

                        btn.unLoading();
                        if (!response.success) {                            
                            this.handleErrors(response.errors, response.message);
                            return;
                        }

                        await this.getUsers()
                        utilities.toastr_('success', 'Exito', response.message)
                        $('#editUserModal').modal('hide')
                    } catch (error) {
                        btn.unLoading();
                        console.error("Error en la solicitud:", error);                 
                    }
                },

                openModalPermissions() {
                    $('#permissionsModal').modal('show')
                },

                togglePassword(nameInput) {
                    const passwordInput = document.getElementById(nameInput);
                    const isPasswordVisible = passwordInput.type === 'password';
                    passwordInput.type = isPasswordVisible ? 'text' : 'password';
                    this.textContent = isPasswordVisible ? 'Hide' : 'Show';
                },

                handleErrors(errors, message) {
                    fetchUtils.validateFields(errors, this.fieldsStatus, this.fetchErrors);
                    utilities.toastr_('error', 'Alerta', message);
                }
            }
        });
        const vm = app.mount('#app');
</script>
@stop