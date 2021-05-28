<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Edit Applicant Form
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="w-full sm:w-11/12 mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-1">
                        <div class="mt-5 md:mt-0 md:col-span-1">
                            <form action="{{ route('candidate.update', ['id' => $results->id]) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <input class="hidden" name="agency_id" value="{{ $results->agency_id }}">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6 mb-1">
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
                                            <div class="col-span-6 bg-blue-50 p-1">
                                                <span class="text-3xl">{{ __('Details for Export Form') }}</span>
                                            </div>
                                            <div class="col-span-3 p-1">
                                                <label>Remarks</label>
                                                <textarea type="text" name="remarks" rows="5"
                                                          class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block
                                                          w-full h-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                >{{ $results->remarks ?? null }}</textarea>
                                            </div>
                                            <div class="col-span-3 p-1 d-flex">
                                                <label>Skills</label>
                                                <div class="flex flex-wrap">
                                                    @foreach($skills as $item)
                                                        <div class="flex flex-col mr-4 w-48 mt-2">
                                                            <label class="font-bold"><i
                                                                    class="fas fa-check text-green-400"></i> {{ $item->name }}
                                                            </label>
                                                            <select name="skills_other[{{ $item->name }}]" class="mt-1 focus:ring-indigo-500
                                                            focus:border-indigo-500 block shadow-sm sm:text-sm
                                                            border-gray-300 rounded-md">
                                                                @if($results->skills_other == null)
                                                                    <option value="yes" selected>Yes</option>
                                                                    <option value="no">No</option>
                                                                @else
                                                                    <option value="yes"
                                                                            @if(collect(json_decode($results->skills_other))->toArray()["$item->name"] == 'yes') selected @endif>
                                                                        Yes
                                                                    </option>
                                                                    <option value="no"
                                                                            @if(collect(json_decode($results->skills_other))->toArray()["$item->name"] == 'no') selected @endif>
                                                                        No
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                            Update
                                        </button>
                                        <a href="{{ route('candidate.applicant') }}" class="inline-flex justify-center py-2 px-4 border
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
</x-app-layout>
