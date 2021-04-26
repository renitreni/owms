@if($employerLateRpCnt != 0 )
@endif
<div class="grid grid-cols-4 gap-4 p-5">
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-yellow-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                    {{ \App\Models\Agency::query()->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">{{ __('Agencies') }}</div>
    </div>
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-green-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                {{ \App\Models\User::query()->where('role','3')->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">{{ __('Employers') }}</div>
    </div>
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-pink-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                {{ \App\Models\Candidate::query()->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">{{ __('OFW') }}</div>
    </div>
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-purple-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                {{ \App\Models\Candidate::query()->where('deployed', 'yes')->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">{{ __('Deployed') }}</div>
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
