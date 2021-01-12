<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
        <h2 class="font-semibold text-gray-800 leading-tight">
            link of Status Report Form:
            <a href="{{ route('report.from.employee') }}"
               class="hover:underline" target="_blank">
                {{ route('report.from.employee') }}</a>
        </h2>
    </x-slot>

    <div id="app" class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <table id="tbl-reports" class="stripe hover" style="width:100%;"></table>
            </div>
        </div>
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
                    $this.dt = $('#tbl-reports').DataTable({
                        responsive: true,
                        serverSide: true,
                        scrollX: true,
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('reports.table') }}',
                            type: 'POST',
                            "data": {
                                "id": '{{ auth()->id() }}'
                            }
                        },
                        columns: [
                            {
                                data: 'created_at_display',
                                name: 'created_at',
                                title: 'Date Submitted',
                                className: 'text-center'
                            },
                            {
                                data: function (value) {
                                    return '<a href="/candidates/' + value.employee.id + '/show" ' +
                                        'class="hover:underline hover:text-indigo-400">' +
                                        '' + value.employee.last_name + ', ' +
                                        '' + value.employee.first_name + ' ' +
                                        '' + value.employee.middle_name + '</a>';
                                }, name: 'last_name', title: 'Full Name'
                            },
                            {
                                data: function (value) {
                                    if (value.created_by == 'employee') {
                                        return '<div class="bg-yellow-200 text-center rounded shadow">Employee</div>'
                                    }
                                    if (value.created_by == 'employer') {
                                        return '<div class="bg-green-200 text-center rounded shadow">Employer</div>'
                                    }
                                },
                                name: 'created_by', title: 'From'},
                            {
                                data: function (value) {
                                    return '<a href="/report/view/' + value.id + '/employee"' +
                                        'class="bg-purple-400 text-white block text-center hover:bg-purple-500">' +
                                        '<i class="fa fa-eye">' +
                                        '</a>'
                                }, name: 'id', title: 'Action'
                            },
                        ],
                        drawCallback() {
                            $('table button').click(function (e) {
                                let data = $(this).parent().parent().parent();
                                let hold = $this.dt.row(data).data();
                                $this.overview = hold;
                            });
                        }
                    });
                }
            })
        </script>
    </x-slot>
</x-app-layout>
