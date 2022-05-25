(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Vouchers.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/view/Vouchers.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["data"],
  data: function data() {
    return {
      voucher_mdl: false,
      voucher_update_mdl: false,
      props_data: JSON.parse(this._props.data),
      dt: null,
      overview: this.columnDefault()
    };
  },
  watch: {
    'props_data.group_selected': function props_dataGroup_selected() {
      this.dt.draw();
    }
  },
  methods: {
    columnDefault: function columnDefault() {
      return {
        "id": null,
        "agency_id": null,
        "name": null,
        "status": null,
        "source": null,
        "requirements": null,
        "passporting_allowance": null,
        "ticket": null,
        "tesda_allowance": null,
        "nbi_renewal": null,
        "medical_allowance": null,
        "pdos": null,
        "info_sheet": null,
        "owwa_allowance": null,
        "office_allowance": null,
        "travel_allowance": null,
        "weekly_allowance": null,
        "medical_follow_up": null,
        "created_by": null,
        "vaccine_fare": null
      };
    },
    opedModalAdd: function opedModalAdd() {
      this.voucher_mdl = true;
      this.overview = this.columnDefault();
    },
    add: function add() {
      var $this = this;
      $this.voucher_mdl = false;
      axios.post(this.props_data.store_link, this.overview).then(function (e) {
        swal("Success!", "Operation Successful!", "success");
        $this.dt.draw();
        $this.overview = $this.columnDefault();
      });
    },
    update: function update() {
      var $this = this;
      $this.voucher_mdl = false;
      axios.put(this.overview.update_link, this.overview).then(function (e) {
        swal("Success!", "Operation Successful!", "success");
        $this.dt.draw();
      });
    },
    invalid: function invalid() {
      var $this = this;
      $this.voucher_mdl = false;
      axios.post(this.overview.invalid_link, this.overview).then(function (e) {
        swal("Success!", "Operation Successful!", "success");
        $this.dt.draw();
      });
    },
    getCopy: function getCopy() {
      window.open(this.overview.cash_voucherlink, '_blank');
    }
  },
  mounted: function mounted() {
    var $this = this;
    $this.dt = $("#vouchers-table").DataTable({
      responsive: true,
      serverSide: true,
      scrollX: true,
      scrollY: '250px',
      fixedHeader: {
        header: true
      },
      order: [[0, "desc"]],
      ajax: {
        url: $this.props_data.datatable_link,
        type: "POST",
        data: function data(_data) {
          _data.user = $this.props_data.group_selected;
        }
      },
      columns: [{
        data: "created_at_display",
        name: "created_at",
        title: "Date Created"
      }, {
        data: "user.email",
        title: "Created By"
      }, {
        data: "name",
        title: "Name"
      }, {
        data: "source",
        title: "Source"
      }, {
        data: "requirements",
        title: "Requirements"
      }, {
        data: "passporting_allowance",
        title: "Passporting Allowance"
      }, {
        data: "ticket",
        title: "TICKET"
      }, {
        data: "tesda_allowance",
        title: "TESDA Allowance"
      }, {
        data: "nbi_renewal",
        title: "NBI/Renewal"
      }, {
        data: "medical_allowance",
        title: "Medical Allowance"
      }, {
        data: "pdos",
        title: "PDOS"
      }, {
        data: "info_sheet",
        title: "Info Sheer"
      }, {
        data: "owwa_allowance",
        title: "OWWA Allowance"
      }, {
        data: "office_allowance",
        title: "Office Allowance"
      }, {
        data: "travel_allowance",
        title: "Travel Allowance"
      }, {
        data: "weekly_allowance",
        title: "Weekly Allowance"
      }, {
        data: "medical_follow_up",
        title: "Medical Follow Up"
      }, {
        data: "nbi_refund",
        title: "NBI Refund"
      }, {
        data: "psa_refund",
        title: "PSA Refund"
      }, {
        data: "passport_refund",
        title: "Passport Refund"
      }, {
        data: "fare_refund",
        title: "Fare Refund"
      }, {
        data: "red_rebon_nbi",
        title: "Red Rebon NBI"
      }, {
        data: "fit_to_work",
        title: "Fit To Work"
      }, {
        data: "repat",
        title: "Repat"
      }, {
        data: "stamping",
        title: "Stamping"
      }, {
        data: "vaccine_fare",
        title: "Vaccine/Fare"
      }],
      drawCallback: function drawCallback() {
        $("table tr").click(function (e) {
          var data = $(this);
          var hold = $this.dt.row(data).data();
          console.log(hold);
          $this.overview = hold;
          $this.voucher_mdl = true;
        });
      }
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Vouchers.vue?vue&type=template&id=20ffb27e&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/view/Vouchers.vue?vue&type=template&id=20ffb27e& ***!
  \*****************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "pt-8 pb-12" }, [
    _c("div", { staticClass: "mx-auto max-w-7xl sm:px-6 lg:px-8" }, [
      _c(
        "div",
        { staticClass: "overflow-hidden bg-white shadow-sm sm:rounded-lg" },
        [
          _c("div", { staticClass: "p-2 mt-5 flex" }, [
            _c(
              "a",
              {
                staticClass:
                  "p-2 m-2 text-white bg-green-400 rounded shadow hover:bg-green-500",
                attrs: { href: "#" },
                on: {
                  click: function($event) {
                    return _vm.opedModalAdd()
                  }
                }
              },
              [
                _c("i", { staticClass: "fas fa-file-invoice-dollar" }),
                _vm._v(
                  " " + _vm._s(_vm.__("New Voucher")) + "\n\n                "
                )
              ]
            ),
            _vm._v(" "),
            _c(
              "a",
              {
                staticClass:
                  "p-2 m-2 text-white bg-indigo-400 rounded shadow hover:bg-indigo-500",
                attrs: { href: _vm.props_data.export_link, target: "_blank" }
              },
              [
                _c("i", { staticClass: "fas fa-file-excel" }),
                _vm._v(
                  " " +
                    _vm._s(_vm.__("Export to Excel")) +
                    "\n\n                "
                )
              ]
            )
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "p-2 flex" }, [
            _c("div", { staticClass: "my-auto" }, [
              _c("label", { staticClass: "py-auto" }, [_vm._v("Viewed By")]),
              _vm._v(" "),
              _c(
                "select",
                {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.props_data.group_selected,
                      expression: "props_data.group_selected"
                    }
                  ],
                  staticClass:
                    "mt-1 block w-full py-2 px-6 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm",
                  on: {
                    change: function($event) {
                      var $$selectedVal = Array.prototype.filter
                        .call($event.target.options, function(o) {
                          return o.selected
                        })
                        .map(function(o) {
                          var val = "_value" in o ? o._value : o.value
                          return val
                        })
                      _vm.$set(
                        _vm.props_data,
                        "group_selected",
                        $event.target.multiple
                          ? $$selectedVal
                          : $$selectedVal[0]
                      )
                    }
                  }
                },
                [
                  _c("option", { attrs: { value: "" } }, [_vm._v("-- All --")]),
                  _vm._v(" "),
                  _vm._l(_vm.props_data.group, function(item) {
                    return _c("option", { domProps: { value: item.email } }, [
                      _vm._v(_vm._s(item.email))
                    ])
                  })
                ],
                2
              )
            ])
          ]),
          _vm._v(" "),
          _vm._m(0)
        ]
      )
    ]),
    _vm._v(" "),
    _vm.voucher_mdl
      ? _c("div", { staticClass: "fixed inset-0 overflow-y-auto" }, [
          _c(
            "div",
            {
              staticClass:
                "flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"
            },
            [
              _vm._m(1),
              _vm._v(" "),
              _c(
                "span",
                {
                  staticClass:
                    "hidden sm:inline-block sm:align-middle sm:h-screen",
                  attrs: { "aria-hidden": "true" }
                },
                [_vm._v("​")]
              ),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass:
                    "inline-block overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl w-5/6",
                  attrs: {
                    role: "dialog",
                    "aria-modal": "true",
                    "aria-labelledby": "modal-headline"
                  }
                },
                [
                  _c(
                    "div",
                    { staticClass: "px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4" },
                    [
                      _c("div", { staticClass: "sm:flex sm:items-start" }, [
                        _vm._m(2),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                          },
                          [
                            _vm._m(3),
                            _vm._v(" "),
                            _c("div", { staticClass: "mt-6" }, [
                              _c(
                                "form",
                                { staticClass: "grid grid-cols-12 gap-2 p-4" },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("Name")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.name,
                                            expression: "overview.name"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: { value: _vm.overview.name },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "name",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("Source")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.source,
                                            expression: "overview.source"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.source
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "source",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("Requirements")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.requirements,
                                            expression: "overview.requirements"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.requirements
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "requirements",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "Passporting\n                                            Allowance"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value:
                                              _vm.overview
                                                .passporting_allowance,
                                            expression:
                                              "overview.passporting_allowance"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value:
                                            _vm.overview.passporting_allowance
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "passporting_allowance",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("Ticket")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.ticket,
                                            expression: "overview.ticket"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.ticket
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "ticket",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "Medical\n                                            Allowance"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value:
                                              _vm.overview.medical_allowance,
                                            expression:
                                              "overview.medical_allowance"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.medical_allowance
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "medical_allowance",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "TESDA Allowance\n                                            and Assessment"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.tesda_allowance,
                                            expression:
                                              "overview.tesda_allowance"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.tesda_allowance
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "tesda_allowance",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "Owwa\n                                            Allowance"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.owwa_allowance,
                                            expression:
                                              "overview.owwa_allowance"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.owwa_allowance
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "owwa_allowance",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("PDOS")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.pdos,
                                            expression: "overview.pdos"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: { value: _vm.overview.pdos },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "pdos",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "NBI /\n                                            Renewal"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.nbi_renewal,
                                            expression: "overview.nbi_renewal"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.nbi_renewal
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "nbi_renewal",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "Info\n                                            Sheet"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.info_sheet,
                                            expression: "overview.info_sheet"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.info_sheet
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "info_sheet",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "Travel\n                                            Allowance"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value:
                                              _vm.overview.travel_allowance,
                                            expression:
                                              "overview.travel_allowance"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.travel_allowance
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "travel_allowance",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "Weekly\n                                            Allowance"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value:
                                              _vm.overview.weekly_allowance,
                                            expression:
                                              "overview.weekly_allowance"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.weekly_allowance
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "weekly_allowance",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "FARE To\n                                            Office"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value:
                                              _vm.overview.office_allowance,
                                            expression:
                                              "overview.office_allowance"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.office_allowance
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "office_allowance",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "Medical\n                                            Follow-up"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value:
                                              _vm.overview.medical_follow_up,
                                            expression:
                                              "overview.medical_follow_up"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.medical_follow_up
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "medical_follow_up",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("NBI Refund")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.nbi_refund,
                                            expression: "overview.nbi_refund"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.nbi_refund
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "nbi_refund",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("PSA Refund")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.psa_refund,
                                            expression: "overview.psa_refund"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.psa_refund
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "psa_refund",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "Passport\n                                            Refund"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.passport_refund,
                                            expression:
                                              "overview.passport_refund"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.passport_refund
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "passport_refund",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("Fare Refund")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.fare_refund,
                                            expression: "overview.fare_refund"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.fare_refund
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "fare_refund",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("Red Rebon NBI")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.red_rebon_nbi,
                                            expression: "overview.red_rebon_nbi"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.red_rebon_nbi
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "red_rebon_nbi",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("Fit To Work")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.fit_to_work,
                                            expression: "overview.fit_to_work"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.fit_to_work
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "fit_to_work",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [_vm._v("Repat")]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.repat,
                                            expression: "overview.repat"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: { value: _vm.overview.repat },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "repat",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "Stamping\n                                            Follow-up"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.stamping,
                                            expression: "overview.stamping"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.stamping
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "stamping",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass: "md:col-span-4 col-span-12"
                                    },
                                    [
                                      _c(
                                        "label",
                                        {
                                          staticClass:
                                            "block text-sm font-medium text-gray-700"
                                        },
                                        [
                                          _vm._v(
                                            "Vaccine /\n                                            Fare"
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.vaccine_fare,
                                            expression: "overview.vaccine_fare"
                                          }
                                        ],
                                        staticClass:
                                          "mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.vaccine_fare
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "vaccine_fare",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]
                                  )
                                ]
                              )
                            ])
                          ]
                        )
                      ])
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass:
                        "px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse"
                    },
                    [
                      !_vm.overview.id
                        ? _c(
                            "button",
                            {
                              staticClass:
                                "inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "submit" },
                              on: {
                                click: function($event) {
                                  return _vm.add()
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                        Add\n                    "
                              )
                            ]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.overview.id
                        ? _c(
                            "button",
                            {
                              staticClass:
                                "inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "submit" },
                              on: {
                                click: function($event) {
                                  return _vm.add()
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                        Update\n                    "
                              )
                            ]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.overview.id
                        ? _c(
                            "button",
                            {
                              staticClass:
                                "inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "submit" },
                              on: {
                                click: function($event) {
                                  return _vm.invalid()
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                        Invalid\n                    "
                              )
                            ]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      _c(
                        "button",
                        {
                          staticClass:
                            "inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm",
                          attrs: { type: "button" },
                          on: {
                            click: function($event) {
                              _vm.voucher_mdl = false
                            }
                          }
                        },
                        [
                          _vm._v(
                            "\n                        Cancel\n                    "
                          )
                        ]
                      )
                    ]
                  )
                ]
              )
            ]
          )
        ])
      : _vm._e()
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      { staticClass: "p-5 relative overflow-x-auto shadow-md sm:rounded-lg" },
      [
        _c("table", {
          staticClass:
            "display mx-3 stripe hover display w-full wrap cell-border w-full text-sm text-left text-gray-500 dark:text-gray-400",
          attrs: { id: "vouchers-table" }
        })
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "fixed inset-0 transition-opacity",
        attrs: { "aria-hidden": "true" }
      },
      [_c("div", { staticClass: "absolute inset-0 bg-gray-500 opacity-75" })]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass:
          "flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto text-gray-600 bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10"
      },
      [_c("i", { staticClass: "fas fa-file-invoice-dollar" })]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "h3",
      {
        staticClass: "text-lg font-medium leading-6 text-gray-900",
        attrs: { id: "modal-headline" }
      },
      [
        _vm._v(
          "\n                                Voucher\n                                "
        ),
        _c("span", { staticClass: "underline" }),
        _vm._v(" "),
        _c("input", { staticClass: "hidden", attrs: { name: "id" } })
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/view/Vouchers.vue":
/*!****************************************!*\
  !*** ./resources/js/view/Vouchers.vue ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Vouchers_vue_vue_type_template_id_20ffb27e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Vouchers.vue?vue&type=template&id=20ffb27e& */ "./resources/js/view/Vouchers.vue?vue&type=template&id=20ffb27e&");
/* harmony import */ var _Vouchers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Vouchers.vue?vue&type=script&lang=js& */ "./resources/js/view/Vouchers.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Vouchers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Vouchers_vue_vue_type_template_id_20ffb27e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Vouchers_vue_vue_type_template_id_20ffb27e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/view/Vouchers.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/view/Vouchers.vue?vue&type=script&lang=js&":
/*!*****************************************************************!*\
  !*** ./resources/js/view/Vouchers.vue?vue&type=script&lang=js& ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Vouchers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Vouchers.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Vouchers.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Vouchers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/view/Vouchers.vue?vue&type=template&id=20ffb27e&":
/*!***********************************************************************!*\
  !*** ./resources/js/view/Vouchers.vue?vue&type=template&id=20ffb27e& ***!
  \***********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Vouchers_vue_vue_type_template_id_20ffb27e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Vouchers.vue?vue&type=template&id=20ffb27e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Vouchers.vue?vue&type=template&id=20ffb27e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Vouchers_vue_vue_type_template_id_20ffb27e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Vouchers_vue_vue_type_template_id_20ffb27e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);