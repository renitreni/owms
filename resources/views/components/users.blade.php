<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div id="app" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 mt-5">
                    <a href="{{route('users.create')}}"
                       class="text-white bg-green-400 hover:bg-green-500 p-2 rounded m-2 shadow">
                        <i class="fas fa-user-plus"></i> New User
                    </a>
                </div>
                <div class="p-5">
                    <table id="users-table" class="stripe hover" style="width:100%;"></table>
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
                    $this.dt = $('#users-table').DataTable({
                        responsive: true,
                        serverSide: true,
                        scrollX: true,
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('users.table') }}',
                            type: 'POST'
                        },
                        columns: [
                            {data: 'id', name: 'id', title: 'ID'},
                            {
                                data: function (value) {
                                    if (value.role == '1') {
                                        return '<div class="bg-yellow-200 text-center rounded shadow">Admin</div>'
                                    }
                                    if (value.role == '2') {
                                        return '<div class="bg-green-200 text-center rounded shadow">Agency</div>'
                                    }
                                    if (value.role == '3') {
                                        return '<div class="bg-blue-200 text-center rounded shadow">Employer</div>'
                                    }
                                    if (value.role == '4') {
                                        return '<div class="bg-purple-200 text-center rounded shadow">Government</div>'
                                    }
                                }, name: 'role', title: 'Role'
                            },
                            {
                                data: function (value) {
                                    return '<a href="/users/show/' + value.id + '" ' +
                                        'class="hover:underline hover:text-indigo-400">' + value.information.name + '</a>';
                                }, name: 'information.name', title: 'Name'
                            },
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
