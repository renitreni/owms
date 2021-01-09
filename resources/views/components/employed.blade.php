<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employed') }}
        </h2>
    </x-slot>

    <div id="app" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5">
                    <table id="tbl-applicants" class="stripe hover" style="width:100%;"></table>
                </div>
            </div>
        </div>

        <form action="{{ route('candidate.assign.employer') }}" method="POST">
        @csrf
        <!-- Employee Assign -->
            <div class="fixed inset-0 overflow-y-auto"
                 v-bind:class="[employer_mdl ? '' : 'hidden']">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600">
                                    <!-- Heroicon name -->
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left" v-if="overview">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                        Assign an Employer for
                                        <span class="underline">@{{ overview.last_name }}, @{{ overview.first_name }} @{{ overview.middle_name }}</span>
                                        <input class="hidden" name="id" v-bind:value="overview.id">
                                    </h3>
                                    <div class="mt-6">
                                        <p class="text-sm text-gray-500">
                                            <select name="employer_id" v-model="overview.employer.id"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                <option value="">not assigned</option>
                                                @foreach($employers as $item)
                                                    <option
                                                        value="{{ $item->id }}">{{ $item->information->name }}</option>
                                                @endforeach
                                            </select>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="submit"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Assign
                            </button>
                            <button type="button" v-on:click="employer_mdl = false"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('candidate.assign.agent') }}" method="POST">
        @csrf
        <!-- Agent Assign -->
            <div class="fixed inset-0 overflow-y-auto"
                 v-bind:class="[agent_mdl ? '' : 'hidden']">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full
                            bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600">
                                    <!-- Heroicon name -->
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left" v-if="overview">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                        Assign an Agent for
                                        <span class="underline">@{{ overview.last_name }}, @{{ overview.first_name }} @{{ overview.middle_name }}</span>
                                        <input class="hidden" name="id" v-bind:value="overview.id">
                                    </h3>
                                    <div class="mt-6">
                                        <p class="text-sm text-gray-500">
                                            <select name="agent_id" v-model="overview.agent.id"
                                                    class="w-full border-0 bg-gray-100 rounded text-black">
                                                <option value="">not assigned</option>
                                                @foreach($agents as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="submit"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Assign
                            </button>
                            <button type="button" v-on:click="agent_mdl = false"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <x-slot name="scripts">
        <script>
            const e = new Vue({
                el: '#app',
                data() {
                    return {
                        overview: null,
                        employer_mdl: false,
                        agent_mdl: false,
                    }
                },
                mounted() {
                    var $this = this;
                    $this.dt = $('#tbl-applicants').DataTable({
                        responsive: true,
                        serverSide: true,
                        scrollX: true,
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('candidate.employed.table') }}',
                            type: 'POST'
                        },
                        columns: [
                            {data: 'id', name: 'id', title: 'ID'},
                            {
                                data: function (value) {
                                    return '<a href="/candidates/' + value.id + '/show" ' +
                                        'class="hover:underline hover:text-indigo-400">' +
                                        '' + value.last_name + ', ' + value.first_name + '</a>';
                                }, name: 'last_name', title: 'Full Name'
                            },
                            {
                                data: function (value) {
                                    if (value.gender == 'male') {
                                        return '<span class="text-blue-600 text-2xl block text-center">' +
                                            '<i class="fas fa-male"></i>' +
                                            '</span>';
                                    }
                                    return '<span class="text-pink-400 text-2xl block text-center">' +
                                        '<i class="fas fa-female"></i>' +
                                        '</span>';
                                }, name: 'gender', title: 'Gender'
                            },
                            {data: 'age', name: 'birth_date', title: 'Age'},
                            {data: 'contact_1', name: 'contact_1', title: 'Contact'},
                            {data: 'email', name: 'email', title: 'E-mail'},
                            {data: 'date_hired', name: 'date_hired', title: 'Hired'},
                            {
                                data: function (value) {
                                    return value.employer ? value.employer.name : 'Not Assigned';
                                }, name: 'id', title: 'Employer', bSortable: false
                            },
                            {
                                data:
                                    function (value) {
                                        return '<div class="inline-grid grid-cols-4 gap-x-0 w-full text-sm shadow">\n' +
                                            '<div class="col-span-2">\n' +
                                            '<button class="btn-employer bg-blue-700 p-1 text-white w-full"><i class="fas fa-building"></i></button>\n' +
                                            '</div>\n' +
                                            '<div class="col-span-2">\n' +
                                            '<button class="btn-agent bg-yellow-500 p-1 text-white w-full"><i class="fas fa-user-tie"></i></button>\n' +
                                            '</div>\n' +
                                            '</div>'
                                    }, name: 'id', title: 'Actions', bSortable: false
                            },
                        ],
                        drawCallback() {
                            $('table button').click(function (e) {
                                let data = $(this).parent().parent().parent();
                                let hold = $this.dt.row(data).data();
                                $this.overview = hold;
                            });

                            $('.btn-employer').click(function () {
                                $this.employer_mdl = true;
                                if ($this.overview.employer === null) {
                                    $this.overview.employer = {'id': ''}
                                }
                            });

                            $('.btn-agent').click(function () {
                                $this.agent_mdl = true;
                                if ($this.overview.agent === null) {
                                    $this.overview.agent = {'id': ''}
                                }
                            });
                        }
                    });
                }
            })
        </script>
    </x-slot>
</x-app-layout>