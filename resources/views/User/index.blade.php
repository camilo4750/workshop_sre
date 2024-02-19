@extends('adminlte::page')
@section('title', 'Panel de usuarios')
@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div id="app">
        <div class="card border-color-1 p-2">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary font-weight-bolder" @click="openModalCreateUser">
                    Crear Usuario
                </button>
            </div>
            @{{ message }}
            <div class="">
                <table id="tableUsers" class="table table-striped table-bordered" style="width:100%">
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
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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
                    createUser: {
                        firstName: '',
                        secondName: '',
                        firstSurname: '',
                        secondSurname: '',
                        telephone: '',
                        typeUser: '',
                        email: '',
                        password: '',
                        isActive: true
                    },
                    message: 'Hello Vue!'
                }
            },
            mounted(){
                let tableUser = $('#tableUsers').DataTable({
                    language: es_datatables,
                });
            },
            methods: {
                openModalCreateUser() {
                    $('#createUser').modal('show');
                },

                storeUser() {
                  fetch('{{route('register')}}', {
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

                      }).catch(
                          err => alert('Error creating user: ' + err)
                  );
                }
            }
        });
        const vm = app.mount('#app');
    </script>
@stop


