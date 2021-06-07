<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="app" class="py-12">
        <div class="flex flex-col">
            <div class="flex flex-row mx-auto">
                <img src="{{ asset('tabang-logo/polo-logo-new.jpg') }}" class="m-2" width="150px" height="150px">
                <img src="{{ asset('tabang-logo/3-star.png') }}" class="m-2" width="150px" height="150px">
                <img src="{{ asset('tabang-logo/dfa.png') }}" class="m-2" width="150px" height="150px">
            </div>
            <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8">
                <p class="text-3xl">Your Account has been temporarily Suspended.</p>
                <p>Reason for suspension: <span class="font-bold bg-red-100 p-1">{{ $agency->status ?? 'Cannot Find Agency Assiged.' }}</span></p>
            </div>
        </div>
    </div>

</x-app-layout>
