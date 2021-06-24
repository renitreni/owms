<div class="grid grid-cols-4 gap-4 p-5">
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-yellow-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                    {{ \App\Models\Candidate::query()->where('agency_id',auth()->id())->where('status', 'applicant')->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">{{ __('My Applicants') }}</div>
    </div>
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-green-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                {{ \App\Models\User::query()->where('role','3')->where('agency_id',auth()->id())->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">{{ __('My Employers') }}</div>
    </div>
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-pink-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                {{ \App\Models\User::query()->where('role','5')->where('agency_id',auth()->id())->count() }}
                </span>
        </div>
        <div class="md:text-2xl font-semibold mt-6">{{ __('My Affiliates') }}</div>
    </div>
    <div class="col-span-2 md:col-span-1 p-2 rounded shadow text-gray-600 bg-purple-300">
        <div class="font-merriweather mb-1 text-center md:text-5xl">
                <span class="bg-gray-200 text-center rounded-full p-5">
                {{ \App\Models\Candidate::query()->where('agency_id',auth()->id())->where('deployed', 'yes')->where('status', 'employed')->count() }}
                </span>
        </div>
        <div class="md:text-xl font-semibold mt-6">{{ __('Deployed and Employed') }}</div>
    </div>
</div>
<div class="flex flex-col md:flex-row  mb-5 mt-2 ml-4">
    <a href="#" @click="openHSWMdl"
       class="mt-2 text-white bg-indigo-400 hover:bg-indigo-500 p-2 rounded shadow sm:mr-2">
        <i class="fas fa-house-user"></i> {{ __('Request Contract HSW') }}
    </a>
    <a href="#" @click="openSWMdl"
       class="mt-2 text-white bg-blue-400 hover:bg-blue-500 p-2 rounded shadow sm:mr-2">
        <i class="fas fa-user-graduate"></i> {{ __('Request Contract SW') }}
    </a>
</div>
<div style='border-bottom: 2px solid #eaeaea'>
    <ul class='flex cursor-pointer'>
        <li class='py-2 px-6 bg-white rounded-t-lg' v-bind:class="{'text-gray-500 bg-gray-200': (panel != 2) }"
            @click="panel = 2">Contracts
        </li>
        <li class='py-2 px-6 bg-white rounded-t-lg' v-bind:class="{'text-gray-500 bg-gray-200': (panel != 1) }"
            @click="panel = 1">Complaints
        </li>
    </ul>
</div>
<div>
    <div class="m-5" v-show="panel == 1">
        <table id="complains-table" class="stripe hover" style="width:100%;"></table>
    </div>
    <div class="m-5" v-show="panel == 2">
        <table id="contract-table" class="stripe hover" style="width:100%;"></table>
    </div>
</div>

{{--SHOW AGNECY STATUS--}}
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
{{--HSW--}}
<transition name="slide-fade">
    <div class="fixed inset-0 overflow-y-auto" v-if="hsw_mdl">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all my-8 align-middle"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-gray-100 p-3">
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <div class="flex-grow font-bold flex-column">
                                {{-- Title--}}
                                <div class="fw-bolder text-xl">
                                    {{ __('STANDARD EMPLOYMENT CONTRACT FOR FILIPINO HOUSEHOLD SERVICE WORKERS') }}
                                </div>
                                <div class="text-gray-500">
                                    {{ __('(HSWs) BOUND FOR THE KINGDOM OF SAUDI ARABIA') }}
                                </div>
                            </div>
                            <div class="flex-shrink">
                                <button type="button" v-on:click="hsw_mdl = false"
                                        class="text-gray-700 hover:text-white hover:bg-red-500 pl-1 pr-1 rounded">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-2">
                    {{-- Message--}}
                    <form class="bg-white px-4 pt-4 pb-4 mb-4">
                        <label class="text-lg font-bold">{{ __('Employer Details') }}</label>
                        <div class="flex flex-row">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Full Name') }}
                                </label>
                                <input v-model="hsw.employer_name"
                                       v-bind:class="{ 'border-red-500': !hsw.employer_name, 'border-gray-300 ': hsw.employer_name}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Visa Number issued by the Saudi Ministry of Labor') }}
                                </label>
                                <input v-model="hsw.visa_no"
                                       v-bind:class="{ 'border-red-500': !hsw.visa_no, 'border-gray-300 ': hsw.visa_no}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Address') }}
                                </label>
                                <input v-model="hsw.address"
                                       v-bind:class="{ 'border-red-500': !hsw.address, 'border-gray-300 ': hsw.address}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Street') }}
                                </label>
                                <input v-model="hsw.street"
                                       v-bind:class="{ 'border-red-500': !hsw.street, 'border-gray-300 ': hsw.street}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('District') }}
                                </label>
                                <input v-model="hsw.district"
                                       v-bind:class="{ 'border-red-500': !hsw.district, 'border-gray-300 ': hsw.district}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('City') }}
                                </label>
                                <input v-model="hsw.city"
                                       v-bind:class="{ 'border-red-500': !hsw.city, 'border-gray-300 ': hsw.city}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Civil Status') }}
                                </label>
                                <input v-model="hsw.cs_employer"
                                       v-bind:class="{ 'border-red-500': !hsw.cs_employer, 'border-gray-300 ': hsw.cs_employer}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Number of Family Members') }}
                                </label>
                                <input v-model="hsw.no_family_members"
                                       v-bind:class="{ 'border-red-500': !hsw.no_family_members, 'border-gray-300 ': hsw.no_family_members}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="number">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Telephone No.') }}
                                </label>
                                <input v-model="hsw.telephone"
                                       v-bind:class="{ 'border-red-500': !hsw.telephone, 'border-gray-300 ': hsw.telephone}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Mobile No.') }}
                                </label>
                                <input v-model="hsw.mobile"
                                       v-bind:class="{ 'border-red-500': !hsw.mobile, 'border-gray-300 ': hsw.mobile}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('E-mail') }}
                                </label>
                                <input v-model="hsw.email"
                                       v-bind:class="{ 'border-red-500': !hsw.email, 'border-gray-300 ': hsw.email}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="email">
                            </div>
                        </div>
                        <label class="text-lg font-bold">{{ __('Worker Details') }}</label>
                        <div class="flex flex-row">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Full Name') }}
                                </label>
                                <input v-model="hsw.worker_name"
                                       v-bind:class="{ 'border-red-500': !hsw.worker_name, 'border-gray-300 ': hsw.worker_name}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Position') }}
                                </label>
                                <input v-model="hsw.position"
                                       v-bind:class="{ 'border-red-500': !hsw.position, 'border-gray-300 ': hsw.position}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Address in the Philippines') }}
                                </label>
                                <input v-model="hsw.address_ph"
                                       v-bind:class="{ 'border-red-500': !hsw.address_ph, 'border-gray-300 ': hsw.address_ph}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Civil Status') }}
                                </label>
                                <input v-model="hsw.cs_worker"
                                       v-bind:class="{ 'border-red-500': !hsw.cs_worker, 'border-gray-300 ': hsw.cs_worker}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Contact No.') }}
                                </label>
                                <input v-model="hsw.contact_no"
                                       v-bind:class="{ 'border-red-500': !hsw.contact_no, 'border-gray-300 ': hsw.contact_no}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Passport No.') }}
                                </label>
                                <input v-model="hsw.passport_no"
                                       v-bind:class="{ 'border-red-500': !hsw.passport_no, 'border-gray-300 ': hsw.passport_no}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Date of Issue') }}
                                </label>
                                <input v-model="hsw.date_issued"
                                       v-bind:class="{ 'border-red-500': !hsw.date_issued, 'border-gray-300 ': hsw.date_issued}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="date">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Place of Issue') }}
                                </label>
                                <input v-model="hsw.place_issued"
                                       v-bind:class="{ 'border-red-500': !hsw.place_issued, 'border-gray-300 ': hsw.place_issued}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Name of Next of Kin') }}
                                </label>
                                <input v-model="hsw.kin_name"
                                       v-bind:class="{ 'border-red-500': !hsw.kin_name, 'border-gray-300 ': hsw.kin_name}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Address and Contact Numbers of Next of Kin') }}
                                </label>
                                <input v-model="hsw.kin_address"
                                       v-bind:class="{ 'border-red-500': !hsw.kin_address, 'border-gray-300 ': hsw.kin_address}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <label class="text-lg font-bold">{{ __('Other Details') }}</label>
                        <div class="flex flex-row">
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Site of Employment') }}
                                </label>
                                <input v-model="hsw.employment_site"
                                       v-bind:class="{ 'border-red-500': !hsw.employment_site, 'border-gray-300 ': hsw.employment_site}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class=" my-2 flex-grow mx-2">
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Salary') }}
                                </label>
                                <input v-model="hsw.salary"
                                       v-bind:class="{ 'border-red-500': !hsw.salary, 'border-gray-300 ': hsw.salary}"
                                       class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" @click="saveHSW" v-if="edit_mode === 0"
                            class="w-full inline-flex justify-center rounded-md border-gray-300 border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Submit & Confirm
                    </button>
                    <button type="button" v-on:click="hsw_mdl = false"
                            class="mt-3 w-full inline-flex justify-center rounded-md border-gray-300 border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</transition>
{{--SW--}}
<transition name="slide-fade">
    <div class="fixed inset-0 overflow-y-auto" v-if="sw_mdl">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all my-8 align-middle"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-gray-100 p-3">
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <div class="flex-grow font-bold flex-column">
                                {{-- Title--}}
                                <div class="fw-bolder text-xl">
                                    {{ __('STANDARD EMPLOYMENT CONTRACT FOR VARIOUS SKILLS') }}
                                </div>
                                <div class="text-gray-500">
                                    {{ __('Department of Labor and Employment Philippine Overseas Employment Administration') }}
                                </div>
                            </div>
                            <div class="flex-shrink">
                                <button type="button" v-on:click="sw_mdl = false"
                                        class="text-gray-700 hover:text-white hover:bg-red-500 pl-1 pr-1 rounded">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Message--}}
                <form class="bg-white px-4 pt-4 pb-4 mb-4">
                    <label class="text-lg font-bold">{{ __('Employer Details') }}</label>
                    <div class="flex flex-col">
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Full Name') }}
                            </label>
                            <input v-model="sw.employer_name"
                                   v-bind:class="{ 'border-red-500': !sw.employer_name, 'border-gray-300 ': sw.employer_name}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class="my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Address') }}
                            </label>
                            <input v-model="sw.employer_address"
                                   v-bind:class="{ 'border-red-500': !sw.employer_address, 'border-gray-300 ': sw.employer_address}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('PO Box No.') }}
                            </label>
                            <input v-model="sw.po_box_no"
                                   v-bind:class="{ 'border-red-500': !sw.po_box_no, 'border-gray-300 ': sw.po_box_no}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class="my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Telephone') }}
                            </label>
                            <input v-model="sw.telephone"
                                   v-bind:class="{ 'border-red-500': !sw.telephone, 'border-gray-300 ': sw.telephone}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class="my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Fax') }}
                            </label>
                            <input v-model="sw.fax"
                                   v-bind:class="{ 'border-red-500': !sw.fax, 'border-gray-300 ': sw.fax}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <label class="text-lg font-bold">{{ __('Employee Details') }}</label>
                    <div class="flex flex-row">
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Full Name') }}
                            </label>
                            <input v-model="sw.employee_name"
                                   v-bind:class="{ 'border-red-500': !sw.employee_name, 'border-gray-300 ': sw.employee_name}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Civil Status') }}
                            </label>
                            <input v-model="sw.cs_status"
                                   v-bind:class="{ 'border-red-500': !sw.cs_status, 'border-gray-300 ': sw.cs_status}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Employee Address') }}
                            </label>
                            <input v-model="sw.employee_address"
                                   v-bind:class="{ 'border-red-500': !sw.employee_address, 'border-gray-300 ': sw.employee_address}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Passport No.') }}
                            </label>
                            <input v-model="sw.passport_no"
                                   v-bind:class="{ 'border-red-500': !sw.passport_no, 'border-gray-300 ': sw.passport_no}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Date Issued') }}
                            </label>
                            <input v-model="sw.date_issued"
                                   v-bind:class="{ 'border-red-500': !sw.date_issued, 'border-gray-300 ': sw.date_issued}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="date">
                        </div>
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Place Issued') }}
                            </label>
                            <input v-model="sw.place_issued"
                                   v-bind:class="{ 'border-red-500': !sw.place_issued, 'border-gray-300 ': sw.place_issued}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <label class="text-lg font-bold">{{ __('Other Details') }}</label>
                    <div class="flex flex-row">
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Site Of Employment') }}
                            </label>
                            <input v-model="sw.site_of_employment"
                                   v-bind:class="{ 'border-red-500': !sw.site_of_employment, 'border-gray-300 ': sw.site_of_employment}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Position') }}
                            </label>
                            <input v-model="sw.employee_position"
                                   v-bind:class="{ 'border-red-500': !sw.employee_position, 'border-gray-300 ': sw.employee_position}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Salary') }}
                            </label>
                            <input v-model="sw.salary"
                                   v-bind:class="{ 'border-red-500': !sw.salary, 'border-gray-300 ': sw.salary}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="number">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Witness Day') }}
                            </label>
                            <input v-model="sw.witness_day"
                                   v-bind:class="{ 'border-red-500': !sw.witness_day, 'border-gray-300 ': sw.witness_day}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Witness Month') }}
                            </label>
                            <input v-model="sw.witness_month"
                                   v-bind:class="{ 'border-red-500': !sw.witness_month, 'border-gray-300 ': sw.witness_month}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="number">
                        </div>
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Witness Year') }}
                            </label>
                            <input v-model="sw.witness_year"
                                   v-bind:class="{ 'border-red-500': !sw.witness_year, 'border-gray-300 ': sw.witness_year}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="number">
                        </div>
                        <div class=" my-2 flex-grow mx-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Witness Place') }}
                            </label>
                            <input v-model="sw.witness_place"
                                   v-bind:class="{ 'border-red-500': !sw.witness_place, 'border-gray-300 ': sw.witness_place}"
                                   class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                </form>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" @click="saveSW" v-if="edit_mode === 0"
                            class="w-full inline-flex justify-center rounded-md border-gray-300 border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Submit & Confirm
                    </button>
                    <button type="button" v-on:click="sw_mdl = false"
                            class="mt-3 w-full inline-flex justify-center rounded-md border-gray-300 border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
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
                    panel: 2,
                    dt: null,
                    dt_contract: null,
                    agency_mdl: false,
                    hsw_mdl: false,
                    sw_mdl: false,
                    edit_mode: 0,
                    hsw: {
                        'id': '',
                        'employer_name': '',
                        'visa_no': '',
                        'address': '',
                        'street': '',
                        'district': '',
                        'city': '',
                        'cs_employer': '',
                        'no_family_members': '',
                        'telephone': '',
                        'mobile': '',
                        'email': '',
                        'worker_name': '',
                        'position': '',
                        'address_ph': '',
                        'cs_worker': '',
                        'contact_no': '',
                        'passport_no': '',
                        'date_issued': '',
                        'place_issued': '',
                        'kin_name': '',
                        'kin_address': '',
                        'employment_site': '',
                        'salary': '',
                        'agency_id': '',
                    },
                    sw: {
                        'employer_name': '',
                        'employer_address': '',
                        'po_box_no': '',
                        'telephone': '',
                        'fax': '',
                        'employee_name': '',
                        'cs_status': '',
                        'passport_no': '',
                        'date_issued': '',
                        'place_issued': '',
                        'employee_address': '',
                        'site_of_employment': '',
                        'employee_position': '',
                        'salary': '',
                        'witness_day': '',
                        'witness_month': '',
                        'witness_year': '',
                        'witness_place': '',
                        'agency_id': '',
                        'approved_by': '',
                        'approved_date': '',
                        'status': '',
                    }
                }
            },
            watch: {
                panel: function (value) {
                    this.dt.draw();
                    this.dt_contract.draw();
                }
            },
            methods: {
                resetHSW() {
                    this.hsw = {
                        'id': '',
                        'employer_name': '',
                        'visa_no': '',
                        'address': '',
                        'street': '',
                        'district': '',
                        'city': '',
                        'cs_employer': '',
                        'no_family_members': '',
                        'telephone': '',
                        'mobile': '',
                        'email': '',
                        'worker_name': '',
                        'position': '',
                        'address_ph': '',
                        'cs_worker': '',
                        'contact_no': '',
                        'passport_no': '',
                        'date_issued': '',
                        'place_issued': '',
                        'kin_name': '',
                        'kin_address': '',
                        'employment_site': '',
                        'salary': '',
                        'agency_id': '',
                    };
                },
                resetSW() {

                    this.sw = {
                        'employer_name': '',
                        'employer_address': '',
                        'po_box_no': '',
                        'telephone': '',
                        'fax': '',
                        'employee_name': '',
                        'cs_status': '',
                        'passport_no': '',
                        'date_issued': '',
                        'place_issued': '',
                        'employee_address': '',
                        'site_of_employment': '',
                        'employee_position': '',
                        'salary': '',
                        'witness_day': '',
                        'witness_month': '',
                        'witness_year': '',
                        'witness_place': '',
                        'agency_id': '',
                        'approved_by': '',
                        'approved_date': '',
                        'status': '',
                    };
                },
                openHSWMdl() {
                    this.edit_mode = 0;
                    this.hsw_mdl = true;
                    this.resetHSW();
                    this.dt_contract.draw()
                },
                openSWMdl() {
                    this.edit_mode = 0;
                    this.sw_mdl = true;
                    this.resetSW();
                    this.dt_contract.draw()
                },
                saveHSW() {
                    var $this = this;
                    axios.post('{{ route('store.hsw') }}', this.hsw).then(function () {
                        $this.hsw_mdl = false;
                        $this.resetHSW();
                        swal('Success!', 'Request for contract has been sent.', 'success');
                    }).catch(function (value) {
                        swal('Error!', 'Please fill up all fields', 'error')
                    });
                },
                saveSW() {
                    var $this = this;
                    $this.sw_mdl = false;
                    axios.post('{{ route('store.sw') }}', this.sw).then(function () {
                        $this.resetSW();
                        swal('Success!', 'Request for contract has been sent.', 'success');
                    }).catch(function (value) {
                        swal('Error!', 'Please fill up all fields', 'error')
                    });
                }
            },
            mounted() {
                var $this = this;
                $this.dt = $('#complains-table').DataTable({
                    responsive: true,
                    serverSide: true,
                    scrollX: true,
                    order: [
                        [0, "desc"]
                    ],
                    ajax: {
                        url: '{{ route('complains.table') }}',
                        type: 'POST',
                        data: {agency_id: '{{ auth()->user()->agency_id }}'}
                    },
                    columns: [{
                        data: 'id',
                        name: 'id',
                        title: 'ID'
                    },
                        {
                            data: function (value) {
                                return value.last_name + ', ' + value.first_name + ' ' +
                                    value.middle_name;
                            },
                            name: 'last_name',
                            title: 'Name'
                        },
                        {
                            data: 'email_address',
                            name: 'email_address',
                            title: 'E-mail'
                        },
                        {
                            data: 'created_at_display',
                            name: 'created_at',
                            title: 'Date Created'
                        },
                        {
                            data: function (value) {
                                if (value.remarks)
                                    return '<a href="' + value.route_show + '" class="bg-green-500 hover:bg-green-600 p-1 rounded shadow text-white">Reviewed</a>';
                                return '<a href="' + value.route_show + '" class="bg-red-500 hover:bg-red-600 p-1 rounded shadow text-white">Pending</a>';
                            },
                            name: 'id',
                            title: 'Status'
                        },
                    ],
                    drawCallback() {

                    }
                });

                $this.dt_contract = $('#contract-table').DataTable({
                    responsive: true,
                    serverSide: true,
                    scrollX: true,
                    order: [
                        [0, "desc"]
                    ],
                    ajax: {
                        url: '{{ route('table.contract') }}',
                        type: 'POST',
                        data: {agency_id: '{{ auth()->user()->agency_id }}'}
                    },
                    columns: [
                        {
                            data: function (value) {
                                return value.serial_no;
                            },
                            name: 'serial_no',
                            title: 'Serial No'
                        },
                        {
                            data: function (value) {
                                return value.name;
                            },
                            name: 'name',
                            title: 'Contract'
                        },
                        {
                            data: function (value) {
                                if (value.status === 'Declined') {
                                    return '<a class="approval-show text-red-500 hover:text-red-400 hover:underline font-bold">' +
                                        value.status + ' by ' + value.approved_by +
                                        '</a>';
                                }
                                if (value.status === 'Approved') {
                                    return '<a class="approval-show text-green-400 hover:text-green-500 hover:underline font-bold">' +
                                        value.status + ' by ' + value.approved_by +
                                        '</a>';
                                }
                                return '<a class="approval-show text-indigo-500 hover:text-indigo-400 hover:underline font-bold">' +
                                    value.status + '</a>';
                            },
                            name: 'employer_name',
                            title: 'Contract Status'
                        },
                        {
                            data: 'created_at_display',
                            name: 'created_at_display',
                            title: 'Date Requested'
                        },
                    ],
                    drawCallback() {
                        $(".approval-show").click(function (e) {
                            let data = $(this).parent();
                            let hold = $this.dt_contract.row(data).data();

                            if(hold.name === "Household Service Workers") {
                                $this.hsw = JSON.parse(hold.details.toString());
                                delete hold.details;
                                Object.assign($this.hsw, hold);
                                $this.hsw_mdl = true;
                            }

                            if(hold.name === "Skilled Workers") {
                                $this.sw = JSON.parse(hold.details.toString());
                                delete hold.details;
                                Object.assign($this.sw, hold);
                                $this.sw_mdl = true;
                            }

                            $this.dt_contract.draw();
                            $this.edit_mode = 1;
                        });
                    }
                });
            }
        });
    </script>
</x-slot>
