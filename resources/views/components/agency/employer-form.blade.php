<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Add a new employer") }}
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-1">
                        <div class="mt-5 md:mt-0 md:col-span-1">
                            <form action="{{ route('employers.store') }}" method="POST">
                                @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="grid grid-cols-12 gap-2 p-4">
                                        {{--                                        Name--}}
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">{{ __("Name") }}</label>
                                            <input type="text" name="name" id="name" autocomplete="name"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        E-mail--}}
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">{{ __('E-mail') }}</label>
                                            <input type="email" name="email" autocomplete="e-mail"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        National ID--}}
                                        <div class="md:col-span-4 col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">{{ __('National ID') }}</label>
                                            <input type="text" name="national_id" autocomplete="national_id"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Contact Person--}}
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">{{ __('Contact Person') }}</label>
                                            <input type="text" name="contact_name" id="contact_name"
                                                   autocomplete="contact_name"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Phone--}}
                                        <div class="col-span-6 sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                                            <input type="text" name="phone" id="phone" autocomplete="phone"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-1 md:col-span-12"></div>
                                        {{--                                        City--}}
                                        <div class="col-span-12 md:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">{{ __('City') }}</label>
                                            <input type="text" name="city" id="city" autocomplete="city"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Address 1--}}
                                        <div class="col-span-12">
                                            <label for="email_address"
                                                   class="block text-sm font-medium text-gray-700">{{ __('Address 1') }}</label>
                                            <input type="text" name="address_line_1" id="address_line_1"
                                                   autocomplete="address_line_1"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Address 2--}}
                                        <div class="col-span-12">
                                            <label class="block text-sm font-medium text-gray-700">{{ __('Address 2') }}</label>
                                            <input type="text" name="address_line_2" id="address_line_2"
                                                   autocomplete="address_line_2"
                                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        {{--                                        Status--}}
                                        <div class="col-span-6 md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                                            <select id="status" name="status" autocomplete="status"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="active">{{ __('Active') }}</option>
                                                <option value="not active">{{ __('Not Active') }}</option>
                                            </select>
                                        </div>
                                        {{--                                        Business Type--}}
                                        <div class="col-span-6 md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700">{{ __('Business Type') }}</label>
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
                                                {{ __('Save') }}
                                            </button>
                                            <a href="{{ route('employers') }}"  class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Cancel') }}
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
