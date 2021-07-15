@if($employerLateRpCnt != 0 )
@endif
<div class="grid grid-cols-4 gap-4 p-5 h-32">
    <div class="flex flex-col  bg-blue-500 shadow-lg rounded-sm">
        <div class="text-2xl mx-auto text-white mt-auto font-bold">
            {{ \App\Models\Agency::query()->count() }}
        </div>
        <div class="mx-auto text-white mb-auto">{{ __('Agencies') }}</div>
    </div>
    <div class="flex flex-col  bg-blue-500 shadow-lg rounded-sm">
        <div class="text-2xl mx-auto text-white mt-auto font-bold">
            {{ \App\Models\User::query()->where('role','3')->count() }}
        </div>
        <div class="mx-auto text-white mb-auto">{{ __('Employers') }}</div>
    </div>
    <div class="flex flex-col  bg-blue-500 shadow-lg rounded-sm">
        <div class="text-2xl mx-auto text-white mt-auto font-bold">
            {{ \App\Models\Candidate::query()->count() }}
        </div>
        <div class="mx-auto text-white mb-auto">{{ __('OFW') }}</div>
    </div>
    <div class="flex flex-col  bg-blue-500 shadow-lg rounded-sm">
        <div class="text-2xl mx-auto text-white mt-auto font-bold">
            {{ \App\Models\Candidate::query()->where('deployed', 'yes')->count() }}
        </div>
        <div class="mx-auto text-white mb-auto">{{ __('Deployed') }}</div>
    </div>
</div>



<transition name="slide-fade">
    <div class="fixed inset-0 overflow-y-auto" v-if="agency_mdl">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-gray-100 p-3">
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <div class="flex-grow font-bold">
                                {{-- Title--}}
                                Alert Message!
                            </div>
                            <div class="flex-shrink">
                                <button type="button" v-on:click="agency_mdl = false"
                                        class="text-gray-700 hover:text-white hover:bg-red-500 pl-1 pr-1 rounded">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-2">
                    {{-- Message--}}
                    <div class="text-3xl animate-pulse text-center">
                        <i class="fas fa-exclamation-triangle text-red-500"></i>
                        22 Overdue reports detected
                    </div>
                </div>
            </div>
        </div>
    </div>
</transition>

<x-slot name="scripts">
    <script>
        const e = new Vue({
            el: '#app',
            data() {
                return {
                    agency_mdl: false,
                }
            }
        });
    </script>
</x-slot>
