<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @can('admin')
                    @if($employerLateRpCnt != 0 )
                        <div class="grid grid-cols-3 gap-4 p-5">
                            <div class="col-span-3 shadow-lg">
                                <div
                                    class="animate-pulse text-2xl border-2 text-center p-4 bg-yellow-300 border-b border-gray-200">
                                    <i class="fas fa-exclamation-triangle text-red-600"></i> {{ $employerLateRpCnt }}
                                    late report from Employer(s)
                                </div>
                            </div>
                            <div class="col-span-3 shadow-lg">
                                <div
                                    class="animate-pulse text-2xl border-2 text-center p-4 bg-yellow-500 border-b border-gray-200">
                                    <i class="fas fa-exclamation-triangle text-red-600"></i> {{ $employerLateRpCnt }}
                                    late report from Employee(s)
                                </div>
                            </div>
                        </div>
                    @endif
                @elsecan('agency')
                    <div class="grid grid-cols-3 gap-4 p-5">
                        <div class="col-span-3 shadow-lg">
                            <div
                                class="animate-pulse text-2xl border-2 text-center p-4 bg-yellow-300 border-b border-gray-200">
                                <i class="fas fa-exclamation-triangle text-red-600"></i> 22 Overdue of Reports Detected
                            </div>
                        </div>
                    </div>
                @else
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                @endcan
            </div>
        </div>
    </div>
    <x-slot name="scripts">
    </x-slot>
</x-app-layout>
