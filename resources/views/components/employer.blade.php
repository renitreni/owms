<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employers') }}
        </h2>
    </x-slot>

    <div id="app" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 mt-5">
                    <a href="{{route('employers.create')}}"
                       class="text-white bg-green-400 hover:bg-green-500 p-2 rounded m-2 shadow">
                        <i class="fas fa-user-plus"></i> New Employer
                    </a>
                </div>
                <div class="p-5">
                    <table id="employers-table" class="stripe hover" style="width:100%;"></table>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            const e = new Vue({
                el: '#app',
                mounted() {
                    var $this = this;
                    $this.dt = $('#employers-table').DataTable({
                        responsive: true,
                        serverSide: true,
                        scrollX: true,
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('employers.table') }}',
                            type: 'POST'
                        },
                        columns: [
                            {data: 'id', name: 'id', title: 'ID'},
                            {
                                data: function (value) {
                                    return '<div class="block text-center">' +
                                        '<button class="bg-purple-400 shadow px-1 w-full text-white hover:bg-purple-500">' +
                                        '<i class="fas fa-eye"></i> ' + value.applicant_count + '' +
                                        '</button>' +
                                        '</div>'
                                }, name: 'applicant_count', title: 'Applicants', bSortable: false
                            },
                            {
                                data: function (value) {
                                    return '<a href="/employers/show/' + value.id + '" ' +
                                        'class="hover:underline hover:text-indigo-400">' + value.information.name + '</a>';
                                }, name: 'information.name', title: 'Company Name'
                            },
                            {data: 'information.phone', name: 'information.phone', title: 'Phone'},
                            {data: 'email', name: 'email', title: 'E-mail'},
                            {data: 'created_at_display', name: 'created_at', title: 'Date Created'},
                        ],
                        drawCallback() {

                        }
                    });
                }
            })
        </script>
    </x-slot>
</x-app-layout>
