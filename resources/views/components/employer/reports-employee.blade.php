<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports of an Employer') }}
            <h2 class="mt-1">
                Employee <strong>{{ $candidate->last_name }}
                    , {{ $candidate->first_name }} {{ $candidate->middle_name }}</strong>
            </h2>
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <table id="tbl-employees" class="stripe hover" style="width:100%;"></table>
            </div>
        </div>


        <form action="#" method="POST" enctype="multipart/form-data">
            <transition name="slide-fade">
                <!-- Employee Assign -->
                <div class="fixed inset-0 overflow-y-auto" v-if="report_mdl">
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
                                            Overview for
                                            <span class="underline">@{{ overview.employee.last_name }}, @{{ overview.employee.first_name }} @{{ overview.employee.middle_name }}</span>
                                            <input class="hidden" name="id" v-bind:value="overview.id">
                                        </h3>
                                        <div class="mt-4">
                                            <div class="md:flex flex-none">
                                                <div class="mt-2 mr-2">
                                                    <label>Salary Received?</label>
                                                    <select name="salary_received" v-model="overview.salary_received"
                                                            class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                        <option value="yes">Yes</option>
                                                        <option value="yes">No</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2">
                                                    <label>Salary Date</label>
                                                    <input type="date" name="salary_date" v-model="overview.salary_date"
                                                           class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <label>Comments</label>
                                                <textarea name="comments" rows="6" v-model="overview.comments"
                                                          class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                ></textarea>
                                            </div>
                                            <label class="text-xl mt-2">Attachments</label>
                                            <div class="flex mt-1">
                                                <a v-bind:href="'/' + overview.attachment_1" target="_blank" class="pr-6 text-indigo-300 hover:underline hover:text-indigo-400">
                                                    <i class="fa fa-link"></i> View 1
                                                </a>
                                                <a v-bind:href="'/' + overview.attachment_2" target="_blank" class="pr-6 text-indigo-300 hover:underline hover:text-indigo-400">
                                                    <i class="fa fa-link"></i> View 2
                                                </a>
                                                <a v-bind:href="'/' + overview.attachment_3" target="_blank" class="pr-6 text-indigo-300 hover:underline hover:text-indigo-400">
                                                    <i class="fa fa-link"></i> View 3
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button" v-on:click="report_mdl = false"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </form>
    </div>

    <x-slot name="scripts">
        <script>
            const e = new Vue({
                el: '#app',
                data() {
                    return {
                        overview: null,
                        report_mdl: false,
                    }
                },
                mounted() {
                    var $this = this;
                    $this.dt = $('#tbl-employees').DataTable({
                        responsive: true,
                        serverSide: true,
                        scrollX: true,
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('report.employee.table') }}',
                            type: 'POST',
                            "data": {
                                "id": '{{ $candidate->id }}'
                            }
                        },
                        columns: [
                            {data: 'id', name: 'id', title: 'ID'},
                            {
                                data: 'created_at_display',
                                name: 'created_at',
                                title: 'Date Submitted',
                                className: 'text-center'
                            },
                            {
                                data: function (value) {
                                    return '<button ' +
                                        'class="btn-view bg-purple-400 w-full text-white block text-center hover:bg-purple-500">' +
                                        '<i class="fa fa-eye">' +
                                        '</button>'
                                }, name: 'id', title: 'Action'
                            },
                        ],
                        drawCallback() {
                            $('table button').click(function (e) {
                                let data = $(this).parent().parent();
                                let hold = $this.dt.row(data).data();
                                $this.overview = hold;
                            });
                            $('.btn-view').click(function () {
                                $this.report_mdl = true;
                            });
                        }
                    });
                }
            })
        </script>
    </x-slot>
</x-app-layout>
