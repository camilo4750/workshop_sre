@extends('adminlte::page')
@section('title', 'Creacion de servicio')
<style>

</style>
@section('content_header')
    <div class="d-flex align-items-center">
        <h1 class="font-weight-bold ml-3">Creacion servicios</h1>
    </div>
@stop

@section('content')
    <div id="app">
        <div class="card border-color-1 p-2">
        </div>
    </div>

    <script>
        const app = Vue.createApp({
            data() {
                return {}
            },
            mounted() {
                this.getSuppliers()
            },
            methods: {

            }
        })
    </script>
@endsection
