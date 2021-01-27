<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div id="app" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @can('admin')
                    @include('components.dashboard-admin')
                @elsecan('agency')
                    @include('components.dashboard-agency')
                @else
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                @endcan
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script>
            const e = new Vue({
               el: '#app',
               data() {
                   return {
                       agency_mdl: true,
                   }
               }
            });
        </script>
    </x-slot>
</x-app-layout>
