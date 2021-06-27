(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Contracts.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/view/Contracts.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      sw: {},
      hsw: {},
      sw_mdl: false,
      hsw_mdl: false,
      approval_mdl: false,
      dt: null,
      props_data: JSON.parse(this._props.data),
      details: {},
      serial_no: '',
      remarks: ''
    };
  },
  methods: {
    showContractsMdl: function showContractsMdl() {
      this.contracts_mdl = true;
    },
    updateContract: function updateContract(status) {
      var $this = this;
      axios.post(this.props_data.contract_us_link, {
        'serial_no': this.serial_no,
        'status': status,
        'remarks': this.remarks
      }).then(function (value) {
        $this.approval_mdl = false;
        $this.remarks = '';
        Swal.fire({
          icon: 'success',
          title: 'Contract Status has been updated!',
          html: 'Update success!'
        });
        $this.dt.draw();
      });
    }
  },
  mounted: function mounted() {
    var $this = this;
    $this.dt = $("#contracts-table").DataTable({
      responsive: true,
      serverSide: true,
      scrollX: true,
      order: [[0, "desc"]],
      ajax: {
        url: $this.props_data.datatable_link,
        type: "POST"
      },
      columns: [{
        data: function data(value) {
          return '<a class="contract-show text-indigo-500 hover:text-indigo-400 hover:underline font-bold">' + value.serial_no + '</a>';
        },
        name: "serial_no",
        title: "Serial No"
      }, {
        data: function data(value) {
          if (value.status === 'Pending') return '<a class="approval-show text-indigo-500 hover:text-indigo-400 hover:underline font-bold">' + value.status + '</a>';
          return value.status;
        },
        name: "status",
        title: "Status"
      }, {
        data: 'name',
        name: "name",
        title: "Contract"
      }],
      drawCallback: function drawCallback() {
        $(".contract-show").click(function (e) {
          var data = $(this).parent().parent();
          var hold = $this.dt.row(data).data();
          console.log(hold.details);

          if (hold.name === 'Skilled Workers') {
            $this.sw = hold.details;
            $this.sw_mdl = true;
          } else if (hold.name === 'Household Service Workers') {
            $this.hsw = hold.details;
            $this.hsw_mdl = true;
          }
        });
        $(".approval-show").click(function (e) {
          var data = $(this).parent().parent();
          var hold = $this.dt.row(data).data();
          console.log(hold);
          $this.serial_no = hold.serial_no;
          $this.approval_mdl = true;
        });
      }
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Contracts.vue?vue&type=template&id=eb150dd6&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/view/Contracts.vue?vue&type=template&id=eb150dd6& ***!
  \******************************************************************************************************************************************************************************************************/
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
      _vm._m(0),
      _vm._v(" "),
      _c("transition", { attrs: { name: "slide-fade" } }, [
        _vm.hsw_mdl
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
                        "inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all my-8 align-middle",
                      attrs: {
                        role: "dialog",
                        "aria-modal": "true",
                        "aria-labelledby": "modal-headline"
                      }
                    },
                    [
                      _c("div", { staticClass: "bg-gray-100 p-3" }, [
                        _c("div", { staticClass: "flex flex-col" }, [
                          _c("div", { staticClass: "flex flex-row" }, [
                            _c(
                              "div",
                              {
                                staticClass: "flex-grow font-bold flex-column"
                              },
                              [
                                _c(
                                  "div",
                                  { staticClass: "fw-bolder text-xl" },
                                  [
                                    _vm._v(
                                      "\n                                        " +
                                        _vm._s(
                                          _vm.__(
                                            "STANDARD EMPLOYMENT CONTRACT FOR FILIPINO HOUSEHOLD SERVICE WORKERS"
                                          )
                                        ) +
                                        "\n                                    "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c("div", { staticClass: "text-gray-500" }, [
                                  _vm._v(
                                    "\n                                        " +
                                      _vm._s(
                                        _vm.__(
                                          "(HSWs) BOUND FOR THE KINGDOM OF SAUDI ARABIA"
                                        )
                                      ) +
                                      "\n                                    "
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex-shrink" }, [
                              _c(
                                "button",
                                {
                                  staticClass:
                                    "text-gray-700 hover:text-white hover:bg-red-500 pl-1 pr-1 rounded",
                                  attrs: { type: "button" },
                                  on: {
                                    click: function($event) {
                                      _vm.hsw_mdl = false
                                    }
                                  }
                                },
                                [_c("i", { staticClass: "fas fa-times" })]
                              )
                            ])
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "bg-white p-2" }, [
                        _c(
                          "form",
                          { staticClass: "bg-white px-4 pt-4 pb-4 mb-4" },
                          [
                            _c("label", { staticClass: "text-lg font-bold" }, [
                              _vm._v(_vm._s(_vm.__("Employer Details")))
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-row" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Full Name")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.employer_name,
                                        expression: "hsw.employer_name"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.employer_name,
                                      "border-gray-300 ": _vm.hsw.employer_name
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.employer_name },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "employer_name",
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
                                { staticClass: "my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(
                                            _vm.__(
                                              "Visa Number issued by the Saudi Ministry of Labor"
                                            )
                                          ) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.visa_no,
                                        expression: "hsw.visa_no"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.visa_no,
                                      "border-gray-300 ": _vm.hsw.visa_no
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.visa_no },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "visa_no",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-col" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Address")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.address,
                                        expression: "hsw.address"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.address,
                                      "border-gray-300 ": _vm.hsw.address
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.address },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "address",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-row" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Street")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.street,
                                        expression: "hsw.street"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.street,
                                      "border-gray-300 ": _vm.hsw.street
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.street },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "street",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("District")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.district,
                                        expression: "hsw.district"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.district,
                                      "border-gray-300 ": _vm.hsw.district
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.district },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "district",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("City")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.city,
                                        expression: "hsw.city"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.city,
                                      "border-gray-300 ": _vm.hsw.city
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.city },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "city",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-row" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Civil Status")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.cs_employer,
                                        expression: "hsw.cs_employer"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.cs_employer,
                                      "border-gray-300 ": _vm.hsw.cs_employer
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.cs_employer },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "cs_employer",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(
                                            _vm.__("Number of Family Members")
                                          ) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.no_family_members,
                                        expression: "hsw.no_family_members"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw
                                        .no_family_members,
                                      "border-gray-300 ":
                                        _vm.hsw.no_family_members
                                    },
                                    attrs: { type: "number" },
                                    domProps: {
                                      value: _vm.hsw.no_family_members
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "no_family_members",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-row" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Telephone No.")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.telephone,
                                        expression: "hsw.telephone"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.telephone,
                                      "border-gray-300 ": _vm.hsw.telephone
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.telephone },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "telephone",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Mobile No.")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.mobile,
                                        expression: "hsw.mobile"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.mobile,
                                      "border-gray-300 ": _vm.hsw.mobile
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.mobile },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "mobile",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("E-mail")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.email,
                                        expression: "hsw.email"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.email,
                                      "border-gray-300 ": _vm.hsw.email
                                    },
                                    attrs: { type: "email" },
                                    domProps: { value: _vm.hsw.email },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "email",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c("label", { staticClass: "text-lg font-bold" }, [
                              _vm._v(_vm._s(_vm.__("Worker Details")))
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-row" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Full Name")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.worker_name,
                                        expression: "hsw.worker_name"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.worker_name,
                                      "border-gray-300 ": _vm.hsw.worker_name
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.worker_name },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "worker_name",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Position")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.position,
                                        expression: "hsw.position"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.position,
                                      "border-gray-300 ": _vm.hsw.position
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.position },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "position",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-row" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(
                                            _vm.__("Address in the Philippines")
                                          ) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.address_ph,
                                        expression: "hsw.address_ph"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.address_ph,
                                      "border-gray-300 ": _vm.hsw.address_ph
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.address_ph },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "address_ph",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-row" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Civil Status")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.cs_worker,
                                        expression: "hsw.cs_worker"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.cs_worker,
                                      "border-gray-300 ": _vm.hsw.cs_worker
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.cs_worker },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "cs_worker",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Contact No.")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.contact_no,
                                        expression: "hsw.contact_no"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.contact_no,
                                      "border-gray-300 ": _vm.hsw.contact_no
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.contact_no },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "contact_no",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-row" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Passport No.")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.passport_no,
                                        expression: "hsw.passport_no"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.passport_no,
                                      "border-gray-300 ": _vm.hsw.passport_no
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.passport_no },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "passport_no",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Date of Issue")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.date_issued,
                                        expression: "hsw.date_issued"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.date_issued,
                                      "border-gray-300 ": _vm.hsw.date_issued
                                    },
                                    attrs: { type: "date" },
                                    domProps: { value: _vm.hsw.date_issued },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "date_issued",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Place of Issue")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.place_issued,
                                        expression: "hsw.place_issued"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.place_issued,
                                      "border-gray-300 ": _vm.hsw.place_issued
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.place_issued },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "place_issued",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-row" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(
                                            _vm.__("Name of Next of Kin")
                                          ) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.kin_name,
                                        expression: "hsw.kin_name"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.kin_name,
                                      "border-gray-300 ": _vm.hsw.kin_name
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.kin_name },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "kin_name",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(
                                            _vm.__(
                                              "Address and Contact Numbers of Next of Kin"
                                            )
                                          ) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.kin_address,
                                        expression: "hsw.kin_address"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.kin_address,
                                      "border-gray-300 ": _vm.hsw.kin_address
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.kin_address },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "kin_address",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ]),
                            _vm._v(" "),
                            _c("label", { staticClass: "text-lg font-bold" }, [
                              _vm._v(_vm._s(_vm.__("Other Details")))
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex flex-row" }, [
                              _c(
                                "div",
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Site of Employment")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.employment_site,
                                        expression: "hsw.employment_site"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw
                                        .employment_site,
                                      "border-gray-300 ":
                                        _vm.hsw.employment_site
                                    },
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.hsw.employment_site
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "employment_site",
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
                                { staticClass: " my-2 flex-grow mx-2" },
                                [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-gray-700 text-sm font-bold mb-2"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        " +
                                          _vm._s(_vm.__("Salary")) +
                                          "\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.hsw.salary,
                                        expression: "hsw.salary"
                                      }
                                    ],
                                    staticClass:
                                      "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                    class: {
                                      "border-red-500": !_vm.hsw.salary,
                                      "border-gray-300 ": _vm.hsw.salary
                                    },
                                    attrs: { type: "text" },
                                    domProps: { value: _vm.hsw.salary },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.hsw,
                                          "salary",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  })
                                ]
                              )
                            ])
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass:
                            "bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                        },
                        [
                          _vm.edit_mode === 0
                            ? _c(
                                "button",
                                {
                                  staticClass:
                                    "w-full inline-flex justify-center rounded-md border-gray-300 border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm",
                                  attrs: { type: "submit" },
                                  on: { click: _vm.saveHSW }
                                },
                                [
                                  _vm._v(
                                    "\n                            Submit & Confirm\n                        "
                                  )
                                ]
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass:
                                "mt-3 w-full inline-flex justify-center rounded-md border-gray-300 border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  _vm.hsw_mdl = false
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                            Cancel\n                        "
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
      ]),
      _vm._v(" "),
      _c("transition", { attrs: { name: "slide-fade" } }, [
        _vm.sw_mdl
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
                        "inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all my-8 align-middle",
                      attrs: {
                        role: "dialog",
                        "aria-modal": "true",
                        "aria-labelledby": "modal-headline"
                      }
                    },
                    [
                      _c("div", { staticClass: "bg-gray-100 p-3" }, [
                        _c("div", { staticClass: "flex flex-col" }, [
                          _c("div", { staticClass: "flex flex-row" }, [
                            _c(
                              "div",
                              {
                                staticClass: "flex-grow font-bold flex-column"
                              },
                              [
                                _c(
                                  "div",
                                  { staticClass: "fw-bolder text-xl" },
                                  [
                                    _vm._v(
                                      "\n                                        " +
                                        _vm._s(
                                          _vm.__(
                                            "STANDARD EMPLOYMENT CONTRACT FOR VARIOUS SKILLS"
                                          )
                                        ) +
                                        "\n                                    "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c("div", { staticClass: "text-gray-500" }, [
                                  _vm._v(
                                    "\n                                        Department of Labor and Employment Philippine Overseas Employment\n                                        Administration\n                                    "
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex-shrink" }, [
                              _c(
                                "button",
                                {
                                  staticClass:
                                    "text-gray-700 hover:text-white hover:bg-red-500 pl-1 pr-1 rounded",
                                  attrs: { type: "button" },
                                  on: {
                                    click: function($event) {
                                      _vm.sw_mdl = false
                                    }
                                  }
                                },
                                [_c("i", { staticClass: "fas fa-times" })]
                              )
                            ])
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _c(
                        "form",
                        { staticClass: "bg-white px-4 pt-4 pb-4 mb-4" },
                        [
                          _c("label", { staticClass: "text-lg font-bold" }, [
                            _vm._v(_vm._s(_vm.__("Employer Details")))
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "flex flex-col" }, [
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Full Name")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.employer_name,
                                    expression: "sw.employer_name"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.employer_name,
                                  "border-gray-300 ": _vm.sw.employer_name
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.employer_name },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "employer_name",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Address")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.employer_address,
                                    expression: "sw.employer_address"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.employer_address,
                                  "border-gray-300 ": _vm.sw.employer_address
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.employer_address },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "employer_address",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "flex flex-row" }, [
                            _c("div", { staticClass: "my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("PO Box No.")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.po_box_no,
                                    expression: "sw.po_box_no"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.po_box_no,
                                  "border-gray-300 ": _vm.sw.po_box_no
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.po_box_no },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "po_box_no",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Telephone")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.telephone,
                                    expression: "sw.telephone"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.telephone,
                                  "border-gray-300 ": _vm.sw.telephone
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.telephone },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "telephone",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Fax")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.fax,
                                    expression: "sw.fax"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.fax,
                                  "border-gray-300 ": _vm.sw.fax
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.fax },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(_vm.sw, "fax", $event.target.value)
                                  }
                                }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("label", { staticClass: "text-lg font-bold" }, [
                            _vm._v(_vm._s(_vm.__("Employee Details")))
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "flex flex-row" }, [
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Full Name")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.employee_name,
                                    expression: "sw.employee_name"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.employee_name,
                                  "border-gray-300 ": _vm.sw.employee_name
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.employee_name },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "employee_name",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Civil Status")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.cs_status,
                                    expression: "sw.cs_status"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.cs_status,
                                  "border-gray-300 ": _vm.sw.cs_status
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.cs_status },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "cs_status",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "flex flex-row" }, [
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Employee Address")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.employee_address,
                                    expression: "sw.employee_address"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.employee_address,
                                  "border-gray-300 ": _vm.sw.employee_address
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.employee_address },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "employee_address",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "flex flex-row" }, [
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Passport No.")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.passport_no,
                                    expression: "sw.passport_no"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.passport_no,
                                  "border-gray-300 ": _vm.sw.passport_no
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.passport_no },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "passport_no",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Date Issued")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.date_issued,
                                    expression: "sw.date_issued"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.date_issued,
                                  "border-gray-300 ": _vm.sw.date_issued
                                },
                                attrs: { type: "date" },
                                domProps: { value: _vm.sw.date_issued },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "date_issued",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Place Issued")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.place_issued,
                                    expression: "sw.place_issued"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.place_issued,
                                  "border-gray-300 ": _vm.sw.place_issued
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.place_issued },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "place_issued",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("label", { staticClass: "text-lg font-bold" }, [
                            _vm._v(_vm._s(_vm.__("Other Details")))
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "flex flex-row" }, [
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Site Of Employment")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.site_of_employment,
                                    expression: "sw.site_of_employment"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.site_of_employment,
                                  "border-gray-300 ": _vm.sw.site_of_employment
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.site_of_employment },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "site_of_employment",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "flex flex-row" }, [
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Position")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.employee_position,
                                    expression: "sw.employee_position"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.employee_position,
                                  "border-gray-300 ": _vm.sw.employee_position
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.employee_position },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "employee_position",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Salary")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.salary,
                                    expression: "sw.salary"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.salary,
                                  "border-gray-300 ": _vm.sw.salary
                                },
                                attrs: { type: "number" },
                                domProps: { value: _vm.sw.salary },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "salary",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "flex flex-row" }, [
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Witness Day")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.witness_day,
                                    expression: "sw.witness_day"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.witness_day,
                                  "border-gray-300 ": _vm.sw.witness_day
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.witness_day },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "witness_day",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Witness Month")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.witness_month,
                                    expression: "sw.witness_month"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.witness_month,
                                  "border-gray-300 ": _vm.sw.witness_month
                                },
                                attrs: { type: "number" },
                                domProps: { value: _vm.sw.witness_month },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "witness_month",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Witness Year")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.witness_year,
                                    expression: "sw.witness_year"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.witness_year,
                                  "border-gray-300 ": _vm.sw.witness_year
                                },
                                attrs: { type: "number" },
                                domProps: { value: _vm.sw.witness_year },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "witness_year",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: " my-2 flex-grow mx-2" }, [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-gray-700 text-sm font-bold mb-2"
                                },
                                [
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(_vm.__("Witness Place")) +
                                      "\n                                "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("input", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.sw.witness_place,
                                    expression: "sw.witness_place"
                                  }
                                ],
                                staticClass:
                                  "shadow appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",
                                class: {
                                  "border-red-500": !_vm.sw.witness_place,
                                  "border-gray-300 ": _vm.sw.witness_place
                                },
                                attrs: { type: "text" },
                                domProps: { value: _vm.sw.witness_place },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.sw,
                                      "witness_place",
                                      $event.target.value
                                    )
                                  }
                                }
                              })
                            ])
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
                          _vm.edit_mode === 0
                            ? _c(
                                "button",
                                {
                                  staticClass:
                                    "w-full inline-flex justify-center rounded-md border-gray-300 border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm",
                                  attrs: { type: "submit" },
                                  on: { click: _vm.saveSW }
                                },
                                [
                                  _vm._v(
                                    "\n                            Submit & Confirm\n                        "
                                  )
                                ]
                              )
                            : _vm._e(),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass:
                                "mt-3 w-full inline-flex justify-center rounded-md border-gray-300 border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  _vm.sw_mdl = false
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                            Cancel\n                        "
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
      ]),
      _vm._v(" "),
      _c("transition", { attrs: { name: "slide-fade" } }, [
        _vm.approval_mdl
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
                        "w-2/4 inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all my-8 align-middle",
                      attrs: {
                        role: "dialog",
                        "aria-modal": "true",
                        "aria-labelledby": "modal-headline"
                      }
                    },
                    [
                      _c("div", { staticClass: "bg-gray-100 p-3" }, [
                        _c("div", { staticClass: "flex flex-col" }, [
                          _c("div", { staticClass: "flex flex-row" }, [
                            _c(
                              "div",
                              {
                                staticClass: "flex-grow font-bold flex-column"
                              },
                              [
                                _c(
                                  "div",
                                  { staticClass: "fw-bolder text-xl" },
                                  [
                                    _vm._v(
                                      "\n                                        Contract "
                                    ),
                                    _c(
                                      "label",
                                      { staticClass: "text-indigo-500" },
                                      [_vm._v(_vm._s(_vm.serial_no))]
                                    ),
                                    _vm._v(
                                      " Approval\n                                    "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c("div", { staticClass: "text-gray-500" })
                              ]
                            ),
                            _vm._v(" "),
                            _c("div", { staticClass: "flex-shrink" }, [
                              _c(
                                "button",
                                {
                                  staticClass:
                                    "text-gray-700 hover:text-white hover:bg-red-500 pl-1 pr-1 rounded",
                                  attrs: { type: "button" },
                                  on: {
                                    click: function($event) {
                                      _vm.approval_mdl = false
                                    }
                                  }
                                },
                                [_c("i", { staticClass: "fas fa-times" })]
                              )
                            ])
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _c(
                        "form",
                        { staticClass: "bg-white px-4 pt-4 pb-4 mb-4" },
                        [
                          _c("div", { staticClass: "flex flex-col" }, [
                            _c("div", [
                              _c("label", [_vm._v("Remarks:")]),
                              _vm._v(" "),
                              _c("textarea", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model",
                                    value: _vm.remarks,
                                    expression: "remarks"
                                  }
                                ],
                                staticClass:
                                  "w-full border-0 bg-gray-100 focus:bg-white rounded text-black outline-none focus:ring-opacity-0",
                                domProps: { value: _vm.remarks },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.remarks = $event.target.value
                                  }
                                }
                              })
                            ])
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
                                "mx-2 mt-3 w-auto inline-flex justify-center rounded-md shadow-sm px-2 py-2 font-bold text-white bg-green-400 hover:bg-green-600",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  return _vm.updateContract("Approved")
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                            I will Approve this contract\n                        "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass:
                                "mx-2 mt-3 w-auto inline-flex justify-center rounded-md shadow-sm px-2 py-2 font-bold text-white bg-red-400 hover:bg-red-600",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  return _vm.updateContract("Declined")
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                            I will Decline this contract\n                        "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass:
                                "mx-2 mt-3 w-auto inline-flex justify-center rounded-md shadow-sm px-2 py-2 font-bold text-white bg-gray-400 hover:bg-gray-600",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  _vm.approval_mdl = false
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                            Cancel\n                        "
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
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "w-full mx-auto sm:px-6 lg:px-8" }, [
      _c(
        "div",
        { staticClass: "bg-white overflow-auto shadow-sm sm:rounded-lg" },
        [
          _c("div", { staticClass: "p-2 mt-5" }),
          _vm._v(" "),
          _c("div", { staticClass: "p-5" }, [
            _c("table", {
              staticClass: "stripe hover",
              staticStyle: { width: "100%" },
              attrs: { id: "contracts-table" }
            })
          ])
        ]
      )
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

/***/ "./resources/js/view/Contracts.vue":
/*!*****************************************!*\
  !*** ./resources/js/view/Contracts.vue ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Contracts_vue_vue_type_template_id_eb150dd6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Contracts.vue?vue&type=template&id=eb150dd6& */ "./resources/js/view/Contracts.vue?vue&type=template&id=eb150dd6&");
/* harmony import */ var _Contracts_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Contracts.vue?vue&type=script&lang=js& */ "./resources/js/view/Contracts.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Contracts_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Contracts_vue_vue_type_template_id_eb150dd6___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Contracts_vue_vue_type_template_id_eb150dd6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/view/Contracts.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/view/Contracts.vue?vue&type=script&lang=js&":
/*!******************************************************************!*\
  !*** ./resources/js/view/Contracts.vue?vue&type=script&lang=js& ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Contracts_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Contracts.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Contracts.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Contracts_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/view/Contracts.vue?vue&type=template&id=eb150dd6&":
/*!************************************************************************!*\
  !*** ./resources/js/view/Contracts.vue?vue&type=template&id=eb150dd6& ***!
  \************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Contracts_vue_vue_type_template_id_eb150dd6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Contracts.vue?vue&type=template&id=eb150dd6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Contracts.vue?vue&type=template&id=eb150dd6&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Contracts_vue_vue_type_template_id_eb150dd6___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Contracts_vue_vue_type_template_id_eb150dd6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);