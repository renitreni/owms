<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="app" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p>Your Account has been temporarily Suspended.</p>
            <p>Reason for suspension: <span class="font-bold bg-red-100 p-1">{{ $agency->status }}</span></p>
        </div>
    </div>

</x-app-layout>
