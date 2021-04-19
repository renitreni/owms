<template>
  <div class="pb-12 pt-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-2 mt-5">
          <a
            href="#"
            @click="voucher_mdl = true"
            class="text-white bg-green-400 hover:bg-green-500 p-2 rounded m-2 shadow"
          >
            <i class="fas fa-file-invoice-dollar"></i> {{ __('New Voucher') }}

          </a>
          <a
            v-bind:href="props_data.export_link"
            target="_blank"
            class="text-white bg-indigo-400 hover:bg-indigo-500 p-2 rounded m-2 shadow"
          >
            <i class="fas fa-file-excel"></i> {{ __('Export to Excel') }}

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

    <transition name="slide-fade">
      <!-- Voucher add -->
      <div class="fixed inset-0 overflow-y-auto" v-if="voucher_mdl">
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
                  <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <div
                  class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                >
                  <h3
                    class="text-lg leading-6 font-medium text-gray-900"
                    id="modal-headline"
                  >
                    New Voucher
                    <span class="underline"></span>
                    <input class="hidden" name="id" />
                  </h3>
                  <div class="mt-6">
                    <div class="flex flex-col">
                      <div class="mt-2">
                        <label>Date</label>
                        <input
                          type="date"
                          name="salary_date"
                          v-model="overview.date"
                          class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                        />
                      </div>
                      <div class="mt-2">
                        <label>Amount</label>
                        <input
                          type="number"
                          name="salary_date"
                          v-model="overview.amount"
                          class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                        />
                      </div>
                      <div class="mt-2">
                        <label>Paid To</label>
                        <input
                          type="text"
                          name="salary_date"
                          v-model="overview.paid_to"
                          class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                        />
                      </div>
                      <div class="mt-2">
                        <label>Particulars</label>
                        <textarea
                          type="text"
                          name="salary_date"
                          v-model="overview.particulars"
                          class="w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0"
                        >
                        </textarea>
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
                @click="voucher_mdl = false"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
              >
                Cancel
              </button>
            </div>
          </div>
        </div>
      </div>
    </transition>

    <transition name="slide-fade">
      <!-- Voucher Update -->
      <div class="fixed inset-0 overflow-y-auto" v-if="voucher_update_mdl">
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
                  <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <div
                  class="flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                >
                  <h3
                    class="text-lg leading-6 font-medium text-gray-900"
                    id="modal-headline"
                  >
                    New Voucher
                    <span class="underline"></span>
                    <input class="hidden" name="id" />
                  </h3>
                  <div class="mt-6">
                    <div class="flex flex-col">
                      <div class="mt-2">
                        <label>Date</label>
                        <p class="font-bold">{{ overview.date }}</p>
                      </div>
                      <div class="mt-2">
                        <label>Amount</label>
                        <p class="font-bold">{{ overview.amount }}</p>
                      </div>
                      <div class="mt-2">
                        <label>Paid To</label>
                        <p class="font-bold">{{ overview.paid_to }}</p>
                      </div>
                      <div class="mt-2">
                        <label>Particulars</label>
                        <p class="font-bold">{{ overview.particulars }}</p>
                      </div>
                      <div class="mt-2">
                        <label>Change</label>
                        <input
                          type="number"
                          v-model="overview.change"
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
                type="button"
                @click="update()"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
              >
                Update
              </button>
              <button
                type="button"
                @click="getCopy()"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
              >
                Cash Voucher
              </button>
              <button
                type="button"
                @click="invalid()"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
              >
                Invalid
              </button>
              <button
                type="button"
                @click="voucher_update_mdl = false"
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
      voucher_mdl: false,
      voucher_update_mdl: false,
      props_data: JSON.parse(this._props.data),
      dt: null,
      overview: {
        date: null,
        paid_to: null,
        particulars: null,
        amount: null,
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
        { data: "id", name: "id", title: "ID" },
        { data: "paid_to", name: "paid_to", title: "Paid To" },
        { data: "amount", name: "amount", title: "Amount" },
        { data: "change", name: "change", title: "Change" },
        {
          data: function (value) {
            if (value.status == "cancelled")
              return '<span class="text-red-500 block text-center"><i class="fas fa-ban"></i></span>';
            else
              return '<span class="text-green-500 block text-center"><i class="fas fa-check"></i></span>';
          },
          name: "status",
          title: "Status",
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
          $this.voucher_update_mdl = true;
        });
      },
    });
  },
};
</script>
