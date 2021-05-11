<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Complains') }}
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="max-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5">
                    <table id="complains-table" class="stripe hover" style="width:100%;"></table>
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
                    $this.dt = $('#complains-table').DataTable({
                        responsive: true,
                        serverSide: true,
                        scrollX: true,
                        order: [
                            [0, "desc"]
                        ],
                        ajax: {
                            url: '{{ route('complains.table') }}',
                            type: 'POST'
                        },
                        columns: [{
                                data: 'id',
                                name: 'id',
                                title: 'ID'
                            },
                            {
                                data: function(value) {
                                    return value.last_name + ', ' + value.first_name + ' ' +
                                        value.middle_name;
                                },
                                name: 'last_name',
                                title: 'Name'
                            },
                            {
                                data: 'email_address',
                                name: 'email_address',
                                title: 'E-mail'
                            },
                            {
                                data: 'created_at_display',
                                name: 'created_at',
                                title: 'Date Created'
                            },
                            {
                                data: function(value) {
                                    if(value.remarks)
                                        return '<a href="' + value.route_show + '" class="bg-green-500 hover:bg-green-600 p-1 rounded shadow text-white">Reviewed</a>';
                                    return '<a href="' + value.route_show + '" class="bg-red-500 hover:bg-red-600 p-1 rounded shadow text-white">Pending</a>';
                                },
                                name: 'id',
                                title: 'Status'
                            },
                        ],
                        drawCallback() {

                        }
                    });
                }
            })

        </script>
    </x-slot>
</x-app-layout>
