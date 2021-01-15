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
