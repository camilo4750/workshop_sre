@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('styles/login/login.css') }}">
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@section('body')
    <div class="{{ $auth_type ?? 'login' }}-box">
        {{-- Card Box --}}
        <div class="card" >
            {{-- Card Header --}}
            @hasSection('auth_header')
                <div class="card-header p-0 border-bottom-0">
                    <img src="{{asset(config('logo', 'img/logo_sre.png'))}}" class="logo_sre" alt="logo_sre">
                </div>
            @endif

            {{-- Card Body --}}
            <div class="card-body p-4">
                @yield('auth_body')
            </div>

            {{-- Card Footer --}}
            @hasSection('auth_footer')
                <div class="card-footer">
                    @yield('auth_footer')
                </div>
            @endif
        </div>

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
