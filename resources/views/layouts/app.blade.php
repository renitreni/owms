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
        <header class="flex flex-row bg-white shadow bg-white shadow bg-indigo-50">
            <div class="flex flex-row max-w-7xl ml-20 py-6 px-4 sm:px-5 lg:px-7">
                <div class="relative w-12" x-data="{alertMdl : false}">
                    @php
                        $model =  \App\Models\AgencyAlert::hasAlert()
                    @endphp
                    @if($model)
                        <i style="color: {{ $model->level->color_level }}"
                           class="fas fa-exclamation-triangle absolute text-4xl animate-ping"></i>
                        <i style="color: {{ $model->level->color_level }}" @click="alertMdl = true"
                           class="fas fa-exclamation-triangle absolute text-4xl"></i>
                        <div x-show="alertMdl" class="fixed inset-0 overflow-y-100">
                            <div
                                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                            >
                                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>
                                <span
                                    class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                    aria-hidden="true"
                                >&#8203;</span
                                >
                                <div
                                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                                    role="dialog"
                                    aria-modal="true"
                                    aria-labelledby="modal-headline"
                                >
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div
                                                class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                                            >
                                                <div class="mt-6">
                                                    {{ $model->level->description }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                                    >
                                        <button
                                            @click="alertMdl = false"
                                            type="button"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        >
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
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
