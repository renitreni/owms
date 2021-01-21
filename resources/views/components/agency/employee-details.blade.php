<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Other Details') }}
        </h2>
    </x-slot>

    <div id="app" class="pb-12 pt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg p-5 pt-8">
                <ul class="list-reset flex border-b">
                    <li class="mr-1" v-bind:class="{'-mb-px': (tab == 1)}">
                        <span @click="tab = 1" class="cursor-pointer bg-white inline-block"
                              v-bind:class="{'border-l border-t border-r rounded-t py-2 px-4 text-blue-dark font-bold': (tab == 1), 'py-2 px-4 hover:text-blue-400 hover:bg-gray-100': (tab != 1)}">
                            Documents
                        </span>
                    </li>
                    <li class="mr-1" v-bind:class="{'-mb-px': (tab == 2)}">
                        <span @click="tab = 2" class="cursor-pointer bg-white inline-block"
                              v-bind:class="{'border-l border-t border-r rounded-t py-2 px-4 text-blue-dark font-bold': (tab == 2), 'py-2 px-4 hover:text-blue-400 hover:bg-gray-100': (tab != 2)}">
                            Flights
                        </span>
                    </li>
                </ul>
                <div v-show="tab == 1" class="border-l border-r border-b p-2">
                    <form method="POST" action="{{ route('details.document.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input name="candidate_id" value="{{ $id }}" class="hidden">
                        <div class="flex flex-col md:flex-row">
                            <div class="flex flex-col flex-grow">
                                <label>Document Name</label>
                                <select name="document"
                                        class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                    @foreach($options as $item)
                                        <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col flex-grow ml-0 md:ml-3">
                                <label>File</label>
                                <div class="flex">
                                    <label
                                        class="font-bold block p-2 text-sm font-medium text-gray-700 text-center bg-indigo-200 mt-1 focus:ring-indigo-500 rounded-md">
                                        <i class="fas fa-upload"></i>
                                        <input type="file" name="attachment" v-on:change="attachUpload"
                                               class="hidden"/>
                                    </label>
                                    <label class="mt-3 ml-4">@{{ attach }}</label>
                                </div>
                            </div>
                            <div class="flex flex-col ml-3 mt-2 md:mt-5 pt-2">
                                <button type="submit"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-5 pt-4 border-t-2">
                        <table id="tbl-documents" class="stripe hover" style="width:100%;"></table>
                    </div>
                </div>
                <div v-show="tab == 2" class="border-l border-r border-b ">
                    flight details
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
                        attach: 'Attachment',
                        overview: null,
                        tab: 1,
                    }
                },
                methods: {
                    attachUpload(e) {
                        console.log(e.target.files[0].name);
                        this.attach = e.target.files[0].name
                    },
                    deleteDoc() {
                        var $this = this;swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this imaginary file!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $.ajax({
                                        url: '{{ route('details.document.delete') }}',
                                        data: $this.overview,
                                        method: 'POST',
                                        success: function (value) {
                                            swal("Success! Your file has been deleted!", {
                                                icon: "success",
                                            });
                                            $this.dt.draw();
                                        }
                                    });
                                } else {
                                    swal("Your file is safe!");
                                }
                            });
                    }
                },
                mounted() {
                    var $this = this;
                    $this.dt = $('#tbl-documents').DataTable({
                        responsive: true,
                        serverSide: true,
                        scrollX: true,
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('details.document.table') }}',
                            type: 'POST'
                        },
                        columns: [
                            {data: 'id', name: 'id', title: 'ID'},
                            {
                                data: function (value) {
                                    return '<div class="w-full text-center">' +
                                        '<a href="/' + value.path + '" target="_blank" class="block bg-purple-400 shadow px-1 text-white hover:bg-purple-500">' +
                                        '<i class="fas fa-eye"></i>' +
                                        '</a>' +
                                        '</div>'
                                }, name: 'path', title: 'View'
                            },
                            {
                                data: function (value) {
                                    return '<div class="w-full text-center">' +
                                        value.created_at_display +
                                        '</div>'
                                }, name: 'created_at', title: 'Date Submitted'
                            },
                            {
                                data: function (value) {
                                    return '<div class="inline-grid grid-cols-2 gap-x-0 w-full text-sm shadow">\n' +
                                        '<div class="col-span-2 w-full">\n' +
                                        '<button ' +
                                        'class="w-full btn-delete bg-red-500 p-1 text-white text-center block focus:outline-none hover:bg-red-600">' +
                                        '<i class="fas fa-trash"></i>' +
                                        '</button>\n' +
                                        '</div>\n' +
                                        '</div>'
                                }, name: 'created_at', title: 'Action', bSortable: false
                            },
                        ],
                        drawCallback() {
                            $('table button').click(function (e) {
                                let data = $(this).parent().parent().parent();
                                let hold = $this.dt.row(data).data();
                                $this.overview = hold;
                            });

                            $('.btn-delete').click(function () {
                                $this.deleteDoc();
                            });
                        }
                    });
                }
            })
        </script>
    </x-slot>
</x-app-layout>
