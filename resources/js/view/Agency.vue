<template>
    <div class="pb-12 pt-8">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 mt-5">
                    <a
                        href="#"
                        @click="showMdl"
                        class="text-white bg-green-400 hover:bg-green-500 p-2 rounded m-2 shadow"
                    >
                        <i class="fas fa-building"></i> {{ __('New Agency') }}

                    </a>
                    <a
                        href="#"
                        @click="showLevelMdl"
                        class="text-white bg-indigo-500 hover:bg-indigo-600 p-2 rounded m-2 shadow"
                    >
                        <i class="fas fa-exclamation-triangle"></i> {{ __('Alert Levels') }}
                    </a>
                </div>
                <div class="p-5">
                    <table
                        id="vouchers-table"
                        class="stripe hover"
                        style="width: 100%"
                    ></table>
                </div>
            </div>
        </div>
        <!--    New Agency-->
        <transition name="slide-fade">
            <!-- Agency add -->
            <div class="fixed inset-0 overflow-y-auto" v-if="agency_mdl">
                <div
                    class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                >
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span
                        class="hidden sm:inline-block sm:align-middle sm:h-screen"
                        aria-hidden="true"
                    >&#8203;</span
                    >
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600"
                                >
                                    <!-- Heroicon name -->
                                    <i class="fas fa-building"></i>
                                </div>
                                <div
                                    class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                                >
                                    <h3
                                        class="text-lg leading-6 font-medium text-gray-900"
                                        id="modal-headline"
                                    >
                                        New Agency
                                        <span class="underline"></span>
                                        <input class="hidden" name="id"/>
                                    </h3>
                                    <div class="mt-6">
                                        <div class="flex flex-col">
                                            <div class="mt-2">
                                                <label>Name</label>
                                                <input
                                                    type="text"
                                                    v-model="overview.name"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                />
                                            </div>
                                            <div class="mt-2">
                                                <label>Address</label>
                                                <input
                                                    type="text"
                                                    v-model="overview.address"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                />
                                            </div>
                                            <div class="mt-2">
                                                <label>POEA No.</label>
                                                <input
                                                    type="text"
                                                    v-model="overview.poea"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                />
                                            </div>
                                            <div class="mt-2">
                                                <label>Status</label>
                                                <select
                                                    v-model="overview.status"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                    <option value="active">Active</option>
                                                    <option value="not active">Not Active</option>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <label>Logo</label>
                                                <input
                                                    type="file"
                                                    v-on:change="fileUpload"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                        >
                            <button
                                type="submit"
                                @click="add()"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Add
                            </button>
                            <button
                                type="button"
                                @click="agency_mdl = false"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        <!--    Update Agency-->
        <transition name="slide-fade">
            <!-- Agency add -->
            <div class="fixed inset-0 overflow-auto" v-if="agency_update_mdl">
                <div
                    class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                >
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span
                        class="hidden sm:inline-block sm:align-middle sm:h-screen"
                        aria-hidden="true"
                    >&#8203;</span
                    >
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600"
                                >
                                    <!-- Heroicon name -->
                                    <i class="fas fa-building"></i>
                                </div>
                                <div
                                    class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                                >
                                    <h3
                                        class="text-lg leading-6 font-medium text-gray-900"
                                    >
                                        Update Agency
                                        <span class="underline"></span>
                                        <input class="hidden" name="id"/>
                                    </h3>
                                    <div class="mt-6">
                                        <div class="flex flex-col">
                                            <div class="mt-2">
                                                <label>Name</label>
                                                <input
                                                    type="text"
                                                    v-model="overview.name"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                />
                                            </div>
                                            <div class="mt-2">
                                                <label>Address</label>
                                                <input
                                                    type="text"
                                                    v-model="overview.address"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                />
                                            </div>
                                            <div class="mt-2">
                                                <label>POEA No.</label>
                                                <input
                                                    type="text"
                                                    v-model="overview.poea"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                />
                                            </div>
                                            <div class="mt-2">
                                                <label>Status</label>
                                                <select
                                                    v-model="overview.status"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                    <option value="active">Active</option>
                                                    <option value="not active">Not Active</option>
                                                    <option value="Maltreated">Maltreated</option>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <label>Alert Levels</label>
                                                <select
                                                    v-model="overview.level"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                    <option value="">-- No Alert --</option>
                                                    <option v-for="item in alert_list" v-bind:value="item.id">{{
                                                        item.name }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <img v-bind:src="overview.logo_path" class="h-36">
                                            </div>
                                            <div class="mt-2">
                                                <label>Logo</label>
                                                <input
                                                    type="file"
                                                    v-on:change="fileUpload"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                        >
                            <button
                                type="submit"
                                @click="update"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Update
                            </button>
                            <button
                                type="submit"
                                @click="deletion"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Delete
                            </button>
                            <button
                                type="button"
                                @click="agency_update_mdl = false"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
        <!--    Level Modal-->
        <transition name="slide-fade">
            <!-- Agency add -->
            <div class="fixed inset-0 overflow-auto" v-if="level_mdl">
                <div
                    class="flex items-end justify-center min-h-screen px-4 pb-20 text-center sm:block sm:p-0"
                >
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span
                        class="hidden sm:inline-block sm:align-middle sm:h-screen"
                        aria-hidden="true"
                    >&#8203;</span
                    >
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600"
                                >
                                    <!-- Heroicon name -->
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div
                                    class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                                >
                                    <h3
                                        class="text-lg leading-6 font-medium text-gray-900"
                                    >
                                        Alert Levels
                                    </h3>
                                    <div class="mt-4">
                                        <div class="bg-white">
                                            <nav class="flex flex-col sm:flex-row">
                                                <button @click="tab = 1"
                                                        class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none"
                                                        v-bind:class="{'text-blue-500 border-b-2 font-medium border-blue-500': (tab === 1)}">
                                                    Levels
                                                </button>
                                                <button @click="tab = 2"
                                                        class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none"
                                                        v-bind:class="{'text-blue-500 border-b-2 font-medium border-blue-500': (tab === 2)}">
                                                    Add Level
                                                </button>
                                            </nav>
                                        </div>
                                        <div class="flex flex-col mt-2 overflow-scroll h-75" v-if="tab === 1">
                                            <div v-for="item in alert_list" class="flex flex-col border p-2 mb-2">
                                                <label v-bind:style="'color:' + item.color_level"
                                                       class="font-bold text-2xl">
                                                    <button
                                                        type="button"
                                                        @click="showDeleteMdl(item.id)"
                                                        class="p-2 text-sm text-white bg-red-500 hover:bg-red-600 rounded-sm"
                                                    >
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <button
                                                        type="button"
                                                        @click="showEdit(item)"
                                                        class="p-2 text-sm text-white bg-indigo-500 hover:bg-indigo-600 rounded-sm"
                                                    >
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    {{ item.name }}
                                                </label>
                                                <p class="m-2">{{ item.description }}</p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col" v-if="tab === 2">
                                            <div class="mt-2">
                                                <label>Color</label>
                                                <div class="flex flex-row">
                                                    <input type="text" id="colorPicker" v-model="alert_form.color_level"
                                                           class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0">
                                                    <i class="fa fa-circle my-auto ml-2"
                                                       v-bind:style="'color:' + alert_form.color_level"></i>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <label>Name</label><input
                                                type="text"
                                                v-model="alert_form.name"
                                                class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                            />
                                            </div>
                                            <div class="mt-2">
                                                <label>Description</label>
                                                <textarea
                                                    type="text"
                                                    v-model="alert_form.description"
                                                    class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                                                ></textarea>
                                            </div>
                                            <div class="mt-4">
                                                <button
                                                    type="submit"
                                                    @click="saveNewAlert"
                                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                >
                                                    Save New Alert
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                        >
                            <button
                                type="button"
                                @click="level_mdl = false"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
<script>
    export default {
        props: ["data"],
        data() {
            return {
                color: {
                    hue: 50,
                    saturation: 100,
                    luminosity: 50,
                    alpha: 1
                },
                tab: 1,
                level_mdl: false,
                agency_mdl: false,
                agency_update_mdl: false,
                props_data: JSON.parse(this._props.data),
                dt: null,
                alert_list: [],
                alert_form: {
                    color_level: '#ff6161',
                    description: '',
                    name: ''
                },
                overview: {
                    name: null,
                    address: null,
                    logo: '',
                    poea: null,
                    level: '',
                },
            };
        },
        watch: {},
        methods: {
            showEdit(item) {
                this.tab = 2;
                this.alert_form.color_level = item.color_level;
                this.alert_form.description = item.description;
                this.alert_form.name = item.name;
            },
            showDeleteMdl(id) {
                var $this = this;
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            axios.post($this.props_data.delete_alerts, {id: id}).then(function () {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                                $this.getAlertList();
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
            },
            getAlertList() {
                var $this = this;
                axios.post(this.props_data.get_alerts, this.alert_form).then(function (value) {
                    $this.alert_list = value.data;
                });
            },
            saveNewAlert() {
                var $this = this;
                axios.post(this.props_data.store_new_alert, this.alert_form).then(function () {
                    $this.dt.draw();
                    $this.getAlertList();
                    swal('Success!', 'New Alert has been Added!', 'success');
                    $this.alert_form = {
                        color_level: '#ff6161',
                        description: '',
                        name: ''
                    }
                });
            },
            onColorSelect(hue) {
                console.log(hue)
            },
            showLevelMdl() {
                this.level_mdl = true;
            },
            showMdl() {
                this.overview = {
                    name: null,
                    address: null,
                    logo: '',
                    poea: null,
                    level: '',
                };

                this.agency_mdl = true;
            },
            deletion() {
                var $this = this;
                axios.delete(this.overview.delete_link).then(function () {
                    $this.dt.draw();
                    $this.agency_update_mdl = false
                });
            },
            update() {
                var $this = this;
                let formData = new FormData();
                formData.append('id', this.overview.id);
                formData.append('_method', 'PATCH');
                formData.append('logo', $this.overview.logo);
                formData.append('logo_path', $this.overview.logo_path);
                formData.append('name', $this.overview.name);
                formData.append('address', $this.overview.address);
                formData.append('poea', $this.overview.poea);
                formData.append('status', $this.overview.status);
                formData.append('level', $this.overview.level);

                axios.post($this.overview.update_link, formData).then(function () {
                    $this.dt.draw();
                    $this.agency_update_mdl = false
                });
            },
            fileUpload(e) {
                console.log(e.target.files);
                this.overview.logo = e.target.files[0]
            },
            add() {
                var $this = this;
                let formData = new FormData();
                formData.append('logo', this.overview.logo);
                formData.append('name', this.overview.name);
                formData.append('address', this.overview.address);
                formData.append('poea', this.overview.poea);
                formData.append('status', $this.overview.status);
                axios.post(this.props_data.store_link, formData).then(function () {
                    $this.dt.draw();
                    $this.agency_mdl = false
                });
            }
        },
        mounted() {
            var $this = this;
            $this.getAlertList();
            $this.dt = $("#vouchers-table").DataTable({
                responsive: true,
                serverSide: true,
                scrollX: true,
                order: [[0, "desc"]],
                ajax: {
                    url: $this.props_data.datatable_link,
                    type: "POST",
                },
                columns: [
                    {data: "id", name: "id", title: "ID"},
                    {data: "name", name: "name", title: "Company Name"},
                    {data: "poea", name: "poea", title: "POEA No."},
                    {
                        data: function (value) {
                            if (value.alert) {
                                return '<label class="font-bold animate-bounce relative" ' +
                                    'style="color: ' + value.alert.color_level + '">' +
                                    value.alert.name +
                                    '<span class="animate-ping absolute inline-flex ml-1 mt-1 h-4 w-4 rounded-full opacity-75" ' +
                                    'style="background-color: ' + value.alert.color_level + '"></span>\n' +
                                    '<span class="relative inline-flex rounded-full h-3 w-3" ' +
                                    'style="background-color: ' + value.alert.color_level + '"></span>\n' +
                                    '</label>'

                            }
                            return 'No Alert'
                        }, name: "id", title: "Alert Status"
                    },
                    {
                        data: function (value) {
                            if (value.status === 'active') {
                                return '<span class="bg-green-300 shadow-sm p-1 rounded text-white block text-center">Active</span>'
                            }
                            return '<span class="bg-red-500 shadow-sm p-1 rounded text-white block text-center">BLOCKED</span>'
                        }, name: "status", title: "Active Status"
                    },
                    {
                        data: "created_at_display",
                        name: "created_at",
                        title: "Date Created",
                    },
                ],
                drawCallback() {
                    $("table tr").click(function (e) {
                        let data = $(this);
                        let hold = $this.dt.row(data).data();
                        console.log(hold);
                        $this.overview = hold;
                        $this.agency_update_mdl = true;
                    });
                },
            });
        },
    };
</script>
