<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="{{ asset('tabang-logo/vector/default.svg') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{ asset('css/tailwind-datatables.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col justify-between bg-gray-100 relative">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow bg-white shadow bg-indigo-50">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-5 lg:px-7">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="h-auto">
                {{ $slot }}
            </main>
            <footer class="bg-white h-20 pt-5 pl-5 pb-5">
                <div class="inset-y-10 flex flex-row">
                    <div class="mr-2">
                        Languages:
                    </div>
                    <a @if(\Illuminate\Support\Facades\App::isLocale('en')) class="mr-2 text-gray-400" href="#" @else class="mr-2 hover:underline" href="{{ route('set.locale',['locale'=> 'en']) }}" @endif>
                        English (US)
                    </a>
                    <a @if(\Illuminate\Support\Facades\App::isLocale('arb')) class="mr-2 text-gray-400" href="#" @else class="mr-2 hover:underline" href="{{ route('set.locale',['locale'=> 'arb']) }}" @endif>
                        Arabic
                    </a>
                </div>
            </footer>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @include('layouts.alerts')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        {{ $scripts }}
    </body>
</html>
