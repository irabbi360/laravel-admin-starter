<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('devstarit.app_name') }} - {{ config('devstarit.app_desc') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
<!-- Navbar -->
@include('admin.includes.navbar')
<!-- /.navbar -->

<div class="container-fluid">
    <div class="row">
        @include('admin.includes.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @include('admin.includes.breadcrumb')
            @include('admin.includes.flash')
            @yield('content')
        </main>

    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>
@yield('scripts')
</body>
</html>
