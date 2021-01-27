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
                                        <div
                                            class="grid grid-flow-row grid-cols-1 grid-rows-3 gap-1 md:grid-cols-4 md:grid-rows-1 md:gap-4">
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
                                        <div
                                            class="grid grid-flow-row grid-cols-1 grid-rows-2 gap-1 md:grid-cols-4 md:grid-rows-1 md:gap-4 border-t-2">
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
                                        <div
                                            class="grid grid-flow-row grid-cols-1 grid-rows-2 gap-1 md:grid-cols-4 md:grid-rows-1 md:gap-4 border-t-2">
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
                                        <div
                                            class="grid grid-flow-row grid-cols-1 grid-rows-2 md:grid-cols-4 md:grid-rows-1 gap-4 border-t-2">
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
                                        <div
                                            class="grid grid-flow-row grid-cols-1 grid-rows-2 md:grid-cols-4 md:grid-rows-1 gap-4 border-t-2">
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
                                    <div class="border-l border-r border-b p-3" v-show="tab==2">
                                        <table id="tbl-documents" class="stripe hover" style="width:100%;"></table>
                                    </div>
                                    <div class="border-l border-r border-b p-3" v-show="tab==3">
                                        <table id="tbl-flights" class="stripe hover" style="width:100% !important;"></table>
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

            <transition name="slide-fade">
                <!-- Flight Status -->
                <div class="fixed inset-0 overflow-y-auto" v-if="flight_overview">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                              aria-hidden="true">&#8203;</span>
                        <div
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-100"
                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left" v-if="overview">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                            Flight Status Overview
                                        </h3>
                                        <div class="flex flex-col mt-4" v-if="overview.details">
                                            <div class="flex flex-row">
                                                <div class="mr-3">
                                                    <div class="font-bold">Abroad Agency</div>
                                                    <div>@{{ overview.agency_abroad.name }}</div>
                                                </div>
                                                <div class="mr-3">
                                                    <div class="font-bold">Contact Person</div>
                                                    <div>@{{ overview.contact_person }}</div>
                                                </div>
                                                <div class="mr-3">
                                                    <div class="font-bold">Contact Number</div>
                                                    <div>@{{ overview.contact_number }}</div>
                                                </div>
                                                <div class="mr-3">
                                                    <div class="font-bold">Created By</div>
                                                    <div>@{{ overview.author.name }}</div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold">Details</div>
                                                <div>@{{ overview.details }}</div>
                                            </div>
                                            <div>
                                                <div class="font-bold">Contact Address</div>
                                                <div>@{{ overview.contact_address }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button" v-on:click="flight_overview = false"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>

        <x-slot name="scripts">
            <script>
                const e = new Vue({
                    el: '#app',
                    data() {
                        return {
                            tab: 1,
                            file_path: '',
                            dt_docs: null,
                            dt_flights: null,
                            flight_overview: false
                        }
                    },
                    watch: {
                        'tab': function (value) {
                            if (value == 2)
                                this.dt_docs.draw();
                            else
                                this.dt_flights.draw();
                        }
                    },
                    methods: {
                        fileUpload(e) {
                            console.log(e.target.files);
                            this.file_path = e.target.files[0].name
                        }
                    },
                    mounted() {
                        var $this = this;
                        $this.dt_docs = $('#tbl-documents').DataTable({
                            responsive: true,
                            serverSide: true,
                            scrollX: true,
                            order: [[0, "desc"]],
                            ajax: {
                                url: '{{ route('details.document.table') }}',
                                type: 'POST',
                                data: {candidate_id: '{{$id}}'}
                            },
                            columns: [
                                {data: 'id', name: 'id', title: 'ID'},
                                {
                                    data: function (value) {
                                        return '<div class="w-full text-center">' +
                                            value.doc.name +
                                            '</div>'
                                    }, name: 'doc.name', title: 'Document'
                                },
                                {
                                    data: function (value) {
                                        return '<div class="w-full text-center">' +
                                            value.created_at_display +
                                            '</div>'
                                    }, name: 'created_at', title: 'Date Submitted'
                                },
                                {
                                    data: function (value) {
                                        return '<div class="inline-grid grid-cols-2 gap-x-0 w-full text-sm shadow">\n' +
                                            '<div class="col-span-2 w-full text-center h-full">\n' +
                                            '<a href="/' + value.path + '" target="_blank" class="h-full pt-1 block bg-indigo-400 shadow px-1 text-white hover:bg-indigo-500">' +
                                            '<i class="fas fa-eye"></i>' +
                                            '</a>' +
                                            '</div>\n' +
                                            '</div>'
                                    }, name: 'created_at', title: 'Action', bSortable: false
                                },
                            ],
                            drawCallback() {
                                $('#tbl-documents button').click(function (e) {
                                    let data = $(this).parent().parent().parent();
                                    let hold = $this.dt_docs.row(data).data();
                                    $this.overview = hold;
                                });

                                $('.btn-delete').click(function () {
                                    $this.deleteDoc();
                                });
                            }
                        });

                        $this.dt_flights = $('#tbl-flights').DataTable({
                            responsive: true,
                            serverSide: true,
                            scrollX: true,
                            width: '100%',
                            order: [[0, "desc"]],
                            ajax: {
                                url: '{{ route('details.flight.table') }}',
                                type: 'POST',
                                data: {candidate_id: '{{$id}}'}
                            },
                            columns: [
                                {data: 'id', name: 'id', title: 'ID'},
                                {data: 'contact_person', name: 'contact_person', title: 'Contact Person'},
                                {data: 'contact_number', name: 'contact_number', title: 'Contact Number'},
                                {
                                    data: function (value) {
                                        return '<div class="inline-grid grid-cols-2 gap-x-0 w-full text-sm shadow">\n' +
                                            '<div class="col-span-2 w-full">\n' +
                                            '<button ' +
                                            'class="w-full btn-view-flight bg-indigo-400 p-1 text-white text-center block focus:outline-none hover:bg-indigo-500">' +
                                            '<i class="fas fa-eye"></i>' +
                                            '</button>\n' +
                                            '</div>\n' +
                                            '</div>'
                                    }, name: 'created_at', title: 'Action', bSortable: false
                                },
                            ],
                            drawCallback() {
                                $('#tbl-flights button').click(function (e) {
                                    let data = $(this).parent().parent().parent();
                                    let hold = $this.dt_flights.row(data).data();
                                    $this.overview = hold;
                                });

                                $('.btn-delete-flight').click(function () {
                                    $this.deleteFlight();
                                });

                                $('.btn-view-flight').click(function () {
                                    $this.flight_overview = true
                                });
                            }
                        });
                    }
                });
            </script>
        </x-slot>
</x-app-layout>
