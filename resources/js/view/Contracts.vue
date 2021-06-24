<template>
    <div class="pb-12 pt-8">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-2 mt-5">
                </div>
                <div class="p-5">
                    <table
                        id="contracts-table"
                        class="stripe hover"
                        style="width: 100%"
                    ></table>
                </div>
            </div>
        </div>

        <!--        {{&#45;&#45;HSW &#45;&#45;}}-->
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
                                        <div class="fw-bolder text-xl">
                                            {{ __('STANDARD EMPLOYMENT CONTRACT FOR FILIPINO HOUSEHOLD SERVICE WORKERS')
                                            }}
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
        <!--        {{&#45;&#45;SW &#45;&#45;}}-->
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
                                        <div class="fw-bolder text-xl">
                                            {{ __('STANDARD EMPLOYMENT CONTRACT FOR VARIOUS SKILLS') }}
                                        </div>
                                        <div class="text-gray-500">
                                            Department of Labor and Employment Philippine Overseas Employment
                                            Administration
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
        <!--        Approval Modal-->
        <transition name="slide-fade">
            <div class="fixed inset-0 overflow-y-auto" v-if="approval_mdl">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="w-2/4 inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all my-8 align-middle"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="bg-gray-100 p-3">
                            <div class="flex flex-col">
                                <div class="flex flex-row">
                                    <div class="flex-grow font-bold flex-column">
                                        <div class="fw-bolder text-xl">
                                            Contract <label class="text-indigo-500">{{ serial_no }}</label> Approval
                                        </div>
                                        <div class="text-gray-500">
                                        </div>
                                    </div>
                                    <div class="flex-shrink">
                                        <button type="button" v-on:click="approval_mdl = false"
                                                class="text-gray-700 hover:text-white hover:bg-red-500 pl-1 pr-1 rounded">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="bg-white px-4 pt-4 pb-4 mb-4">
                            <div class="flex flex-col">
                                <div>
                                    <button type="button" @click="updateContract('Approved')"
                                        class="mt-3 w-full inline-flex justify-center rounded-md shadow-sm px-4 py-2 font-bold text-white bg-green-400 hover:bg-green-600">
                                        I will Approve this contract
                                    </button>
                                </div>
                                <div>
                                    <button type="button" @click="updateContract('Declined')"
                                        class="mt-3 w-full inline-flex justify-center rounded-md shadow-sm px-4 py-2 font-bold text-white bg-red-400 hover:bg-red-600">
                                        I will Decline this contract
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" v-on:click="approval_mdl = false"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border-gray-300 border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
<script>
    export default {
        props: ["data"],
        data() {
            return {
                sw: {},
                hsw: {},
                sw_mdl: false,
                hsw_mdl: false,
                approval_mdl: false,
                dt: null,
                props_data: JSON.parse(this._props.data),
                details: {},
                serial_no: '',
            }
        },
        methods: {
            showContractsMdl() {
                this.contracts_mdl = true;
            },
            updateContract(status) {
                var $this = this;
                axios.post(this.props_data.contract_us_link, {
                    'serial_no': this.serial_no,
                    'status': status,
                }).then(function (value) {
                    $this.approval_mdl = false;
                    Swal.fire({
                        icon: 'success',
                        title: 'Contract Status has been updated!',
                        html: 'Update success!',
                    });
                    $this.dt.draw();
                });
            }
        },
        mounted() {
            var $this = this;
            $this.dt = $("#contracts-table").DataTable({
                responsive: true,
                serverSide: true,
                scrollX: true,
                order: [[0, "desc"]],
                ajax: {
                    url: $this.props_data.datatable_link,
                    type: "POST",
                },
                columns: [
                    {
                        data: function (value) {
                            return '<a class="contract-show text-indigo-500 hover:text-indigo-400 hover:underline font-bold">' +
                                value.serial_no + '</a>'
                        }, name: "serial_no", title: "Serial No"
                    },
                    {
                        data: function (value) {
                            if(value.status === 'Pending')
                                return '<a class="approval-show text-indigo-500 hover:text-indigo-400 hover:underline font-bold">' +
                                    value.status + '</a>';

                            return value.status;
                        }, name: "status", title: "Status"
                    },
                    {data: 'name', name: "name", title: "Contract"},
                ],
                drawCallback() {
                    $(".contract-show").click(function (e) {
                        let data = $(this).parent().parent();
                        let hold = $this.dt.row(data).data();
                        console.log(hold.details);
                        if (hold.name === 'Skilled Workers') {
                            $this.sw = hold.details;
                            $this.sw_mdl = true;
                        } else if (hold.name === 'Household Service Workers') {
                            $this.hsw = hold.details;
                            $this.hsw_mdl = true;
                        }
                    });
                    $(".approval-show").click(function (e) {
                        let data = $(this).parent().parent();
                        let hold = $this.dt.row(data).data();
                        console.log(hold);
                        $this.serial_no = hold.serial_no;
                        $this.approval_mdl = true;
                    });
                }
            });
        }
    }
</script>
