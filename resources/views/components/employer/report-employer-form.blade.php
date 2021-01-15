<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Status Report') }}
        </h2>
        <h2 class="mt-1">
            Employee <strong>{{ $candidate->last_name }}, {{ $candidate->first_name }} {{ $candidate->middle_name }}</strong>
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="w-full md:w-4/12 mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-1">
                        <div class="mt-5 md:mt-0 md:col-span-1">
                            <form action="{{ route('report.submit') }}" method="POST">
                                @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="grid grid-cols-6 gap-2 p-4">
                                        <input name="candidate_id" value="{{ $candidate->id }}" class="hidden">
                                        <input name="employer_id" value="{{ auth()->id() }}" class="hidden">
                                        <input name="created_by" value="employer" class="hidden">
                                        {{-- Concern--}}
                                        <div class="col-span-6">
                                            <label
                                                   class="block text-sm font-medium text-gray-700">
                                                Concerns
                                            </label>
                                            <textarea name="concerns" rows="15"
                                                      autocomplete="concerns"
                                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            ></textarea>
                                        </div>
                                        <div class="col-span-6">
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
                                                Submit
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
