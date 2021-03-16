<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <form method="POST" enctype="multipart/form-data">
        <div id="app" class="pb-12 pt-8">
            <div class="w-100 mx-auto px-10">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="mt-10 sm:mt-0 p-3">
                        <div class="flex flex-col">
                            <div class="flex">
                                <label class="text-3xl font-bold">Logo Upload</label>
                            </div>
                            <div class="flex">
                                <div class="flex flex-grow flex-col">
                                    <label
                                        class="block text-sm font-medium text-gray-700">{{ __('Upload System Logo') }}
                                        (PNG only)</label>
                                    <label class="block text-sm font-medium text-gray-700"><i>{{ __('Path') }}:</i>
                                        <strong>@{{ file_path }}</strong></label>
                                    <div
                                        class="p-2 w-1/2 bg-red-200 mt-1 focus:ring-indigo-500 rounded-md h-25">
                                        <label class="block text-sm font-medium text-gray-700 text-center">
                                            {{ __('Choose Image') }}
                                            <input type="file" id="image" name="image" v-on:change="fileUpload"
                                                   class="hidden"/>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="button" v-on:click="save" class="inline-flex justify-center py-2 px-4 border
                                            border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                            bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                                            focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Save') }}
                        </button>
                        <a href="{{ route('candidate.applicant') }}" class="inline-flex justify-center py-2 px-4 border
                                            border-transparent shadow-sm text-sm font-medium rounded-md text-white
                                            bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2
                                            focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <x-slot name="scripts">
        <script>
            const e = new Vue({
                el: '#app',
                data() {
                    return {
                        file_path: '',
                        file: '',
                        errors: null
                    }
                },
                methods: {
                    fileUpload(e) {
                        console.log(e.target.files);
                        this.file_path = e.target.files[0].name;
                        this.file = e.target.files[0];
                    },
                    save() {
                        var frm = new FormData();
                        frm.append('image', this.file);
                        axios.post('{{ route('settings.submit') }}', frm, {
                            headers: {'Content-Type': 'multipart/form-data'}
                        }).then(function () {
                            swal('Success!', 'Upload Successful!', 'success')
                                .then((value) => {
                                    window.location.reload();
                                })
                                .catch(function (value) {
                                    $this.errors = value.response.data.errors;
                                    swal('Error!', 'Request Invalid!', 'error')
                                });
                        });
                    }
                }
            });
        </script>
    </x-slot>
</x-app-layout>
