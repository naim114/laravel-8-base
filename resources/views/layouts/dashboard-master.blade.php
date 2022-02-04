<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('page-title') - {{ trans('app.app-name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset(trans('app.favicon')) }}">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --primary-color-hex: {{ trans('app.color.primary.hex') }};
            --secondary-color-hex: {{ trans('app.color.secondary.hex') }};
            --success-color-hex: {{ trans('app.color.success.hex') }};
            --info-color-hex: {{ trans('app.color.info.hex') }};
            --warning-color-hex: {{ trans('app.color.warning.hex') }};
            --danger-color-hex: {{ trans('app.color.danger.hex') }};

            --primary-color-rgb: {{ trans('app.color.primary.rgb') }};
            --secondary-color-rgb: {{ trans('app.color.secondary.rgb') }};
            --success-color-rgb: {{ trans('app.color.success.rgb') }};
            --info-color-rgb: {{ trans('app.color.info.rgb') }};
            --warning-color-rgb: {{ trans('app.color.warning.rgb') }};
            --danger-color-rgb: {{ trans('app.color.danger.rgb') }};
        }

    </style>

    @yield('custom-head')
</head>

<body class="sb-nav-fixed">
    @include('components.dashboard-topnav')
    @include('components.dashboard-sidenav')
    @include('components.js-script')
    @yield('scripts')
</body>

</html>
