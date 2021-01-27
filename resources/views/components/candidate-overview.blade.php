<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Overview
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="w-full sm:w-11/12 mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:grid md:grid-cols-1">
                    <div class="md:mt-0 md:col-span-1">
                        <input class="hidden" name="agency_id" value="{{ auth()->id() }}">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="flex flex-col px-4 py-5 bg-white sm:p-6 mb-1">
                                <div class="flex flex-col md:flex-row border border-gray-100 rounded shadow-md">
                                    <div class="flex flex-grow flex-col p-2 border-l">
                                        <label class="text-gray-500">
                                            <i class="fas fa-circle text-xs text-green-300"></i> Applicant Name</label>
                                        <label class="text-xl font-bold">
                                            {{ $candidate->last_name }}
                                            , {{ $candidate->first_name }} {{ $candidate->middle_name }}
                                        </label>
                                    </div>
                                    <div class="flex flex-grow flex-col p-2 border-l">
                                        <label class="text-gray-500">
                                            <i class="fas fa-circle text-xs text-green-300"></i> Position
                                            Selected</label>
                                        <label class="text-xl font-bold">
                                            {{ $candidate->position_selected }}
                                        </label>
                                    </div>
                                    <div class="flex flex-grow flex-col p-2 border-l">
                                        <label class="text-gray-500">
                                            <i class="fas fa-circle text-xs text-green-300"></i> Agency</label>
                                        <label class="text-xl font-bold">
                                            {{ $candidate->agency->name }}
                                        </label>
                                    </div>
                                    <div class="flex flex-grow flex-col p-2 border-l">
                                        <label class="text-gray-500">
                                            <i class="fas fa-circle text-xs text-green-300"></i> Agency Abroad</label>
                                        <label class="text-xl font-bold">
                                            {{ $candidate->affiliates->name }}
                                        </label>
                                    </div>
                                    <div class="flex flex-grow flex-col p-2 border-l">
                                        <label class="text-gray-500">
                                            <i class="fas fa-circle text-xs text-green-300"></i> Employer</label>
                                        <label class="text-xl font-bold">
                                            {{ $candidate->employer->name }}
                                        </label>
                                    </div>
                                </div>
                                <div class="flex flex-col mt-5 overflow-scroll">
                                    <ul class="list-reset flex border-b">
                                        <li class="mr-1" v-bind:class="{'-mb-px': (tab == 1)}">
                                            <span @click="tab = 1" class="cursor-pointer bg-white inline-block"
                                                  v-bind:class="{'border-l border-t border-r rounded-t py-2 px-4 text-blue-dark font-bold': (tab == 1), 'py-2 px-4 hover:text-blue-400 hover:bg-gray-100': (tab != 1)}">
                                                General
                                            </span>
                                        </li>
                                        <li class="mr-1" v-bind:class="{'-mb-px': (tab == 2)}">
                                            <span @click="tab = 2" class="cursor-pointer bg-white inline-block"
                                                  v-bind:class="{'border-l border-t border-r rounded-t py-2 px-4 text-blue-dark font-bold': (tab == 2), 'py-2 px-4 hover:text-blue-400 hover:bg-gray-100': (tab != 2)}">
                                                Documents
                                            </span>
                                        </li>
                                        <li class="mr-1" v-bind:class="{'-mb-px': (tab == 3)}">
                                            <span @click="tab = 3" class="cursor-pointer bg-white inline-block"
                                                  v-bind:class="{'border-l border-t border-r rounded-t py-2 px-4 text-blue-dark font-bold': (tab == 3), 'py-2 px-4 hover:text-blue-400 hover:bg-gray-100': (tab != 3)}">
                                                Flights
                                            </span>
                                        </li>
                                    </ul>
                                    <div class="border-l border-r border-b p-3" v-show="tab==1">
                                        <div class="grid grid-flow-row grid-cols-1 grid-rows-3 gap-1 md:grid-cols-4 md:grid-rows-1 md:gap-4">
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Primary Contact
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->contact_1 }}
                                                </label>
                                            </div>
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Secondary Contact
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->contact_2 }}
                                                </label>
                                            </div>
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    E-mail
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->email }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="grid grid-flow-row grid-cols-1 grid-rows-2 gap-1 md:grid-cols-4 md:grid-rows-1 md:gap-4 border-t-2">
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Passport No.
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->passport }}
                                                </label>
                                            </div>
                                            <div class="col-span-3 p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Place Issue.
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->place_issue }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="grid grid-flow-row grid-cols-1 grid-rows-2 gap-1 md:grid-cols-4 md:grid-rows-1 md:gap-4 border-t-2">
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    IQAMA
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->iqama }}
                                                </label>
                                            </div>
                                            <div class="col-span-3 p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Address
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->address }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="grid grid-flow-row grid-cols-1 grid-rows-2 md:grid-cols-4 md:grid-rows-1 gap-4 border-t-2">
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Gender
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->gender }}
                                                </label>
                                            </div>
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Date Of Birth
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ \Carbon\Carbon::parse($candidate->birth_date)->format('F j, Y') }}
                                                </label>
                                            </div>
                                            <div class="p-2 flex flex-col col-span-1 md:col-span-2 hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Place Of Birth
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->birth_place }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="grid grid-flow-row grid-cols-1 grid-rows-2 md:grid-cols-4 md:grid-rows-1 gap-4 border-t-2">
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Civil Status
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->civil_status }}
                                                </label>
                                            </div>
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Height
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->height }}
                                                </label>
                                            </div>
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Weight
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->weight }}
                                                </label>
                                            </div>
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Blood Type
                                                </label>
                                                <label class="text-l font-bold capitalize">
                                                    {{ $candidate->blood_type }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="grid grid-flow-row grid-cols-4 grid-rows-1 gap-4 border-t-2">
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Language Spoken
                                                </label>
                                                <label class="text-l font-bold">
                                                    {{ $candidate->language }}
                                                </label>
                                            </div>
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Religion
                                                </label>
                                                <label class="text-l font-bold">
                                                    {{ $candidate->religion }}
                                                </label>
                                            </div>
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    Father's Name
                                                </label>
                                                <label class="text-l font-bold">
                                                    {{ $candidate->father_name }}
                                                </label>
                                            </div>
                                            <div class="p-2 flex flex-col hover:bg-yellow-100">
                                                <label class="text-gray-500 text-xs">
                                                    <i class="fas fa-info-circle text-blue-300"></i>
                                                    {{ __("Mother's Name") }}
                                                </label>
                                                <label class="text-l font-bold">
                                                    {{ $candidate->mother_name }}
                                                </label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <a href="#" onclick="window.history.back()" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            const e = new Vue({
                el: '#app',
                data() {
                    return {
                        tab: 1,
                        file_path: ''
                    }
                },
                methods: {
                    fileUpload(e) {
                        console.log(e.target.files)
                        this.file_path = e.target.files[0].name
                    }
                }
            });
        </script>
    </x-slot>
</x-app-layout>
