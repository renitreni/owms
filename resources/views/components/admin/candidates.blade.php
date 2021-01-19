<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Candidates') }}
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <table id="tbl-candidates" class="stripe hover display" style="width:100% !important;"></table>
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
                    $this.dt = $('#tbl-candidates').DataTable({
                        responsive: true,
                        width: '100px',
                        serverSide: true,
                        scrollX: true,
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('candidate.table') }}',
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
                            {data: 'iqama', name: 'iqama', title: 'IQAMA'},
                            {data: 'date_deployed', name: 'date_deployed', title: 'Date Deployed'},
                            {data: 'date_hired', name: 'date_hired', title: 'Date Hired'},
                            {data: 'created_at_display', name: 'created_at', title: 'Date Applied', width: '130px'},
                        ],
                        drawCallback() {
                            $('table button').click(function (e) {
                                let data = $(this).parent().parent().parent();
                                let hold = $this.dt.row(data).data();
                                $this.overview = hold;
                            });

                            $('.btn-employer').click(function () {
                                $this.employer_mdl = true;
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
