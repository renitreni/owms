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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/tailwind-datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="flex flex-col h-screen bg-gray-100 relative">

        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="flex-none bg-white shadow bg-white shadow bg-indigo-50">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-5 lg:px-7">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main id="slot" class="flex-grow overflow-auto">
            @isset($slot)
                {{ $slot }}
            @endisset
            @isset($component)
                <{{ $component }} data='{!! json_encode($data) !!}'>
                </{{ $component }}>
            @endisset
        </main>

        <!-- Footer -->
        <footer class="flex-none bg-white">
            <div class="inset-y-10 flex flex-row p-8">
                <div class="mr-2">
                    {{ __('Languages') }}:
                </div>
                <a @if (app()->getLocale() === 'en') ) class="mr-2 text-gray-400" href="#"
        @else class="mr-2 hover:underline" href="{{ route('set.locale', ['locale' => 'en']) }}" @endif>
                    {{ __('English (US)') }}
                </a>
                <a @if (app()->getLocale() === 'arb') class="mr-2 text-gray-400" href="#"
        @else class="mr-2 hover:underline" href="{{ route('set.locale', ['locale' => 'arb']) }}" @endif>
                    {{ __('Arabic (ARB)') }}
                </a>
            </div>
        </footer>
    </div>
    @include('layouts.alerts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var language = window.navigator.userLanguage || window.navigator.language;
        @if (!session()->has('locale'))
            if (language == 'en') {
            } else {
            window.location = '{{ route('set.locale', ['locale' => 'en']) }}'
            }
        @endif
        @isset($component)
            const e = new Vue({
                el: '#slot'
            });
        @endisset
    </script>
    @isset($scripts)
        {{ $scripts }}
    @endisset
    <script>
        window._locale = '{{ app()->getLocale() }}';
        window._translations = {!! cache('translations') !!};
    </script>
</body>

</html>
