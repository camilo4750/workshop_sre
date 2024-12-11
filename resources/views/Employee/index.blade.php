@extends('adminlte::page')
@section('title', 'Gestion de empleados')
@section('content_header')
<div class="d-flex align-items-center">
    <h1 class="font-weight-bold ml-3">Gestion de empleados</h1>
</div>
@stop
@section('content')
<div id="app">
    <div class="card border-color-1 p-2">
        <div class="d-flex justify-content-end mb-2">
            <button class="btn btn-secondary">Crear empleado</button>
        </div>
        <div class="my-3" v-if="!isLoading">

        </div>
    </div>
</div>

<script>
     const app = Vue.createApp({
            data() {
                return {
                    isLoading: false,
                }
            },
            mounted() {

            },
            methods: {
                
            }
        });
        const vm = app.mount('#app');
</script>
@stop