<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 3'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>

    {{-- Custom stylesheets (pre AdminLTE) --}}
    @yield('adminlte_css_pre')

    {{-- Base Stylesheets --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        {{-- Configured Stylesheets --}}
        @include('adminlte::plugins', ['type' => 'css'])

        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

        @if(config('adminlte.google_fonts.allowed', true))
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        @endif
    @else
        <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
    @endif
    <link rel="stylesheet" href="{{ asset('styles/settings/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/index.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/global.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('js/Toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('js/DataTables/dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('js/DataTables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('js/DataTables/responsive.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/Select2/select2.min.css') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.0/css/all.min.css"
          integrity="sha512-eBNnVs5xPOVglLWDGXyZnZZ2K2ixXhR/3aECgCpFnW2dGCd/yiqXZ6fcB3BubeA91kM6NX234b6Wrah8RiYAPA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Livewire Styles --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireStyles
        @else
            <livewire:styles />
        @endif
    @endif

    {{-- Custom Stylesheets (post AdminLTE) --}}
    @yield('adminlte_css')

    {{-- Favicon --}}
    @if(config('adminlte.use_ico_only'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    @elseif(config('adminlte.use_full_favicon'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
        <link rel="manifest" crossorigin="use-credentials" href="{{ asset('favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    @endif
    {{-- Vue3 --}}
    <script src="{{ asset('js/Vue/vue3.js') }}"></script>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    {{-- Utilidades --}}
    <script src="{{asset('js/Utilities.js')}}"></script>

    {{-- Utilidades datatables --}}
    <script src="{{asset('js/DataTableUtils.js')}}"></script>

    {{-- Utilidades fetch --}}
    <script src="{{asset('js/FetchUtils.js')}}"></script>

    {{-- Toastr --}}
    <script src="{{ asset('js/Toastr/toastr.js') }}"></script>

    {{-- dataTables --}}
    <script src="{{ asset('js/DataTables/dataTables.js') }}"></script>
    <script src="{{ asset('js/DataTables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('js/DataTables/es.js') }}"></script>
    <script src="{{ asset('js/DataTables/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('js/DataTables/responsive.bootstrap4.js') }}"></script>

     {{-- Select2 --}}
     <script src="{{ asset('js/Select2/select2.min.js') }}"></script>
     <script src="{{ asset('js/Select2Utils.js') }}"></script>
</head>

<body class="@yield('classes_body')" @yield('body_data')>

    {{-- Body Content --}}
    @yield('body')

    {{-- Base Scripts --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

        {{-- Configured Scripts --}}
        @include('adminlte::plugins', ['type' => 'js'])

        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @else
        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif

    {{-- Livewire Script --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireScripts
        @else
            <livewire:scripts />
        @endif
    @endif

    {{-- Custom Scripts --}}
    @yield('adminlte_js')
<script>
    $.fn.loading = function () {
        let elementsToLoading = $(this).is("div, form") ? $(this).find('[type="submit"], .submit') : [this];
        elementsToLoading[0].prop('disabled', true);
        elementsToLoading[0].append(
            '<span class="__loading"><i class="fa fa-spinner fa-spin"></i></span>'
        );
    }

    $.fn.unLoading = function () {
        let elementsToLoading = $(this).is("div, form") ? $(this).find('[type="submit"], .submit') : [this];
        elementsToLoading[0].find('.__loading').remove()
        elementsToLoading[0].prop('disabled', false);
    }

    setTimeout(() => {
        $('[data-toggle="tooltip"]').tooltip()
    }, 100);   
</script>

</body>

</html>
