<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Applicants') }}
        </h2>
    </x-slot>
    <div id="app" class="pb-12 pt-8">
        <div class="flex flex-col bg-white max-w-7xl mx-auto sm:px-6 lg:px-8 shadow-sm sm:rounded-lg p-5">
            <div class="flex flex-col md:flex-row  mb-5 mt-2">
                <a href="{{ $candidate_create }}"
                   class="mt-2 text-white bg-green-400 hover:bg-green-500 p-2 rounded shadow sm:mr-2">
                    <i class="fas fa-user-plus"></i> {{ __('New Applicant') }}
                </a>
                <a href="{{ $candidate_new }}"
                   class="mt-2 text-white bg-yellow-400 hover:bg-yellow-500 p-2 rounded shadow" target="_blank">
                    <i class="fas fa-paperclip"></i> {{ __('Application Form') }}
                </a>
                <a href="#" @click="skill_list_mdl = true"
                   class="ml-2 mt-2 text-white bg-indigo-400 hover:bg-indigo-500 p-2 rounded shadow">
                    <i class="fa fa-server" aria-hidden="true"></i> {{ __('Skill List') }}
                </a>
            </div>
            <div class="overflow-hidden">
                <table id="tbl-applicants" class="stripe hover display" style="width:100% !important;"></table>
            </div>
        </div>

        {{--        Employer Assign--}}
        <transition name="slide-fade">
            <form action="{{ route('candidate.assign.employer') }}" method="POST">
                @csrf
                <transition name="slide-fade">
                    <!-- Employee Assign -->
                    <div class="fixed inset-0 overflow-y-auto" v-if="employer_mdl">
                        <div
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                  aria-hidden="true">&#8203;</span>
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
                                        <div class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                                             v-if="overview">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                                Assign an Employer for
                                                <span class="underline">@{{ overview.last_name }}, @{{ overview.first_name }} @{{ overview.middle_name }}</span>
                                                <input class="hidden" name="id" v-bind:value="overview.id">
                                            </h3>
                                            <div class="mt-6">
                                                <p class="text-sm text-gray-500">
                                                    <select name="employer_id"
                                                            class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                        <option value="">not assigned</option>
                                                        @foreach($employers as $item)
                                                            <option value="{{ $item->information->user_id }}">
                                                                {{ $item->information->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </p>
                                                <div class="flex">
                                                    <div class="mt-2">
                                                        <label>Position Selected</label>
                                                        <select name="position_selected"
                                                                class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                            <option v-bind:value="overview.position_1" selected>
                                                                @{{ overview.position_1 }}
                                                            </option>
                                                            <option v-bind:value="overview.position_2">
                                                                @{{ overview.position_2 }}
                                                            </option>
                                                            <option v-bind:value="overview.position_3">
                                                                @{{ overview.position_3 }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2  ml-3">
                                                        <label>Salary</label>
                                                        <input type="number" name="salary"
                                                               class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                    </div>
                                                </div>
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
                </transition>
            </form>
        </transition>
        {{--        Exporting--}}
        <transition name="slide-fade">
            <!-- Employee Assign -->
            <div class="fixed inset-0 overflow-y-auto" v-if="employer_pdf_mdl">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                          aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600">
                                    <!-- Heroicon name -->
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left" v-if="overview">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                        Convert to PDF
                                        <span class="underline">@{{ overview.last_name }}, @{{ overview.first_name }} @{{ overview.middle_name }}</span>
                                    </h3>
                                    <div class="mt-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <form action="{{ route('candidate.pdf') }}" method="GET">
                                @csrf
                                <input class="hidden" name="id" v-bind:value="overview.id">
                                <textarea hidden type="text" name="remarks" rows="6"
                                          class="hidden mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                >@{{ overview.remarks }}</textarea>
                                <button type="submit"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-3 py-3 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </form>
                            <form action="{{ route('candidate.word') }}" method="GET">
                                @csrf
                                <input class="hidden" name="id" v-bind:value="overview.id">
                                <textarea type="text" name="remarks" rows="6"
                                          class="hidden mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                >@{{ overview.remarks }}</textarea>
                                <button type="submit"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-3 py-3 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    <i class="fas fa-file-word"></i>
                                </button>
                            </form>
                            <button type="button" v-on:click="employer_pdf_mdl = false"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        {{--        Date APPLIED--}}
        <transition name="slide-fade">
            <!-- Employee Assign -->
            <div class="fixed inset-0 overflow-y-auto" v-if="date_applied_mdl">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                          aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600">
                                    <!-- Heroicon name -->
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left" v-if="overview">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                        Date Applied
                                        <span class="underline">@{{ overview.last_name }}, @{{ overview.first_name }} @{{ overview.middle_name }}</span>
                                    </h3>
                                    <div class="mt-6">
                                        <div class="flex flex-row">
                                            <div class="mt-2 w-full">
                                                <label>Date Applied</label>
                                                <input type="date" name="created_at" v-model="overview.created_at_bind"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-2 sm:px-6 sm:flex sm:flex-row-reverse">
                            <form action="{{ route('candidate.update.created_at') }}" method="POST">
                                @csrf
                                <input class="hidden" name="id" v-bind:value="overview.id">
                                <input class="hidden" type="date" name="created_at" v-model="overview.created_at_bind">
                                <button type="submit"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-3 py-3 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Update
                                </button>
                            </form>
                            <button type="button" v-on:click="date_applied_mdl = false"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        {{--        Skill List--}}
        <transition name="slide-fade">
            <!-- Employee Assign -->
            <div class="fixed inset-0 overflow-y-auto" v-if="skill_list_mdl">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                          aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl
                        transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full
                                    bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600">
                                    <!-- Heroicon name -->
                                    <i class="fas fa-server"></i>
                                </div>
                                <div class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left" v-if="overview">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                        Skill List
                                    </h3>
                                    <div class="mt-4">
                                        <div class="flex flex-row">
                                            <div class="flex-shrink">
                                                <input class="h-full w-full border-0 bg-gray-100 rounded text-black
                                                outline-none focus:ring-opacity-0 flex-shrink px-2" v-model="skill">
                                            </div>
                                            <div class="flex-grow">
                                                <button type="button" @click="addSkillList"
                                                        class="mt-3 w-full block inline-flex justify-center rounded-md
                                                        border border-indigo-300 shadow-sm px-4 py-2 bg-white text-base
                                                        font-medium text-white bg-indigo-400 hover:bg-indigo-500
                                                        focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto
                                                        sm:text-sm text-xl">
                                                    Add List
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex flex-col mt-3">
                                            <div v-for="item in skill_list" class="flex justify-between border p-2">
                                                <label class="px-4 py-2">@{{ item.name }}</label>
                                                <button type="button" @click="delSkillList(item.id)"
                                                        class="mt-3 w-full block inline-flex justify-center rounded-md
                                                        border border-red-300 shadow-sm px-4 py-2 bg-white text-base
                                                        font-medium text-white bg-red-400 hover:bg-red-500
                                                        focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto
                                                        sm:text-sm text-xl">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-2 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" v-on:click="skill_list_mdl = false"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300
                                    shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50
                                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0
                                    sm:ml-3 sm:w-auto sm:text-sm">
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
                        overview: {
                            created_at_bind: ''
                        },
                        skill_list: [],
                        skill: '',
                        employer_mdl: false,
                        employer_pdf_mdl: false,
                        agent_mdl: false,
                        date_applied_mdl: false,
                        skill_list_mdl: false,
                    }
                },
                methods: {
                    addSkillList() {
                        var $this = this;
                        axios.post('{{ route('candidate.save.skill') }}', {
                            skill: this.skill
                        }).then(function () {
                            $this.skill = '';
                            $this.getSkillList()
                        });
                    },
                    delSkillList(id) {
                        var $this = this;
                        axios.post('{{ route('candidate.del.skill') }}', {
                            id: id
                        }).then(function () {
                            $this.skill = '';
                            $this.getSkillList()
                        });
                    },
                    getSkillList() {
                        var $this = this;
                        axios.post('{{ route('candidate.get.skill') }}').then(function (value) {
                            $this.skill_list = value.data;
                        });
                    },
                    convertWord() {
                        axios.get('{{ route('candidate.word') }}', {
                            params: this.overview
                        });
                    }
                },
                mounted() {
                    var $this = this;
                    $this.getSkillList();
                    $this.dt = $('#tbl-applicants').DataTable({
                        language: {
                            "search": '{{ __('Search') }}',
                            "lengthMenu": '{{ __("Show _MENU_ entries") }}',
                            "info": "{{ __('Showing from _START_ to _END_ of _TOTAL_ records') }}",
                            "infoEmpty": "{{ __('No records available') }}",
                            "infoFiltered": "",
                            "zeroRecords": "{{ __('No matching records found') }}",
                            "paginate": {
                                "previous": '{{ __("Previous") }}',
                                "next": '{{ __("Next") }}'
                            }
                        },
                        responsive: true,
                        width: '100px',
                        serverSide: true,
                        scrollX: true,
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('candidate.applicant.table') }}',
                            type: 'POST'
                        },
                        columns: [
                            {
                                data: function (value) {
                                    return '<div class="inline-grid grid-cols-1 gap-x-0 w-full text-sm shadow">\n' +
                                        '<div class="col-span-1">\n'
                                        + '<button class="btn-date-applied bg-indigo-400 hover:bg-indigo-500 p-1 text-white w-full rounded fw-bold">'
                                        + value.created_at_display
                                        + '</button>'
                                        + '</div></div>'
                                },
                                name: 'created_at',
                                title: '{{ __("Date Applied") }}',
                                width: '130px'
                            },
                            {
                                data: function (value) {
                                    return '<a href="/candidates/' + value.id_e + '/show" ' +
                                        'class="hover:underline hover:text-indigo-400">' +
                                        '' + value.last_name + ', ' + value.first_name + '</a>';
                                }, name: 'last_name', title: '{{ __('Full Name') }}'
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
                                }, name: 'gender', title: '{{ __("Gender") }}'
                            },
                            {data: 'age', name: 'birth_date', title: '{{ __("Age") }}'},
                            {data: 'contact_1', name: 'contact_1', title: '{{ __("Primary Contact") }}'},
                            {data: 'email', name: 'email', title: '{{ __("E-mail") }}'},
                            {
                                data:
                                    function (value) {
                                        return '<div class="inline-grid grid-cols-3 gap-x-0 w-full text-sm shadow">\n' +
                                            '<div class="col-span-1">\n' +
                                            '<button class="btn-employer bg-blue-700 p-1 text-white w-full">' +
                                            '<i class="fas fa-building"></i></button>\n' +
                                            '</div>\n' +
                                            '<div class="col-span-1">\n' +
                                            '<button class="btn-pdf bg-yellow-300 p-1 text-white w-full">' +
                                            '<i class="fas fa-download"></i></button>\n' +
                                            '</div>\n' +
                                            '<div class="col-span-1">\n' +
                                            '<button class="btn-details bg-blue-400 hover:bg-blue-500 p-1 text-white w-full"><i class="fas fa-info-circle"></i></button>\n' +
                                            '</div>\n' +
                                            '</div>'
                                    }, name: 'id', title: '{{ __("Actions") }}', bSortable: false
                            },
                        ],
                        drawCallback() {
                            $('table button').click(function (e) {
                                let data = $(this).parent().parent().parent();
                                let hold = $this.dt.row(data).data();
                                $this.overview = hold;
                            });

                            $('.btn-date-applied').click(function () {
                                $this.date_applied_mdl = true;
                            });

                            $('.btn-employer').click(function () {
                                $this.employer_mdl = true;
                            });

                            $('.btn-pdf').click(function () {
                                $this.employer_pdf_mdl = true;
                            });

                            $('.btn-agent').click(function () {
                                $this.agent_mdl = true;
                                if ($this.overview.agent === null) {
                                    $this.overview.agent = {'id': ''}
                                }
                            });

                            $('.btn-details').click(function () {
                                window.open('/details/' + $this.overview.id, '_blank')
                            });
                        }
                    });
                }
            })
        </script>
    </x-slot>
</x-app-layout>
