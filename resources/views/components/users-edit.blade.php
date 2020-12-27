<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div id="app" class="py-12">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-1">
                        <div class="mt-5 md:mt-0 md:col-span-1">
                            <form action="{{ route('users.update',['id' => $user->id]) }}" method="POST">
                                @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6">
                                                <label for="first_name" class="block text-sm font-medium text-gray-700">Name</label>
                                                <input type="text" name="name" id="name" autocomplete="name"
                                                       value="{{ $user->name }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6">
                                                <label for="last_name" class="block text-sm font-medium text-gray-700">E-mail</label>
                                                <input type="email" name="email" id="email" autocomplete="e-mail"
                                                       value="{{ $user->email }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            @if(auth()->user()->role == 1)
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="country"
                                                           class="block text-sm font-medium text-gray-700">Roles</label>
                                                    <select id="role" name="role" autocomplete="role"
                                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option value="1" @if($user->role == 1) selected @endif>Admin
                                                        </option>
                                                        <option value="2" @if($user->role == 2) selected @endif>User
                                                        </option>
                                                    </select>
                                                </div>
                                            @endif
                                            <div class="col-span-6">
                                                <label for="email_address"
                                                       class="block text-sm font-medium text-gray-700">Reset
                                                    Password</label>
                                                <a href="{{ route('users.resetpass',['id' => $user->id]) }}" class="mt-1 inline-flex justify-center py-2 px-4 border
                                                    border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                                    bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2
                                                    focus:ring-offset-2 focus:ring-indigo-500">
                                                    Reset Now
                                                </a>
                                            </div>

                                            <div class="col-span-6">
                                            </div>
                                            <div class="col-span-3">
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
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <a href="{{ route('users.delete',['id' => $user->id]) }}" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                            Delete
                                        </a>
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                            Update
                                        </button>
                                        <a href="{{ route('users') }}" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                            Cancel
                                        </a>
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
