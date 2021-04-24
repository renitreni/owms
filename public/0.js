(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["data"],
  data: function data() {
    return {
      voucher_mdl: false,
      voucher_update_mdl: false,
      props_data: JSON.parse(this._props.data),
      dt: null,
      overview: {
        date: null,
        paid_to: null,
        particulars: null,
        amount: null
      }
    };
  },
  watch: {
    voucher_update_mdl: function voucher_update_mdl(value) {
      if (!value) {
        this.overview = {
          date: null,
          paid_to: null,
          particulars: null,
          amount: null
        };
      }
    },
    voucher_mdl: function voucher_mdl(value) {
      if (!value) {
        this.overview = {
          date: null,
          paid_to: null,
          particulars: null,
          amount: null
        };
      }
    }
  },
  methods: {
    add: function add() {
      var $this = this;
      axios.post(this.props_data.store_link, this.overview).then(function (e) {
        $this.voucher_mdl = false;
        swal("Success!", "Operation Successful!", "success");
        $this.dt.draw();
      });
    },
    update: function update() {
      var $this = this;
      axios.put(this.overview.update_link, this.overview).then(function (e) {
        $this.voucher_update_mdl = false;
        swal("Success!", "Operation Successful!", "success");
        $this.dt.draw();
      });
    },
    invalid: function invalid() {
      var $this = this;
      axios.post(this.overview.invalid_link, this.overview).then(function (e) {
        $this.voucher_update_mdl = false;
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
      order: [[0, "desc"]],
      ajax: {
        url: $this.props_data.datatable_link,
        type: "POST"
      },
      columns: [{
        data: "id",
        name: "id",
        title: "ID"
      }, {
        data: "paid_to",
        name: "paid_to",
        title: "Paid To"
      }, {
        data: "amount",
        name: "amount",
        title: "Amount"
      }, {
        data: "change",
        name: "change",
        title: "Change"
      }, {
        data: function data(value) {
          if (value.status == "cancelled") return '<span class="text-red-500 block text-center"><i class="fas fa-ban"></i></span>';else return '<span class="text-green-500 block text-center"><i class="fas fa-check"></i></span>';
        },
        name: "status",
        title: "Status"
      }, {
        data: "created_at_display",
        name: "created_at",
        title: "Date Created"
      }],
      drawCallback: function drawCallback() {
        $("table tr").click(function (e) {
          var data = $(this);
          var hold = $this.dt.row(data).data();
          console.log(hold);
          $this.overview = hold;
          $this.voucher_update_mdl = true;
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
  return _c(
    "div",
    { staticClass: "pb-12 pt-8" },
    [
      _c("div", { staticClass: "max-w-7xl mx-auto sm:px-6 lg:px-8" }, [
        _c(
          "div",
          { staticClass: "bg-white overflow-hidden shadow-sm sm:rounded-lg" },
          [
            _c("div", { staticClass: "p-2 mt-5" }, [
              _c(
                "a",
                {
                  staticClass:
                    "text-white bg-green-400 hover:bg-green-500 p-2 rounded m-2 shadow",
                  attrs: { href: "#" },
                  on: {
                    click: function($event) {
                      _vm.voucher_mdl = true
                    }
                  }
                },
                [
                  _c("i", { staticClass: "fas fa-file-invoice-dollar" }),
                  _vm._v(" " + _vm._s(_vm.__("New Voucher")) + "\n\n        ")
                ]
              ),
              _vm._v(" "),
              _c(
                "a",
                {
                  staticClass:
                    "text-white bg-indigo-400 hover:bg-indigo-500 p-2 rounded m-2 shadow",
                  attrs: { href: _vm.props_data.export_link, target: "_blank" }
                },
                [
                  _c("i", { staticClass: "fas fa-file-excel" }),
                  _vm._v(
                    " " + _vm._s(_vm.__("Export to Excel")) + "\n\n        "
                  )
                ]
              )
            ]),
            _vm._v(" "),
            _vm._m(0)
          ]
        )
      ]),
      _vm._v(" "),
      _c("transition", { attrs: { name: "slide-fade" } }, [
        _vm.voucher_mdl
          ? _c("div", { staticClass: "fixed inset-0 overflow-y-auto" }, [
              _c(
                "div",
                {
                  staticClass:
                    "flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "fixed inset-0 transition-opacity",
                      attrs: { "aria-hidden": "true" }
                    },
                    [
                      _c("div", {
                        staticClass: "absolute inset-0 bg-gray-500 opacity-75"
                      })
                    ]
                  ),
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
                        "inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full",
                      attrs: {
                        role: "dialog",
                        "aria-modal": "true",
                        "aria-labelledby": "modal-headline"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"
                        },
                        [
                          _c("div", { staticClass: "sm:flex sm:items-start" }, [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600"
                              },
                              [
                                _c("i", {
                                  staticClass: "fas fa-file-invoice-dollar"
                                })
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass:
                                  "flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                              },
                              [
                                _c(
                                  "h3",
                                  {
                                    staticClass:
                                      "text-lg leading-6 font-medium text-gray-900",
                                    attrs: { id: "modal-headline" }
                                  },
                                  [
                                    _vm._v(
                                      "\n                  New Voucher\n                  "
                                    ),
                                    _c("span", { staticClass: "underline" }),
                                    _vm._v(" "),
                                    _c("input", {
                                      staticClass: "hidden",
                                      attrs: { name: "id" }
                                    })
                                  ]
                                ),
                                _vm._v(" "),
                                _c("div", { staticClass: "mt-6" }, [
                                  _c("div", { staticClass: "flex flex-col" }, [
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Date")]),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.date,
                                            expression: "overview.date"
                                          }
                                        ],
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: {
                                          type: "date",
                                          name: "salary_date"
                                        },
                                        domProps: { value: _vm.overview.date },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "date",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Amount")]),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.amount,
                                            expression: "overview.amount"
                                          }
                                        ],
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: {
                                          type: "number",
                                          name: "salary_date"
                                        },
                                        domProps: {
                                          value: _vm.overview.amount
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "amount",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Paid To")]),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.paid_to,
                                            expression: "overview.paid_to"
                                          }
                                        ],
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: {
                                          type: "text",
                                          name: "salary_date"
                                        },
                                        domProps: {
                                          value: _vm.overview.paid_to
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "paid_to",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Particulars")]),
                                      _vm._v(" "),
                                      _c("textarea", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.particulars,
                                            expression: "overview.particulars"
                                          }
                                        ],
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: {
                                          type: "text",
                                          name: "salary_date"
                                        },
                                        domProps: {
                                          value: _vm.overview.particulars
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "particulars",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ])
                                  ])
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
                            "bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                        },
                        [
                          _c(
                            "button",
                            {
                              staticClass:
                                "w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "submit" },
                              on: {
                                click: function($event) {
                                  return _vm.add()
                                }
                              }
                            },
                            [_vm._v("\n              Add\n            ")]
                          ),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass:
                                "mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  _vm.voucher_mdl = false
                                }
                              }
                            },
                            [_vm._v("\n              Cancel\n            ")]
                          )
                        ]
                      )
                    ]
                  )
                ]
              )
            ])
          : _vm._e()
      ]),
      _vm._v(" "),
      _c("transition", { attrs: { name: "slide-fade" } }, [
        _vm.voucher_update_mdl
          ? _c("div", { staticClass: "fixed inset-0 overflow-y-auto" }, [
              _c(
                "div",
                {
                  staticClass:
                    "flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
                },
                [
                  _c(
                    "div",
                    {
                      staticClass: "fixed inset-0 transition-opacity",
                      attrs: { "aria-hidden": "true" }
                    },
                    [
                      _c("div", {
                        staticClass: "absolute inset-0 bg-gray-500 opacity-75"
                      })
                    ]
                  ),
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
                        "inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full",
                      attrs: {
                        role: "dialog",
                        "aria-modal": "true",
                        "aria-labelledby": "modal-headline"
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass: "bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"
                        },
                        [
                          _c("div", { staticClass: "sm:flex sm:items-start" }, [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10 text-gray-600"
                              },
                              [
                                _c("i", {
                                  staticClass: "fas fa-file-invoice-dollar"
                                })
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass:
                                  "flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"
                              },
                              [
                                _c(
                                  "h3",
                                  {
                                    staticClass:
                                      "text-lg leading-6 font-medium text-gray-900",
                                    attrs: { id: "modal-headline" }
                                  },
                                  [
                                    _vm._v(
                                      "\n                  New Voucher\n                  "
                                    ),
                                    _c("span", { staticClass: "underline" }),
                                    _vm._v(" "),
                                    _c("input", {
                                      staticClass: "hidden",
                                      attrs: { name: "id" }
                                    })
                                  ]
                                ),
                                _vm._v(" "),
                                _c("div", { staticClass: "mt-6" }, [
                                  _c("div", { staticClass: "flex flex-col" }, [
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Date")]),
                                      _vm._v(" "),
                                      _c("p", { staticClass: "font-bold" }, [
                                        _vm._v(_vm._s(_vm.overview.date))
                                      ])
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Amount")]),
                                      _vm._v(" "),
                                      _c("p", { staticClass: "font-bold" }, [
                                        _vm._v(_vm._s(_vm.overview.amount))
                                      ])
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Paid To")]),
                                      _vm._v(" "),
                                      _c("p", { staticClass: "font-bold" }, [
                                        _vm._v(_vm._s(_vm.overview.paid_to))
                                      ])
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Particulars")]),
                                      _vm._v(" "),
                                      _c("p", { staticClass: "font-bold" }, [
                                        _vm._v(_vm._s(_vm.overview.particulars))
                                      ])
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Change")]),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.change,
                                            expression: "overview.change"
                                          }
                                        ],
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: { type: "number" },
                                        domProps: {
                                          value: _vm.overview.change
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "change",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ])
                                  ])
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
                            "bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                        },
                        [
                          _c(
                            "button",
                            {
                              staticClass:
                                "w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  return _vm.update()
                                }
                              }
                            },
                            [_vm._v("\n              Update\n            ")]
                          ),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass:
                                "w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  return _vm.getCopy()
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n              Cash Voucher\n            "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass:
                                "w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  return _vm.invalid()
                                }
                              }
                            },
                            [_vm._v("\n              Invalid\n            ")]
                          ),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass:
                                "mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  _vm.voucher_update_mdl = false
                                }
                              }
                            },
                            [_vm._v("\n              Cancel\n            ")]
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
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "p-5" }, [
      _c("table", {
        staticClass: "stripe hover",
        staticStyle: { width: "100%" },
        attrs: { id: "vouchers-table" }
      })
    ])
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