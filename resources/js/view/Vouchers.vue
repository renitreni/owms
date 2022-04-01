<template>
    <div class="pt-8 pb-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-2 mt-5">
                    <a
                        href="#"
                        @click="voucher_mdl = true"
                        class="p-2 m-2 text-white bg-green-400 rounded shadow hover:bg-green-500"
                    >
                        <i class="fas fa-file-invoice-dollar"></i> {{ __('New Voucher') }}

                    </a>
                    <a
                        v-bind:href="props_data.export_link"
                        target="_blank"
                        class="p-2 m-2 text-white bg-indigo-400 rounded shadow hover:bg-indigo-500"
                    >
                        <i class="fas fa-file-excel"></i> {{ __('Export to Excel') }}

                    </a>
                </div>
                <div class="p-5 overflow-auto">
                    <table
                        id="vouchers-table"
                        class="stripe hover display w-full"
                    ></table>
                </div>
            </div>
        </div>

        <transition name="slide-fade">
            <!-- Voucher add -->
            <div class="fixed inset-0 overflow-y-auto" v-if="voucher_mdl">
                <div
                    class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"
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
                        class="inline-block overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl w-5/6"
                        role="dialog"
                        aria-modal="true"
                        aria-labelledby="modal-headline"
                    >
                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto text-gray-600 bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10"
                                >
                                    <!-- Heroicon name -->
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>
                                <div
                                    class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                                >
                                    <h3
                                        class="text-lg font-medium leading-6 text-gray-900"
                                        id="modal-headline"
                                    >
                                        Voucher
                                        <span class="underline"></span>
                                        <input class="hidden" name="id"/>
                                    </h3>
                                    <div class="mt-6">
                                        <form class="grid grid-cols-12 gap-2 p-4">
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">Applicant Name</label>
                                                <input type="text" v-model="overview.applicant_name"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                                <input type="text" v-model="overview.status"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">Requirements / ID / Additional Fare</label>
                                                <input type="text" v-model="overview.req_id_fare"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">Passporting Allowance</label>
                                                <input type="text" v-model="overview.passporting_allowance"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">Info / Sheet</label>
                                                <input type="text" v-model="overview.info_sheet"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">Ticket</label>
                                                <input type="text" v-model="overview.ticket"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">TESDA / Allowance / Assessment</label>
                                                <input type="text" v-model="overview.testda_allowance"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">NBI / Renewal / Fare</label>
                                                <input type="text" v-model="overview.nbi_renewal_fare"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">Medical Follow-up and Fare</label>
                                                <input type="text" v-model="overview.medical_allowance"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">Owwa Allowance</label>
                                                <input type="text" v-model="overview.owwa_allowance"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="md:col-span-4 col-span-12">
                                                <label class="block text-sm font-medium text-gray-700">Office Allowance</label>
                                                <input type="text" v-model="overview.office_allowance"
                                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse"
                        >
                            <button
                                type="submit"
                                @click="add()"
                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Add
                            </button>
                            <button
                                type="button"
                                @click="voucher_mdl = false"
                                class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
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
            voucher_mdl: false,
            voucher_update_mdl: false,
            props_data: JSON.parse(this._props.data),
            dt: null,
            overview: {
                agency_id: null,
                applicant_name: null,
                status: null,
                req_id_fare: null,
                passporting_allowance: null,
                info_sheet: null,
                ticket: null,
                testda_allowance: null,
                nbi_renewal_fare: null,
                medical_allowance: null,
                owwa_allowance: null,
                office_allowance: null,
            },
        };
    },
    watch: {
        voucher_update_mdl: function (value) {
            if (!value) {
                this.overview = {
                    date: null,
                    paid_to: null,
                    particulars: null,
                    amount: null,
                };
            }
        },
        voucher_mdl: function (value) {
            if (!value) {
                this.overview = {
                    date: null,
                    paid_to: null,
                    particulars: null,
                    amount: null,
                };
            }
        },
    },
    methods: {
        add() {
            var $this = this;
            axios.post(this.props_data.store_link, this.overview).then((e) => {
                $this.voucher_mdl = false;
                swal("Success!", "Operation Successful!", "success");
                $this.dt.draw();
            });
        },
        update() {
            var $this = this;
            axios.put(this.overview.update_link, this.overview).then((e) => {
                $this.voucher_update_mdl = false;
                swal("Success!", "Operation Successful!", "success");
                $this.dt.draw();
            });
        },
        invalid() {
            var $this = this;
            axios.post(this.overview.invalid_link, this.overview).then((e) => {
                $this.voucher_update_mdl = false;
                swal("Success!", "Operation Successful!", "success");
                $this.dt.draw();
            });
        },
        getCopy() {
            window.open(this.overview.cash_voucherlink, '_blank');
        }
    },
    mounted() {
        var $this = this;
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
                {data: "applicant_name", name: "applicant_name", title: "Applicant Name"},
                {data: "status", name: "status", title: "Status"},
                {data: "req_id_fare", name: "req_id_fare", title: "Requirements/ID/Fare"},
                {data: "passporting_allowance", name: "passporting_allowance", title: "Passporting Allowance"},
                {data: "info_sheet", name: "info_sheet", title: "Info/Sheet"},
                {data: "ticket", name: "ticket", title: "Ticket"},
                {data: "testda_allowance", name: "testda_allowance", title: "TESDA Allowance"},
                {data: "nbi_renewal_fare", name: "nbi_renewal_fare", title: "NBI/Renewal/Fare"},
                {data: "medical_allowance", name: "medical_allowance", title: "Medical Allowance"},
                {data: "owwa_allowance", name: "owwa_allowance", title: "OWWA Allowance"},
                {data: "office_allowance", name: "office_allowance", title: "Office Allowance"},
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
                    $this.voucher_update_mdl = true;
                });
            },
        });
    },
};
</script>
