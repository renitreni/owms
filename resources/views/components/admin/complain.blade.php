<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Complains') }}
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="max-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pt-3 pl-3">
                    <button @click="cases_mdl= true"
                            class="bg-indigo-400 hover:bg-indigo-300 p-2 rounded shadow text-white">
                        <i class="fas fa-exclamation-triangle"></i> List Of Heinous Crimes
                    </button>
                </div>
                <div class="p-3">
                    <table id="complains-table" class="stripe hover" style="width:100%;"></table>
                </div>
            </div>
        </div>

        <!--    Cases Modal-->
        <transition name="slide-fade">
            <!-- Cases add -->
            <div class="fixed inset-0 overflow-auto" v-if="cases_mdl">
                <div
                    class="flex items-end justify-center pt-20 px-4 pb-20 text-center sm:block sm:p-0  overflow-auto"
                >
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span
                        class="hidden sm:inline-block sm:align-middle sm:h-screen"
                        aria-hidden="true"
                    >&#8203;</span
                    >
                    <div
                        class="inline-block bg-white rounded-lg text-left overflow-auto shadow-xl transform transition-all align-middle"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600"
                                >
                                    <!-- Heroicon name -->
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Heinous Crimes
                                    </h3>
                                    <div class="mt-4">
                                        <div class="flex flex-row">
                                            <div class="mx-1">
                                                <label>Crime</label>
                                                <input v-model="heinous.name"
                                                       class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0 p-2">
                                            </div>
                                            <div class="mx-1">
                                                <label>Priority Level</label>
                                                <select v-model="heinous.priority"
                                                        class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                    <option value="minor">Minor</option>
                                                    <option value="major">Major</option>
                                                </select>
                                            </div>
                                            <div class="mx-1">
                                                <button @click="addHeinous"
                                                        class="h-full px-4 bg-green-400 hover:bg-green-300 p-2 rounded shadow text-white">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <table class="min-w-full divide-y divide-gray-200 mt-4">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Priority
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Action
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                <tr v-for="item in heinous_list">
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @{{ item.name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @{{ item.priority }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <button @click="deleteHeinous(item.id)"
                                                                class="bg-red-400 hover:bg-red-300 p-2 rounded shadow text-white">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <!-- More people... -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button
                                type="button"
                                @click="cases_mdl = false"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            >
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
                        cases_mdl: false,
                        heinous: {
                            name: '',
                            priority: 'minor'
                        },
                        heinous_list: []
                    };
                },
                methods: {
                    deleteHeinous(id) {
                        var $this = this;
                        axios.post('{{ route('delete.heinous') }}', {id: id}).then(function (value) {
                            $this.getHeinous();
                        });
                    },
                    getHeinous() {
                        var $this = this;
                        axios.post('{{ route('complains.heinous') }}', this.heinous).then(function (value) {
                            $this.heinous_list = value.data;
                        });
                    },
                    addHeinous() {
                        if (this.heinous.name === '')
                            return false;
                        var $this = this;
                        axios.post('{{ route('store.heinous') }}', this.heinous).then(function (value) {
                            $this.heinous = {
                                name: '',
                                priority: 'minor'
                            };
                            $this.getHeinous();
                        });
                    }
                },
                mounted() {
                    var $this = this;
                    $this.getHeinous();
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
                                data: function (value) {
                                    return '<a href="' + value.route_show + '" class="text-indigo-500 hover:text-indigo-400 hover:underline">' +
                                        value.last_name + ', ' + value.first_name + ' ' +
                                        value.middle_name + '</a>';
                                },
                                name: 'last_name',
                                title: 'OFW'
                            },
                            {
                                data: 'agencies.name',
                                name: 'agencies.name',
                                title: 'Agency'
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
                                data: function (value) {
                                    if (value.remarks)
                                        return '<a href="#" class="bg-green-500 hover:bg-green-600 p-1 rounded shadow text-white">Reviewed</a>';
                                    return '<a href="#" class="bg-red-500 hover:bg-red-600 p-1 rounded shadow text-white">Pending</a>';
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
