<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New User Form') }}
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="w-full sm:w-3/4 mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-1">
                        <div class="mt-5 md:mt-0 md:col-span-1">
                            <form>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="grid grid-cols-12 gap-2 p-4">
                                        {{--                                        Roles--}}
                                        <div class="md:col-span-3 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">Roles</label>
                                            <select id="role" name="role" autocomplete="role" v-model="overview.role"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="1">Admin</option>
                                                <option value="2">Agency</option>
                                                <option value="4">Government</option>
                                            </select>
                                        </div>
                                        {{--                                        Roles--}}
                                        <div class="md:col-span-4 col-span-12" v-if="overview.role == 2">
                                            <label class="block text-sm font-medium text-gray-700">Agency</label>
                                            <select id="role" name="role" autocomplete="role" v-model="overview.agency_id"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                @foreach($agencies as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{--                                        E-mail--}}
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">E-mail</label>
                                            <input type="email" name="email" autocomplete="email"
                                                   v-model="overview.email"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Name--}}
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" name="name" id="name" autocomplete="name"
                                                   v-model="overview.name"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        POEA NO--}}
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">POEA NO</label>
                                            <input type="text" name="national_id" autocomplete="national_id"
                                                   v-model="overview.poea"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        National ID--}}
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">National ID</label>
                                            <input type="text" name="national_id" autocomplete="national_id"
                                                   v-model="overview.national_id"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Contact Person--}}
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Contact
                                                Person</label>
                                            <input type="text" name="contact_name" id="contact_name"
                                                   autocomplete="contact_name" v-model="overview.contact_name"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Phone--}}
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                                            <input type="text" name="phone" id="phone" autocomplete="phone"
                                                   v-model="overview.phone"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Fax--}}
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Fax</label>
                                            <input type="text" name="fax" id="fax" autocomplete="fax"
                                                   v-model="overview.fax"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-1 md:col-span-12"></div>
                                        {{--                                        City--}}
                                        <div class="col-span-12 md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">City</label>
                                            <input type="text" name="city" id="city" autocomplete="city"
                                                   v-model="overview.city"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Zip Code--}}
                                        <div class="col-span-12 md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Zip Code</label>
                                            <input type="text" name="zip_code" id="zip_code" autocomplete="zip_code"
                                                   v-model="overview.zip_code"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Address 1--}}
                                        <div class="col-span-12">
                                            <label for="email_address"
                                                   class="block text-sm font-medium text-gray-700">Address 1</label>
                                            <input type="text" name="address_line_1" id="address_line_1"
                                                   autocomplete="address_line_1" v-model="overview.address_line_1"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Address 2--}}
                                        <div class="col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">Address 2</label>
                                            <input type="text" name="address_line_2" id="address_line_2"
                                                   autocomplete="address_line_2" v-model="overview.address_line_2"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Status--}}
                                        <div class="col-span-6 md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Status</label>
                                            <select id="status" name="status" autocomplete="status"
                                                    v-model="overview.status"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="active">Active</option>
                                                <option value="not active">Not Active</option>
                                            </select>
                                        </div>
                                        {{--                                        Business Type--}}
                                        <div class="col-span-6 md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Business Type</label>
                                            <input type="text" name="type" id="type" autocomplete="type"
                                                   v-model="overview.type"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        ===========================--}}
                                        <div class="col-span-12" v-if="errors">
                                            <div class="bg-red-100 p-2 rounded">
                                                <ul v-for="item in errors">
                                                    <li>@{{ item[0] }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shadow overflow-hidden">
                                        <div class="bg-gray-50 text-right pr-3 py-3">
                                            @if(isset($user))
                                            <a href="{{ route('users.resetpass', ['id' => $user->id]) }}" class="mt-1 inline-flex justify-center py-2 px-4 border
                                                    border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                                    bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2
                                                    focus:ring-offset-2 focus:ring-indigo-500">
                                                Reset Pass
                                            </a>
                                            <a href="{{ route('users.delete', ['id' => $user->id]) }}" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                                Delete
                                            </a>
                                            <button type="button" v-on:click="update" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                                Update
                                            </button>
                                            @else
                                            <button type="button" v-on:click="save" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                                Save
                                            </button>
                                            @endif
                                            <a href="{{ route('users') }}" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            const e = new Vue({
                el: '#app',
                data: {
                    @if(isset($user))
                        overview: {!! $user !!},
                    @else
                        overview: {
                            name: '',
                            email: '',
                            national_id: '',
                            role: '1',
                            tin: 'N/A',
                            contact_name: '',
                            phone: '',
                            fax: '',
                            city: '',
                            zip_code: '',
                            address_line_1: '',
                            address_line_2: '',
                            status: '',
                            type: '',
                        },
                    @endif
                    errors: null
                },
                methods: {
                    save() {
                        var $this = this;
                        axios.post("{{ route('users.store') }}", this.overview)
                            .then(function () {
                                swal('Success!', 'New User Registered!', 'success')
                                    .then((value) => {
                                        window.location.reload();
                                    });
                            })
                            .catch(function (value) {
                                $this.errors = value.response.data.errors;
                                swal('Error!', 'Request Invalid!', 'error')
                            });
                    },
                    update(){
                        var $this = this;
                        axios.post("{{ route('users.update') }}", this.overview)
                            .then(function () {
                                swal('Success!', 'User has been updated!', 'success')
                                    .then((value) => {
                                        window.location.reload();
                                    });
                            })
                            .catch(function (value) {
                                $this.errors = value.response.data.errors;
                                swal('Error!', 'Request Invalid!', 'error')
                            });
                    }
                },
                mounted() {

                }
            });
        </script>
    </x-slot>
</x-app-layout>
