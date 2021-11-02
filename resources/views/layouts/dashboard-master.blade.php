<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('page-title') - {{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ trans('app.favicon') }}">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    @yield('custom-head')
</head>

<body class="sb-nav-fixed">
    @include('components.dashboard-topnav')
    @include('components.dashboard-sidenav')
    @include('components.js-script')
    @yield('scripts')
</body>

</html>
