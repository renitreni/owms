<div class="grid h-32 grid-cols-4 gap-4 p-5">
    <div class="flex flex-col bg-blue-500 rounded-sm shadow-lg">
        <div class="mx-auto mt-auto text-2xl font-bold text-white">
            {{ \App\Models\Candidate::query()->where('agency_id',auth()->user()->agency_id)->where('status', 'applicant')->count() }}
        </div>
        <div class="mx-auto mb-auto text-white">
            {{ __('My Applicants') }}
        </div>
    </div>
    <div class="flex flex-col bg-blue-500 rounded-sm shadow-lg">
        <div class="mx-auto mt-auto text-2xl font-bold text-white">
            {{ \App\Models\User::query()->where('role','3')->where('agency_id',auth()->user()->agency_id)->count() }}
        </div>
        <div class="mx-auto mb-auto text-white">{{ __('My Employers') }}</div>
    </div>
    <div class="flex flex-col bg-blue-500 rounded-sm shadow-lg">
        <div class="mx-auto mt-auto text-2xl font-bold text-white">
            {{ \App\Models\User::query()->where('role','5')->where('agency_id',auth()->user()->agency_id)->count() }}
        </div>
        <div class="mx-auto mb-auto text-white">{{ __('My Affiliates') }}</div>
    </div>
    <div class="flex flex-col bg-blue-500 rounded-sm shadow-lg">
        <div class="mx-auto mt-auto text-2xl font-bold text-white">
            {{ \App\Models\Candidate::query()->where('agency_id',auth()->user()->agency_id)->where('deployed', 'yes')->where('status', 'employed')->count() }}
        </div>
        <div class="mx-auto mb-auto text-white">
            {{ __('Deployed and Employed') }}
        </div>
    </div>
</div>
<div class="flex flex-col mt-2 mb-5 ml-4 md:flex-row">
    <a href="#" @click="openHSWMdl"
       class="p-2 mt-2 text-white bg-indigo-400 rounded shadow hover:bg-indigo-500 sm:mr-2">
        <i class="fas fa-house-user"></i> {{ __('Request Contract HSW') }}
    </a>
    <a href="#" @click="openSWMdl"
       class="p-2 mt-2 text-white bg-blue-400 rounded shadow hover:bg-blue-500 sm:mr-2">
        <i class="fas fa-user-graduate"></i> {{ __('Request Contract SW') }}
    </a>
