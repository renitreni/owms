<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New User Form') }}
        </h2>
    </x-slot>

    <div id="app" class="py-12">
        <div class="w-full sm:w-3/4 mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-1">
                        <div class="mt-5 md:mt-0 md:col-span-1">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="grid grid-cols-12 gap-2 p-4">
{{--                                        Name--}}
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" name="name" id="name" autocomplete="name"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
{{--                                        E-mail--}}
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">E-mail</label>
                                            <input type="email" name="email" autocomplete="e-mail"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
{{--                                        National ID--}}
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">National ID</label>
                                            <input type="text" name="national_id" autocomplete="national_id"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
{{--                                        Roles--}}
                                        <div class="md:col-span-3 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">Roles</label>
                                            <select id="role" name="role" autocomplete="role"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="1">Admin</option>
                                                <option value="2">Agency</option>
                                                <option value="3">Employer</option>
                                                <option value="4">Government</option>
                                            </select>
                                        </div>
{{--                                        Tin--}}
                                        <div class="col-span-12 md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Tin</label>
                                            <input type="text" name="tin" id="tin" autocomplete="tin"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-12 md:col-span-4"></div>
{{--                                        Contact Person--}}
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Contact
                                                Person</label>
                                            <input type="text" name="contact_name" id="contact_name"
                                                   autocomplete="contact_name"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
{{--                                        Phone--}}
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                                            <input type="text" name="phone" id="phone" autocomplete="phone"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
{{--                                        Fax--}}
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Fax</label>
                                            <input type="text" name="fax" id="fax" autocomplete="fax"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-1 md:col-span-12"></div>
                                        {{--                                        City--}}
                                        <div class="col-span-12 md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">City</label>
                                            <input type="text" name="city" id="city" autocomplete="city"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Zip Code--}}
                                        <div class="col-span-12 md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">Zip Code</label>
                                            <input type="text" name="zip_code" id="zip_code" autocomplete="zip_code"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
{{--                                        Address 1--}}
                                        <div class="col-span-12">
                                            <label for="email_address"
                                                   class="block text-sm font-medium text-gray-700">Address 1</label>
                                            <input type="text" name="address_line_1" id="address_line_1"
                                                   autocomplete="address_line_1"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
{{--                                        Address 2--}}
                                        <div class="col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">Address 2</label>
                                            <input type="text" name="address_line_2" id="address_line_2"
                                                   autocomplete="address_line_2"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
{{--                                        Status--}}
                                        <div class="col-span-6 md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Status</label>
                                            <select id="status" name="status" autocomplete="status"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="active">Active</option>
                                                <option value="not active">Not Active</option>
                                            </select>
                                        </div>
{{--                                        Business Type--}}
                                        <div class="col-span-6 md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">Business Type</label>
                                            <input type="text" name="type" id="type" autocomplete="type"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
{{--                                        ===========================--}}
                                        <div class="col-span-12">
                                            @if ($errors->any())
                                                <div class="bg-red-100 p-2 rounded">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="shadow overflow-hidden">
                                        <div class="bg-gray-50 text-right pr-3 py-3">
                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                                Save
                                            </button>
                                            <a href="#" onclick="window.history.back()"  class="inline-flex justify-center py-2 px-4 border
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
    </x-slot>
</x-app-layout>
