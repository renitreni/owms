<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('tabang-logo/vector/default.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        html {

            width: 100%;
            height: 100%;
            margin: 0px;
            padding: 0px;
            overflow-x: hidden;

        }

    </style>
</head>

<body style="background: #fef8f5;">
    <nav class="navbar shadow-sm" style="background: #ffffff;">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="https://formofw.com/">
                <div class="row">
                    <div class="col-auto">
                        <img src="{{ asset('images/logo.png') }}" alt="" width="50" height="50"
                            class="d-inline-block align-text-top img-fluid">
                    </div>
                    <div class="col-auto p-0">
                        <p class="mt-3 mb-1 fs-6" style="color: #eb5d1e;">FILIPINO OVERSEAS RESCUE MISSION</p>
                    </div>
                </div>
            </a>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/popper.min.js') }}">
    </script>
    <script src="{{ asset('js/bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
        @yield('scripts')
</body>
</html>
