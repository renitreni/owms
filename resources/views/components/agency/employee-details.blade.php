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
                    @include('components.agency.partials.tab-documents')
                </div>
                <div v-show="tab == 2" class="border-l border-r border-b p-2">
                    @include('components.agency.partials.tab-flights')
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
                        dt_docs: null,
                        dt_flights: null,
                        flight_overview: false
                    }
                },
                watch: {
                    'tab': function (value) {
                        if (value == 1)
                            this.dt_docs.draw();
                        else
                            this.dt_flights.draw();
                    }
                },
                methods: {
                    attachUpload(e) {
                        console.log(e.target.files[0].name);
                        this.attach = e.target.files[0].name
                    },
                    deleteFlight() {
                        var $this = this;
                        swal({
                            title: "Are you sure?",
                            text: "You will not be able to recover this data file!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $.ajax({
                                        url: '{{ route('details.flight.delete') }}',
                                        data: $this.overview,
                                        method: 'POST',
                                        success: function (value) {
                                            swal("Success! Your file has been deleted!", {
                                                icon: "success",
                                            });
                                            $this.dt_docs.draw();
                                        }
                                    });
                                } else {
                                    swal("Your file is safe!");
                                }
                            });
                    },
                    deleteDoc() {
                        var $this = this;
                        swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this data file!",
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
                                            $this.dt_docs.draw();
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
                    $this.dt_docs = $('#tbl-documents').DataTable({
                        responsive: true,
                        serverSide: true,
                        scrollX: true,
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('details.document.table') }}',
                            type: 'POST',
                            data: {candidate_id: '{{$id}}'}
                        },
                        columns: [
                            {data: 'id', name: 'id', title: 'ID'},
                            {
                                data: function (value) {
                                    return '<div class="w-full text-center">' +
                                        value.doc.name +
                                        '</div>'
                                }, name: 'doc.name', title: 'Document'
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
                                    return '<div class="inline-grid grid-cols-4 gap-x-0 w-full text-sm shadow">\n' +
                                        '<div class="col-span-2 w-full">\n' +
                                        '<button ' +
                                        'class="w-full btn-delete bg-red-500 p-1 text-white text-center block focus:outline-none hover:bg-red-600">' +
                                        '<i class="fas fa-trash"></i>' +
                                        '</button>\n' +
                                        '</div>\n' +
                                        '<div class="col-span-2 w-full text-center h-full">\n' +
                                        '<a href="/' + value.path + '" target="_blank" class="h-full pt-1 block bg-purple-400 shadow px-1 text-white hover:bg-purple-500">' +
                                        '<i class="fas fa-eye"></i>' +
                                        '</a>' +
                                        '</div>\n' +
                                        '</div>'
                                }, name: 'created_at', title: 'Action', bSortable: false
                            },
                        ],
                        drawCallback() {
                            $('#tbl-documents button').click(function (e) {
                                let data = $(this).parent().parent().parent();
                                let hold = $this.dt_docs.row(data).data();
                                $this.overview = hold;
                            });

                            $('.btn-delete').click(function () {
                                $this.deleteDoc();
                            });
                        }
                    });
                    $this.dt_flights = $('#tbl-flights').DataTable({
                        responsive: true,
                        serverSide: true,
                        scrollX: true,
                        width: '100%',
                        order: [[0, "desc"]],
                        ajax: {
                            url: '{{ route('details.flight.table') }}',
                            type: 'POST',
                            data: {candidate_id: '{{$id}}'}
                        },
                        columns: [
                            {data: 'id', name: 'id', title: 'ID'},
                            {data: 'contact_person', name: 'contact_person', title: 'Contact Person'},
                            {data: 'contact_number', name: 'contact_number', title: 'Contact Number'},
                            {
                                data: function (value) {
                                    return '<div class="inline-grid grid-cols-2 gap-x-0 w-full text-sm shadow">\n' +
                                        '<div class="col-span-1 w-full">\n' +
                                        '<button ' +
                                        'class="w-full btn-delete-flight bg-red-500 p-1 text-white text-center block focus:outline-none hover:bg-red-600">' +
                                        '<i class="fas fa-trash"></i>' +
                                        '</button>\n' +
                                        '</div>\n' +
                                        '<div class="col-span-1 w-full">\n' +
                                        '<button ' +
                                        'class="w-full btn-view-flight bg-indigo-400 p-1 text-white text-center block focus:outline-none hover:bg-indigo-500">' +
                                        '<i class="fas fa-eye"></i>' +
                                        '</button>\n' +
                                        '</div>\n' +
                                        '</div>'
                                }, name: 'created_at', title: 'Action', bSortable: false
                            },
                        ],
                        drawCallback() {
                            $('#tbl-flights button').click(function (e) {
                                let data = $(this).parent().parent().parent();
                                let hold = $this.dt_flights.row(data).data();
                                $this.overview = hold;
                            });

                            $('.btn-delete-flight').click(function () {
                                $this.deleteFlight();
                            });

                            $('.btn-view-flight').click(function () {
                                $this.flight_overview = true
                            });
                        }
                    });
                }
            })
        </script>
    </x-slot>
</x-app-layout>