</div>
<div style='border-bottom: 2px solid #eaeaea'>
    <ul class='flex cursor-pointer'>
        <li class='px-6 py-2 bg-white rounded-t-lg' v-bind:class="{'text-gray-500 bg-gray-200': (panel != 2) }"
            @click="panel = 2">Contracts
        </li>
        <li class='px-6 py-2 bg-white rounded-t-lg' v-bind:class="{'text-gray-500 bg-gray-200': (panel != 1) }"
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
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="p-3 bg-gray-100">
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <div class="flex-grow font-bold">
                                {{-- Title--}}
                                Alert Message!
                            </div>
                            <div class="flex-shrink">
                                <button type="button" v-on:click="agency_mdl = false"
                                        class="pl-1 pr-1 text-gray-700 rounded hover:text-white hover:bg-red-500">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-2 bg-white">
                    {{-- Message--}}
                    <div class="text-3xl text-center animate-pulse">
                        <i class="text-red-500 fas fa-exclamation-triangle"></i>
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
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block my-8 overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="p-3 bg-gray-100">
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <div class="flex-grow font-bold flex-column">
                                {{-- Title--}}
                                <div class="text-xl fw-bolder">
                                    {{ __('STANDARD EMPLOYMENT CONTRACT FOR FILIPINO HOUSEHOLD SERVICE WORKERS') }}
                                </div>
                                <div class="text-gray-500">
                                    {{ __('(HSWs) BOUND FOR THE KINGDOM OF SAUDI ARABIA') }}
                                </div>
                            </div>
                            <div class="flex-shrink">
                                <button type="button" v-on:click="hsw_mdl = false"
                                        class="pl-1 pr-1 text-gray-700 rounded hover:text-white hover:bg-red-500">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-2 bg-white">
                    {{-- Message--}}
                    <form class="px-4 pt-4 pb-4 mb-4 bg-white">
                        <label class="text-lg font-bold">{{ __('Employer Details') }}</label>
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Full Name') }}
                                </label>
                                <input v-model="hsw.employer_name"
                                       v-bind:class="{ 'border-red-500': !hsw.employer_name, 'border-gray-300 ': hsw.employer_name}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('National ID') }}
                                </label>
                                <input v-model="hsw.employer_national_id"
                                       v-bind:class="{ 'border-red-500': !hsw.employer_national_id, 'border-gray-300 ': hsw.employer_national_id}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Visa Number issued by the Saudi Ministry of Labor') }}
                                </label>
                                <input v-model="hsw.visa_no"
                                       v-bind:class="{ 'border-red-500': !hsw.visa_no, 'border-gray-300 ': hsw.visa_no}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Address') }}
                                </label>
                                <input v-model="hsw.address"
                                       v-bind:class="{ 'border-red-500': !hsw.address, 'border-gray-300 ': hsw.address}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Street') }}
                                </label>
                                <input v-model="hsw.street"
                                       v-bind:class="{ 'border-red-500': !hsw.street, 'border-gray-300 ': hsw.street}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('District') }}
                                </label>
                                <input v-model="hsw.district"
                                       v-bind:class="{ 'border-red-500': !hsw.district, 'border-gray-300 ': hsw.district}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('City') }}
                                </label>
                                <input v-model="hsw.city"
                                       v-bind:class="{ 'border-red-500': !hsw.city, 'border-gray-300 ': hsw.city}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Civil Status') }}
                                </label>
                                <input v-model="hsw.cs_employer"
                                       v-bind:class="{ 'border-red-500': !hsw.cs_employer, 'border-gray-300 ': hsw.cs_employer}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Number of Family Members') }}
                                </label>
                                <input v-model="hsw.no_family_members"
                                       v-bind:class="{ 'border-red-500': !hsw.no_family_members, 'border-gray-300 ': hsw.no_family_members}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="number">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Telephone No.') }}
                                </label>
                                <input v-model="hsw.telephone"
                                       v-bind:class="{ 'border-red-500': !hsw.telephone, 'border-gray-300 ': hsw.telephone}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Mobile No.') }}
                                </label>
                                <input v-model="hsw.mobile"
                                       v-bind:class="{ 'border-red-500': !hsw.mobile, 'border-gray-300 ': hsw.mobile}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('E-mail') }}
                                </label>
                                <input v-model="hsw.email"
                                       v-bind:class="{ 'border-red-500': !hsw.email, 'border-gray-300 ': hsw.email}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="email">
                            </div>
                        </div>
                        <label class="text-lg font-bold">{{ __('Worker Details') }}</label>
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Full Name') }}
                                </label>
                                <input v-model="hsw.worker_name"
                                       v-bind:class="{ 'border-red-500': !hsw.worker_name, 'border-gray-300 ': hsw.worker_name}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Position') }}
                                </label>
                                <input v-model="hsw.position"
                                       v-bind:class="{ 'border-red-500': !hsw.position, 'border-gray-300 ': hsw.position}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Address in the Philippines') }}
                                </label>
                                <input v-model="hsw.address_ph"
                                       v-bind:class="{ 'border-red-500': !hsw.address_ph, 'border-gray-300 ': hsw.address_ph}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Civil Status') }}
                                </label>
                                <input v-model="hsw.cs_worker"
                                       v-bind:class="{ 'border-red-500': !hsw.cs_worker, 'border-gray-300 ': hsw.cs_worker}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Contact No.') }}
                                </label>
                                <input v-model="hsw.contact_no"
                                       v-bind:class="{ 'border-red-500': !hsw.contact_no, 'border-gray-300 ': hsw.contact_no}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Passport No.') }}
                                </label>
                                <input v-model="hsw.passport_no"
                                       v-bind:class="{ 'border-red-500': !hsw.passport_no, 'border-gray-300 ': hsw.passport_no}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Date of Issue') }}
                                </label>
                                <input v-model="hsw.date_issued"
                                       v-bind:class="{ 'border-red-500': !hsw.date_issued, 'border-gray-300 ': hsw.date_issued}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="date">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Place of Issue') }}
                                </label>
                                <input v-model="hsw.place_issued"
                                       v-bind:class="{ 'border-red-500': !hsw.place_issued, 'border-gray-300 ': hsw.place_issued}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Name of Next of Kin') }}
                                </label>
                                <input v-model="hsw.kin_name"
                                       v-bind:class="{ 'border-red-500': !hsw.kin_name, 'border-gray-300 ': hsw.kin_name}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Address and Contact Numbers of Next of Kin') }}
                                </label>
                                <input v-model="hsw.kin_address"
                                       v-bind:class="{ 'border-red-500': !hsw.kin_address, 'border-gray-300 ': hsw.kin_address}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <label class="text-lg font-bold">{{ __('Other Details') }}</label>
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Site of Employment') }}
                                </label>
                                <input v-model="hsw.employment_site"
                                       v-bind:class="{ 'border-red-500': !hsw.employment_site, 'border-gray-300 ': hsw.employment_site}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Salary') }}
                                </label>
                                <input v-model="hsw.salary"
                                       v-bind:class="{ 'border-red-500': !hsw.salary, 'border-gray-300 ': hsw.salary}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" @click="saveHSW" v-if="edit_mode === 0"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border-transparent border-gray-300 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Submit & Confirm
                    </button>
                    <button type="button" v-on:click="hsw_mdl = false"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block my-8 overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="p-3 bg-gray-100">
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <div class="flex-grow font-bold flex-column">
                                {{-- Title--}}
                                <div class="text-xl fw-bolder">
                                    {{ __('STANDARD EMPLOYMENT CONTRACT FOR VARIOUS SKILLS') }}
                                </div>
                                <div class="text-gray-500">
                                    {{ __('Department of Labor and Employment Philippine Overseas Employment Administration') }}
                                </div>
                            </div>
                            <div class="flex-shrink">
                                <button type="button" v-on:click="sw_mdl = false"
                                        class="pl-1 pr-1 text-gray-700 rounded hover:text-white hover:bg-red-500">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Message--}}
                <form class="px-4 pt-4 pb-4 mb-4 bg-white">
                    <label class="text-lg font-bold">{{ __('Employer Details') }}</label>
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <div class="flex-grow mx-2 my-2 ">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('Full Name') }}
                                </label>
                                <input v-model="sw.employer_name"
                                       v-bind:class="{ 'border-red-500': !sw.employer_name, 'border-gray-300 ': sw.employer_name}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                            <div class="flex-grow mx-2 my-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700">
                                    {{ __('National ID') }}
                                </label>
                                <input v-model="sw.employer_national_id"
                                       v-bind:class="{ 'border-red-500': !sw.employer_national_id, 'border-gray-300 ': sw.employer_national_id}"
                                       class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                       type="text">
                            </div>
                        </div>
                        <div class="flex-grow mx-2 my-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Address') }}
                            </label>
                            <input v-model="sw.employer_address"
                                   v-bind:class="{ 'border-red-500': !sw.employer_address, 'border-gray-300 ': sw.employer_address}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="flex-grow mx-2 my-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('PO Box No.') }}
                            </label>
                            <input v-model="sw.po_box_no"
                                   v-bind:class="{ 'border-red-500': !sw.po_box_no, 'border-gray-300 ': sw.po_box_no}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class="flex-grow mx-2 my-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Telephone') }}
                            </label>
                            <input v-model="sw.telephone"
                                   v-bind:class="{ 'border-red-500': !sw.telephone, 'border-gray-300 ': sw.telephone}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class="flex-grow mx-2 my-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Fax') }}
                            </label>
                            <input v-model="sw.fax"
                                   v-bind:class="{ 'border-red-500': !sw.fax, 'border-gray-300 ': sw.fax}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <label class="text-lg font-bold">{{ __('Employee Details') }}</label>
                    <div class="flex flex-row">
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Full Name') }}
                            </label>
                            <input v-model="sw.employee_name"
                                   v-bind:class="{ 'border-red-500': !sw.employee_name, 'border-gray-300 ': sw.employee_name}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Civil Status') }}
                            </label>
                            <input v-model="sw.cs_status"
                                   v-bind:class="{ 'border-red-500': !sw.cs_status, 'border-gray-300 ': sw.cs_status}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Employee Address') }}
                            </label>
                            <input v-model="sw.employee_address"
                                   v-bind:class="{ 'border-red-500': !sw.employee_address, 'border-gray-300 ': sw.employee_address}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Passport No.') }}
                            </label>
                            <input v-model="sw.passport_no"
                                   v-bind:class="{ 'border-red-500': !sw.passport_no, 'border-gray-300 ': sw.passport_no}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Date Issued') }}
                            </label>
                            <input v-model="sw.date_issued"
                                   v-bind:class="{ 'border-red-500': !sw.date_issued, 'border-gray-300 ': sw.date_issued}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="date">
                        </div>
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Place Issued') }}
                            </label>
                            <input v-model="sw.place_issued"
                                   v-bind:class="{ 'border-red-500': !sw.place_issued, 'border-gray-300 ': sw.place_issued}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <label class="text-lg font-bold">{{ __('Other Details') }}</label>
                    <div class="flex flex-row">
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Site Of Employment') }}
                            </label>
                            <input v-model="sw.site_of_employment"
                                   v-bind:class="{ 'border-red-500': !sw.site_of_employment, 'border-gray-300 ': sw.site_of_employment}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Position') }}
                            </label>
                            <input v-model="sw.employee_position"
                                   v-bind:class="{ 'border-red-500': !sw.employee_position, 'border-gray-300 ': sw.employee_position}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Salary') }}
                            </label>
                            <input v-model="sw.salary"
                                   v-bind:class="{ 'border-red-500': !sw.salary, 'border-gray-300 ': sw.salary}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="number">
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Witness Day') }}
                            </label>
                            <input v-model="sw.witness_day"
                                   v-bind:class="{ 'border-red-500': !sw.witness_day, 'border-gray-300 ': sw.witness_day}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Witness Month') }}
                            </label>
                            <input v-model="sw.witness_month"
                                   v-bind:class="{ 'border-red-500': !sw.witness_month, 'border-gray-300 ': sw.witness_month}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="number">
                        </div>
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Witness Year') }}
                            </label>
                            <input v-model="sw.witness_year"
                                   v-bind:class="{ 'border-red-500': !sw.witness_year, 'border-gray-300 ': sw.witness_year}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="number">
                        </div>
                        <div class="flex-grow mx-2 my-2 ">
                            <label class="block mb-2 text-sm font-bold text-gray-700">
                                {{ __('Witness Place') }}
                            </label>
                            <input v-model="sw.witness_place"
                                   v-bind:class="{ 'border-red-500': !sw.witness_place, 'border-gray-300 ': sw.witness_place}"
                                   class="w-full px-3 py-2 leading-tight text-gray-700 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                   type="text">
                        </div>
                    </div>
                </form>
                <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" @click="saveSW" v-if="edit_mode === 0"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border-transparent border-gray-300 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Submit & Confirm
                    </button>
                    <button type="button" v-on:click="sw_mdl = false"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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
                        'employer_address': '',
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
                    this.dt_contract.draw();
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
                    this.dt_contract.draw();
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
                                    return '<a href="' + value.route_show + '" class="p-1 text-white bg-green-500 rounded shadow hover:bg-green-600">Reviewed</a>';
                                return '<a href="' + value.route_show + '" class="p-1 text-white bg-red-500 rounded shadow hover:bg-red-600">Pending</a>';
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

                                    return '<a href="' + value.contract_link + '" ' +
                                        'class="pl-1 pr-1 mr-2 text-white bg-indigo-400 rounded hover:bg-indigo-500">' +
                                        '<i class="fas fa-download"></i>' +
                                        '</a>' +
                                        '<a class="font-bold text-red-500 approval-show hover:text-red-400 hover:underline">' +
                                        value.status + ' by ' + value.approved_by +
                                        '</a>';
                                }
                                if (value.status === 'Approved') {

                                    return '<a href="' + value.contract_link + '" ' +
                                        'class="pl-1 pr-1 mr-2 text-white bg-indigo-400 rounded hover:bg-indigo-500">' +
                                        '<i class="fas fa-download"></i>' +
                                        '</a>' +
                                        '<a href="#" class="font-bold text-green-400 approval-show hover:text-green-500 hover:underline">' +
                                        value.status + ' by ' + value.approved_by +
                                        '</a>';
                                }
                                return '<a class="font-bold text-indigo-500 approval-show hover:text-indigo-400 hover:underline">' +
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

                            if (hold.name === "Household Service Workers") {
                                $this.hsw = JSON.parse(hold.details.toString());
                                delete hold.details;
                                Object.assign($this.hsw, hold);
                                $this.hsw_mdl = true;
                            }

                            if (hold.name === "Skilled Workers") {
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
