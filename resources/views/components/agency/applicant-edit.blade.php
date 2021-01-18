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
                                <input class="hidden" name="agency_id" value="{{ auth()->id() }}">
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
                                            <div class="col-span-6 bg-blue-50 p-1">
                                                <span class="text-3xl">Preferred Positions</span>
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Position
                                                    1</label>
                                                <input type="text" name="position_1" autocomplete="position_1"
                                                       value="{{ $results->position_1 }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Position
                                                    2</label>
                                                <input type="text" name="position_2" autocomplete="position_2"
                                                       value="{{ $results->position_2 }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Position
                                                    3</label>
                                                <input type="text" name="position_3" autocomplete="position_3"
                                                       value="{{ $results->position_3 }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 bg-blue-50 p-1">
                                                <span class="text-3xl">General Information</span>
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">First
                                                    Name</label>
                                                <input type="text" name="first_name" autocomplete="first_name"
                                                       value="{{ $results->first_name }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Middle
                                                    Name</label>
                                                <input type="text" name="middle_name"
                                                       value="{{ $results->middle_name }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                                <input type="text" name="last_name" value="{{ $results->last_name }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label class="block text-sm font-medium text-gray-700">Passport</label>
                                                <input type="text" name="passport" value="{{ $results->passport }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label class="block text-sm font-medium text-gray-700">IQAMA</label>
                                                <input type="text" name="iqama" value="{{ $results->iqama }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-1">
                                                <label class="block text-sm font-medium text-gray-700">Birth
                                                    Date</label>
                                                <input type="date" name="birth_date"
                                                       value="{{ \Carbon\Carbon::parse($results->birth_date)->format('Y-m-d') }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-1">
                                                <label class="block text-sm font-medium text-gray-700">Gender</label>
                                                <select name="gender"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    <option value="male"
                                                            @if($results->gender == 'male') selected @endif>Male
                                                    </option>
                                                    <option value="female"
                                                            @if($results->gender == 'female') selected @endif>Female
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-span-6 sm:col-span-1">
                                                <label class="block text-sm font-medium text-gray-700">Civil
                                                    Status</label>
                                                <select name="civil_status"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    <option value="single"
                                                            @if($results->civil_status == 'male') selected @endif>Single
                                                    </option>
                                                    <option value="married"
                                                            @if($results->civil_status == 'married') selected @endif>
                                                        Married
                                                    </option>
                                                    <option value="widowed"
                                                            @if($results->civil_status == 'widowed') selected @endif>
                                                        Widowed
                                                    </option>
                                                    <option value="separated"
                                                            @if($results->civil_status == 'separated') selected @endif>
                                                        Separated
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Spouse Name(If
                                                    Married)</label>
                                                <input type="text" name="spouse" value="{{ $results->spouse }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-1">
                                            </div>
                                            <div class="col-span-3 sm:col-span-1">
                                                <label class="block text-sm font-medium text-gray-700">Blood
                                                    Type</label>
                                                <input type="text" name="blood_type" value="{{ $results->blood_type }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-1">
                                                <label
                                                    class="block text-sm font-medium text-gray-700">Height(cm.)</label>
                                                <input type="text" name="height" value="{{ $results->height }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-1">
                                                <label
                                                    class="block text-sm font-medium text-gray-700">Weight(Kg.)</label>
                                                <input type="text" name="weight" value="{{ $results->weight }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Religion</label>
                                                <input type="text" name="religion" value="{{ $results->religion }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Language</label>
                                                <input type="text" name="language" value="{{ $results->language }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Education</label>
                                                <input type="text" name="language" value="{{ $results->education }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Mother's Maiden
                                                    Name</label>
                                                <input type="text" name="mother_name"
                                                       value="{{ $results->mother_name }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Father's
                                                    Name</label>
                                                <input type="text" name="father_name"
                                                       value="{{ $results->father_name }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 bg-blue-50 p-1">
                                                <span class="text-3xl">Contact Information</span>
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">E-mail</label>
                                                <input type="text" name="email" value="{{ $results->email }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Contact 1</label>
                                                <input type="text" name="contact_1" value="{{ $results->contact_1 }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Contact 2</label>
                                                <input type="text" name="contact_2" value="{{ $results->contact_2 }}"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-1">
                                                <label class="block text-sm font-medium text-gray-700">Applied From</label>
                                                <select name="applied_using"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    <option value="online"  @if($results->applied_using == 'online')selected @endif>Online</option>
                                                    <option value="walk-in" @if($results->applied_using == 'walk-in')selected @endif>Walk-in</option>
                                                    <option value="agent"   @if($results->applied_using == 'agent')selected @endif>Agent</option>
                                                </select>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <label class="block text-sm font-medium text-gray-700">Address</label>
                                                <textarea type="text" name="address" rows="3"
                                                          class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                >{{ $results->address }}</textarea>
                                            </div>
                                            <div class="col-span-6 bg-blue-50 p-1">
                                                <span class="text-3xl">Documents</span>
                                            </div>
                                            <div class="col-span-6 sm:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Upload Resume/CV(docs,pdf)
                                                    @if(isset($doc[0]))
                                                        <a target="_blank" href="/{{ $doc[0]->path }}"
                                                           class="p-2 w-1/2 text-blue-600 hover:underline mt-1 rounded-md h-25">
                                                            View Doc</a>
                                                    @endif
                                                </label>
                                                <label class="block text-sm font-medium text-gray-700"><i>Path:</i>
                                                    <strong>@{{ file_path }}</strong></label>
                                                <div
                                                    class="p-2 w-1/2 bg-red-300 mt-1 rounded-md h-25">
                                                    <label class="block text-sm font-medium text-gray-700 text-center">
                                                        Choose a File
                                                        <input type="file" name="cv" v-on:change="fileUpload"
                                                               class="hidden"/>
                                                    </label>
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
                                        <a href="#" onclick="window.history.back()" class="inline-flex justify-center py-2 px-4 border
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
        <script>
            const e = new Vue({
                el: '#app',
                data() {
                    return {
                        file_path: ''
                    }
                },
                methods: {
                    fileUpload(e) {
                        console.log(e.target.files)
                        this.file_path = e.target.files[0].name
                    }
                }
            });
        </script>
    </x-slot>
</x-app-layout>
