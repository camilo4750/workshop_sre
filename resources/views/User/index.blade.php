@extends('adminlte::page')
@section('title', 'Panel de usuarios')
@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div id="app">
        <div class="card border-color-1 p-2">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary font-weight-bolder"
                        data-bs-toggle="modal" data-bs-target="#createUser">
                    Crear Usuario
                </button>
            </div>
            @{{ message }}
        </div>
        @include('User.Modals.create_user')
    </div>

    <script>

        const app = Vue.createApp({
            data() {
                return {
                    message: 'Hello Vue!'
                }
            }
        });
        const vm = app.mount('#app');
    </script>
@stop


