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
                                            <div class="col-span-6 bg-blue-50 p-1">
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
                                                        class="bg-green-300 hover:bg-green-400 p-2 rounded text-white w-full">
                                                    Validate
                                                </button>
                                            </div>
                                            <div class="col-span-6 grid grid-cols-6 gap-4" v-if="overview">
                                                <div class="col-span-6 bg-blue-50 p-1">
                                                    <span class="text-3xl">Hi, @{{ overview.last_name }}, @{{ overview.first_name }} @{{ overview.middle_name }} </span>
                                                </div>
                                                <input name="candidate_id" v-model="overview.id" class="hidden">
                                                <input name="employer_id" v-model="overview.employer.user_id" class="hidden">
                                                <input name="created_by" value="employee" class="hidden">
                                                <div class="col-span-6 p-1">
                                                    <label class="block text-sm font-medium text-gray-700">Concerns</label>
                                                    <textarea type="text" name="concerns" autocomplete="concerns" rows="10"
                                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                    ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border
                                        border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                        bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                                        focus:ring-offset-2 focus:ring-indigo-500">
                                            Save
                                        </button>
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
                        file_path: '',
                        secret_code: '',
                        passport: '',
                        overview: null,
                    }
                },
                methods: {
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
                                    swal("Warning!", 'Not Valid Details', "warning");
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
