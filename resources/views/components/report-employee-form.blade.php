<x-guest-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-5xl pt-8 text-gray-800 leading-tight">
            Status Report
        </h3>
    </x-slot>

    <div id="app" class="py-5">
        <div class="w-full md:w-1/2 mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-1">
                        <div class="mt-5 md:mt-0 md:col-span-1">
                            <form action="{{ route('report.submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input class="hidden" name="agency_id" value="">
                                <div class="shadow overflow-hidden sm:rounded-top-md">
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
                                        <div v-if="!overview" class="grid grid-cols-6 gap-4 mt-2">
                                            <div class="col-span-6 bg-blue-50 p-1 text-center font-bold">
                                                <span class="text-3xl">Validate Details</span>
                                            </div>
                                            <div class="col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Secret
                                                    Code</label>
                                                <input type="text" name="secret_code" autocomplete="secret_code"
                                                       v-model="secret_code"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Passport
                                                    No.</label>
                                                <input type="text" name="passport" autocomplete="passport"
                                                       v-model="passport"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-2 pt-5">
                                                <button type="button" @click="validateDetails"
                                                        class="bg-green-500 hover:bg-green-600 p-2 rounded text-white w-full">
                                                    Validate
                                                </button>
                                            </div>
                                        </div>
                                        <div v-if="overview">
                                            <div class="mt-2">
                                                <div class="bg-blue-50 p-1 text-center font-bold">
                                                    <span class="text-3xl">Hi, <span class="underline">@{{ overview.last_name }}, @{{ overview.first_name }} @{{ overview.middle_name }}</span>  </span>
                                                </div>
                                                <input type="text" name="candidate_id" v-model="overview.id"
                                                       class="hidden">
                                                <input type="text" name="employer_id" v-model="overview.employer_id"
                                                       class="hidden">
                                                <input type="text" name="created_by" value="employee"
                                                       class="hidden">
                                                <div class="md:flex flex-none">
                                                    <div class="mt-2 mr-2">
                                                        <label>Salary Received?</label>
                                                        <select name="salary_received"
                                                                class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                            <option value="yes">Yes</option>
                                                            <option value="yes">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label>Salary Date</label>
                                                        <input type="date" name="salary_date"
                                                               class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <label>Comments</label>
                                                    <textarea name="comments" rows="6"
                                                              class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                    ></textarea>
                                                </div>
                                                <div class="flex mt-2">
                                                    <label
                                                        class="font-bold block p-2 text-sm font-medium text-gray-700 text-center bg-indigo-200 mt-1 focus:ring-indigo-500 rounded-md">
                                                        <i class="fas fa-upload"></i>
                                                        <input type="file" name="attachment_1"
                                                               v-on:change="attach1Upload"
                                                               class="hidden"/>
                                                    </label>
                                                    <label class="mt-3 ml-4">@{{ attach_1 }}</label>
                                                </div>

                                                <div class="flex mt-2">
                                                    <label
                                                        class="font-bold block p-2 text-sm font-medium text-gray-700 text-center bg-indigo-200 mt-1 focus:ring-indigo-500 rounded-md">
                                                        <i class="fas fa-upload"></i>
                                                        <input type="file" name="attachment_2"
                                                               v-on:change="attach2Upload"
                                                               class="hidden"/>
                                                    </label>
                                                    <label class="mt-3 ml-4">@{{ attach_2 }}</label>
                                                </div>

                                                <div class="flex mt-2">
                                                    <label
                                                        class="font-bold block p-2 text-sm font-medium text-gray-700 text-center bg-indigo-200 mt-1 focus:ring-indigo-500 rounded-md">
                                                        <i class="fas fa-upload"></i>
                                                        <input type="file" name="attachment_3"
                                                               v-on:change="attach3Upload"
                                                               class="hidden"/>
                                                    </label>
                                                    <label class="mt-3 ml-4">@{{ attach_3 }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                        Submit
                                    </button>
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
                        attach_1: 'Attachment 1',
                        attach_2: 'Attachment 2',
                        attach_3: 'Attachment 3',
                        secret_code: '',
                        passport: '',
                        overview: null,
                    }
                },
                methods: {
                    attach1Upload(e) {
                        console.log(e.target.files[0].name);
                        this.attach_1 = e.target.files[0].name
                    },
                    attach2Upload(e) {
                        console.log(e.target.files[0].name);
                        this.attach_2 = e.target.files[0].name
                    },
                    attach3Upload(e) {
                        console.log(e.target.files[0].name);
                        this.attach_3 = e.target.files[0].name
                    },
                    validateDetails() {
                        var $this = this;
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: '{{ route('report.validate') }}',
                            method: 'POST',
                            data: {
                                'secret_code': $this.secret_code,
                                'passport': $this.passport,
                            },
                            success: function (value) {
                                if (value.length === 0) {
                                    swal("Warning!", 'Not Valid, Please try again!', "warning");
                                    $this.overview = null
                                } else {
                                    swal("Success!", 'Details Are Valid', "success");
                                    $this.overview = value[0]
                                }
                            }
                        })
                    },
                    fileUpload(e) {
                        console.log(e.target.files);
                        this.file_path = e.target.files[0].name
                    }
                },
                mounted() {
                }
            });
        </script>
    </x-slot>
</x-guest-layout>
