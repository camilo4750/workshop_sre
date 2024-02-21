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
            <div class="my-3">
                <table id="tableUsers" class="table table-striped table-bordered table-hover dataTable" style="width: 100% !important;">
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

                    <tr v-for="user in users">
                        <td>@{{ user.name_1 + ' ' + user.name_2 }}</td>
                        <td>@{{ user.surname_1 + ' ' + user.surname_2 }}</td>
                        <td>@{{ user.phone }}</td>
                        <td>@{{ user.type_user_id == 1 ? 'Administrador'  : 'Empleador'}}</td>
                        <td>@{{ user.email }}</td>
                        <td>@{{ user.active == true ? 'Activo'  : 'Inactivo'}}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-warning mr-1"  data-toggle="tooltip" data-placement="top" title="Editar Usuario"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-info ml-1"  data-toggle="tooltip" data-placement="top" title="Permisos Usuario"><i class="fas fa-key"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('User.Modals.create_user')
    </div>

    <script>
        const app = Vue.createApp({
            data() {
                return {
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
                    message: 'Hello Vue!'
                }
            },
            mounted(){
                this.getUsers();
            },
            methods: {
                openModalCreateUser() {
                    $('#createUser').modal('show');
                },

                getUsers() {
                    if( $.fn.DataTable.isDataTable('#tableUsers')) {
                        let table = $('#tableUsers').DataTable();
                        table.clear().draw();
                        table.destroy();
                    }
                   setTimeout(function () {
                       this.users = null;
                   }, 300);
                    fetch('{{ route('User.AllUsers') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                    }).then((res) => res.json())
                        .then((response) => {
                            if(!response) {
                                alert('Fallo en la peticion: ', response.message);
                            }

                            this.users = response.users;
                            this.executeDataTable();
                        }).catch((err) => {
                        alert('Error al obtener usuarios: ' + err);
                    });
                },

                storeUser() {
                    this.users = null;
                    fetch('{{ route('User.Create') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            'data': this.createUser
                        })
                    }).then((res) => res.json())
                        .then(response => {
                            if(!response.success) {
                                utilities.toastr_('error', 'Alerta', 'Error al almacenar el usuario');
                                return false;
                            }
                            utilities.toastr_('success', response.message);
                            this.getUsers();
                            $('#createUser').modal('hide');
                        }).catch((err) =>{
                            alert('Error creating user: ' + err);
                        }
                    );
                },

                executeDataTable() {
                  setTimeout(function () {
                      $('#tableUsers').DataTable({
                          language: es_datatables,
                          retrieve: true,
                      });
                  })
                }
            }
        });
        const vm = app.mount('#app');
    </script>
@stop


