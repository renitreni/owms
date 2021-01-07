<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicants') }}
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
    </div>

    <x-slot name="scripts">
        <script>
            const e = new Vue({
                el: '#app',
                mounted() {
                    var $this = this;
                    $this.dt = $('#tbl-applicants').DataTable({
                        responsive: true,
                        serverSide: true,
                        scrollX: true,
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('candidate.applicant.table') }}',
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
                            {data: 'passport', name: 'passport', title: 'Passport'},
                            {data: 'gender', name: 'gender', title: 'Gender'},
                            {data: 'age', name: 'birth_date', title: 'Age'},
                            {data: 'contact_1', name: 'contact_1', title: 'Primary Contact'},
                            {data: 'contact_2', name: 'contact_2', title: 'Secondary Contact'},
                            {data: 'created_at_display', name: 'created_at', title: 'Date Applied'},
                        ],
                        drawCallback() {

                        }
                    });
                }
            })
        </script>
    </x-slot>
</x-app-layout>
