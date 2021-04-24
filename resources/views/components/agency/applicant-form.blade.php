<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-6xl text-gray-800 leading-tight">
            Application Form
        </h2>
        <h4 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __($agency_name) }}
        </h4>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="w-full sm:w-11/12 mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-1">
                        <div class="mt-5 md:mt-0 md:col-span-1">
                            <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input class="hidden" name="agency_id" value="{{ $agency_id }}">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6 mb-2">
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
                                        <div class="grid grid-cols-6 gap-4">
                                           @include('components.agency.partials.candidate-form')
                                            <div class="col-span-6 content-center">
                                                <div class="flex px-0 lg:px-56">
                                                    <div class="pr-3">
                                                        <input type="checkbox" name="agreed" value="yes">
                                                    </div>
                                                    <div>
                                                        <p>
                                                            I hereby certify that the above statements are true and correct to the best of my
                                                            knowledge. I understand that a false statement may disqualify me for benefits.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                            Submit Application
                                        </button>
                                        <a href="#" onclick="window.history.back()"  class="inline-flex justify-center py-2 px-4 border
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
</x-guest-layout>
