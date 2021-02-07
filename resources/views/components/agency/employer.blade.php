<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employers') }}
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 mt-5">
                    <a href="{{route('employers.create')}}"
                       class="text-white bg-green-400 hover:bg-green-500 p-2 rounded m-2 shadow">
                        <i class="fas fa-user-plus"></i> {{ __('New Employer') }}
                    </a>
                </div>
                <div class="p-5">
                    <table id="employers-table" class="stripe hover" style="width:100%;"></table>
                </div>
            </div>
        </div>

        <form action="" method="POST">
            <transition name="slide-fade">
                <div class="fixed inset-0 overflow-y-auto" v-if="employees_mdl">
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
                                bg-purple-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600">
                                        <!-- Heroicon name -->
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left" v-if="overview">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                            Employee <span class="underline">@{{ overview.information.name }}</span>
                                        </h3>
                                        <div class="mt-6 grid grid-cols-1">
                                            <div class="col-span-1 mb-2" v-for="item in overview.employee"
                                                 :key="item.id">
                                                <a v-bind:href="'/candidates/' +item.id_e+ '/show'" target="_blank"
                                                   class="text-blue-400 hover:underline hover:text-blue-500">
                                                    <i class="fas fa-link"></i> @{{ item.last_name }}, @{{ item.first_name
                                                    }} @{{ item.middle_name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button" v-on:click="employees_mdl = false"
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
                        employees_mdl: false
                    }
                },
                mounted() {
                    var $this = this;
                    $this.dt = $('#employers-table').DataTable({
                        language :{
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
                        serverSide: true,
                        scrollX: true,
                        order: [[4, "desc"]],
                        ajax: {
                            url: '{{ route('employers.table') }}',
                            type: 'POST'
                        },
                        columns: [
                            {
                                data: function (value) {
                                    return '<a href="/employers/show/' + value.id + '" ' +
                                        'class="hover:underline hover:text-indigo-400">' + value.information.name + '</a>';
                                }, name: 'information.name', title: '{{ __("Company Name") }}'
                            },
                            {
                                data: function (value) {
                                    return '<div class="block text-center">' +
                                        '<button class="btn-employees bg-purple-400 shadow px-1 w-full text-white hover:bg-purple-500">' +
                                        '<i class="fas fa-eye"></i> ' + value.applicant_count + '' +
                                        '</button>' +
                                        '</div>'
                                }, name: 'id', title: '{{ __("Employee(s)") }}', bSortable: false
                            },
                            {data: 'information.phone', name: 'information.phone', title: '{{ __("Phone") }}'},
                            {data: 'email', name: 'email', title: '{{ __("E-mail") }}'},
                            {data: 'created_at_display', name: 'created_at', title: '{{ __("Date Created") }}'},
                        ],
                        drawCallback() {
                            $('table button').click(function (e) {
                                let data = $(this).parent().parent().parent();
                                let hold = $this.dt.row(data).data();
                                $this.overview = hold;
                            });

                            $('.btn-employees').click(function () {
                                $this.employees_mdl = true
                            });
                        }
                    });
                }
            })
        </script>
    </x-slot>
</x-app-layout>
