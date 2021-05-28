(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Agency.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/view/Agency.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************/
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
__webpack_require__(/*! @claviska/jquery-minicolors/jquery.minicolors */ "./node_modules/@claviska/jquery-minicolors/jquery.minicolors.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["data"],
  data: function data() {
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
      alert_form: {
        color_level: '',
        description: '',
        name: ''
      },
      overview: {
        name: null,
        address: null,
        logo: '',
        poea: null
      }
    };
  },
  watch: {},
  methods: {
    onColorSelect: function onColorSelect(hue) {
      console.log(hue);
    },
    showLevelMdl: function showLevelMdl() {
      this.level_mdl = true;
    },
    showMdl: function showMdl() {
      this.overview = {
        name: null,
        address: null,
        logo: '',
        poea: null
      };
      this.agency_mdl = true;
    },
    deletion: function deletion() {
      var $this = this;
      axios["delete"](this.overview.delete_link).then(function () {
        $this.dt.draw();
        $this.agency_update_mdl = false;
      });
    },
    update: function update() {
      var $this = this;
      var formData = new FormData();
      formData.append('id', this.overview.id);
      formData.append('_method', 'PATCH');
      formData.append('logo', $this.overview.logo);
      formData.append('logo_path', $this.overview.logo_path);
      formData.append('name', $this.overview.name);
      formData.append('address', $this.overview.address);
      formData.append('poea', $this.overview.poea);
      formData.append('status', $this.overview.status);
      axios.post($this.overview.update_link, formData).then(function () {
        $this.dt.draw();
        $this.agency_update_mdl = false;
      });
    },
    fileUpload: function fileUpload(e) {
      console.log(e.target.files);
      this.overview.logo = e.target.files[0];
    },
    add: function add() {
      var $this = this;
      var formData = new FormData();
      formData.append('logo', this.overview.logo);
      formData.append('name', this.overview.name);
      formData.append('address', this.overview.address);
      formData.append('poea', this.overview.poea);
      formData.append('status', $this.overview.status);
      axios.post(this.props_data.store_link, formData).then(function () {
        $this.dt.draw();
        $this.agency_mdl = false;
      });
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
        data: "name",
        name: "name",
        title: "Company Name"
      }, {
        data: "poea",
        name: "poea",
        title: "POEA No."
      }, {
        data: function data(value) {
          if (value.status === 'active') {
            return '<span class="bg-green-300 shadow-sm p-1 rounded text-white block text-center">Active</span>';
          }

          return '<span class="bg-red-500 shadow-sm p-1 rounded text-white block text-center">BLOCKED</span>';
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
          $this.agency_update_mdl = true;
        });
        $('#colorPicker').minicolors({
          change: null,
          hide: null,
          show: function show() {}
        });
      }
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Agency.vue?vue&type=template&id=9f15977e&":
/*!***************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/view/Agency.vue?vue&type=template&id=9f15977e& ***!
  \***************************************************************************************************************************************************************************************************/
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
      _c("div", { staticClass: "w-full mx-auto sm:px-6 lg:px-8" }, [
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
                  on: { click: _vm.showMdl }
                },
                [
                  _c("i", { staticClass: "fas fa-building" }),
                  _vm._v(
                    " " + _vm._s(_vm.__("New Agency")) + "\n\n                "
                  )
                ]
              ),
              _vm._v(" "),
              _c(
                "a",
                {
                  staticClass:
                    "text-white bg-indigo-500 hover:bg-indigo-600 p-2 rounded m-2 shadow",
                  attrs: { href: "#" },
                  on: { click: _vm.showLevelMdl }
                },
                [
                  _c("i", { staticClass: "fas fa-exclamation-triangle" }),
                  _vm._v(
                    " " + _vm._s(_vm.__("Alert Levels")) + "\n                "
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
        _vm.agency_mdl
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
                              [_c("i", { staticClass: "fas fa-building" })]
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
                                      "\n                                    New Agency\n                                    "
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
                                      _c("label", [_vm._v("Name")]),
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
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
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
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Address")]),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.address,
                                            expression: "overview.address"
                                          }
                                        ],
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.address
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "address",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("POEA No.")]),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.poea,
                                            expression: "overview.poea"
                                          }
                                        ],
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: { type: "text" },
                                        domProps: { value: _vm.overview.poea },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "poea",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Status")]),
                                      _vm._v(" "),
                                      _c(
                                        "select",
                                        {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.overview.status,
                                              expression: "overview.status"
                                            }
                                          ],
                                          staticClass:
                                            "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                          on: {
                                            change: function($event) {
                                              var $$selectedVal = Array.prototype.filter
                                                .call(
                                                  $event.target.options,
                                                  function(o) {
                                                    return o.selected
                                                  }
                                                )
                                                .map(function(o) {
                                                  var val =
                                                    "_value" in o
                                                      ? o._value
                                                      : o.value
                                                  return val
                                                })
                                              _vm.$set(
                                                _vm.overview,
                                                "status",
                                                $event.target.multiple
                                                  ? $$selectedVal
                                                  : $$selectedVal[0]
                                              )
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            { attrs: { value: "active" } },
                                            [_vm._v("Active")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "not active" } },
                                            [_vm._v("Not Active")]
                                          )
                                        ]
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Logo")]),
                                      _vm._v(" "),
                                      _c("input", {
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: { type: "file" },
                                        on: { change: _vm.fileUpload }
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
                            [
                              _vm._v(
                                "\n                            Add\n                        "
                              )
                            ]
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
                                  _vm.agency_mdl = false
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
        _vm.agency_update_mdl
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
                              [_c("i", { staticClass: "fas fa-building" })]
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
                                      "text-lg leading-6 font-medium text-gray-900"
                                  },
                                  [
                                    _vm._v(
                                      "\n                                    Update Agency\n                                    "
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
                                      _c("label", [_vm._v("Name")]),
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
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
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
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Address")]),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.address,
                                            expression: "overview.address"
                                          }
                                        ],
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: { type: "text" },
                                        domProps: {
                                          value: _vm.overview.address
                                        },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "address",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("POEA No.")]),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.overview.poea,
                                            expression: "overview.poea"
                                          }
                                        ],
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: { type: "text" },
                                        domProps: { value: _vm.overview.poea },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.overview,
                                              "poea",
                                              $event.target.value
                                            )
                                          }
                                        }
                                      })
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Status")]),
                                      _vm._v(" "),
                                      _c(
                                        "select",
                                        {
                                          directives: [
                                            {
                                              name: "model",
                                              rawName: "v-model",
                                              value: _vm.overview.status,
                                              expression: "overview.status"
                                            }
                                          ],
                                          staticClass:
                                            "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                          on: {
                                            change: function($event) {
                                              var $$selectedVal = Array.prototype.filter
                                                .call(
                                                  $event.target.options,
                                                  function(o) {
                                                    return o.selected
                                                  }
                                                )
                                                .map(function(o) {
                                                  var val =
                                                    "_value" in o
                                                      ? o._value
                                                      : o.value
                                                  return val
                                                })
                                              _vm.$set(
                                                _vm.overview,
                                                "status",
                                                $event.target.multiple
                                                  ? $$selectedVal
                                                  : $$selectedVal[0]
                                              )
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "option",
                                            { attrs: { value: "active" } },
                                            [_vm._v("Active")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "not active" } },
                                            [_vm._v("Not Active")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "option",
                                            { attrs: { value: "Maltreated" } },
                                            [_vm._v("Maltreated")]
                                          )
                                        ]
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("img", {
                                        staticClass: "h-36",
                                        attrs: { src: _vm.overview.logo_path }
                                      })
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "mt-2" }, [
                                      _c("label", [_vm._v("Logo")]),
                                      _vm._v(" "),
                                      _c("input", {
                                        staticClass:
                                          "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                        attrs: { type: "file" },
                                        on: { change: _vm.fileUpload }
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
                              on: { click: _vm.update }
                            },
                            [
                              _vm._v(
                                "\n                            Update\n                        "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass:
                                "w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm",
                              attrs: { type: "submit" },
                              on: { click: _vm.deletion }
                            },
                            [
                              _vm._v(
                                "\n                            Delete\n                        "
                              )
                            ]
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
                                  _vm.agency_update_mdl = false
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
        _vm.level_mdl
          ? _c("div", { staticClass: "fixed inset-0 overflow-y-auto" }, [
              _c(
                "div",
                {
                  staticClass:
                    "flex items-end justify-center min-h-screen px-4 pb-20 text-center sm:block sm:p-0"
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
                                  staticClass: "fas fa-exclamation-triangle"
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
                                      "text-lg leading-6 font-medium text-gray-900"
                                  },
                                  [
                                    _vm._v(
                                      "\n                                    Alert Levels\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c("div", { staticClass: "mt-4" }, [
                                  _c("div", { staticClass: "bg-white" }, [
                                    _c(
                                      "nav",
                                      {
                                        staticClass: "flex flex-col sm:flex-row"
                                      },
                                      [
                                        _c(
                                          "button",
                                          {
                                            staticClass:
                                              "text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none",
                                            class: {
                                              "text-blue-500 border-b-2 font-medium border-blue-500":
                                                _vm.tab === 1
                                            },
                                            on: {
                                              click: function($event) {
                                                _vm.tab = 1
                                              }
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                Levels\n                                            "
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "button",
                                          {
                                            staticClass:
                                              "text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none",
                                            class: {
                                              "text-blue-500 border-b-2 font-medium border-blue-500":
                                                _vm.tab === 2
                                            },
                                            on: {
                                              click: function($event) {
                                                _vm.tab = 2
                                              }
                                            }
                                          },
                                          [
                                            _vm._v(
                                              "\n                                                Add Level\n                                            "
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _vm.tab === 1
                                    ? _c("div", {
                                        staticClass: "flex flex-col"
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _vm.tab === 2
                                    ? _c(
                                        "div",
                                        { staticClass: "flex flex-col" },
                                        [
                                          _c("div", { staticClass: "mt-2" }, [
                                            _c("label", [_vm._v("Color")]),
                                            _vm._v(" "),
                                            _c("input", {
                                              staticClass:
                                                "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                              attrs: {
                                                type: "text",
                                                id: "colorPicker",
                                                value: "#ff6161"
                                              }
                                            })
                                          ]),
                                          _vm._v(" "),
                                          _c("div", { staticClass: "mt-2" }, [
                                            _c("label", [_vm._v("Name")]),
                                            _c("input", {
                                              directives: [
                                                {
                                                  name: "model",
                                                  rawName: "v-model",
                                                  value: _vm.alert_form.name,
                                                  expression: "alert_form.name"
                                                }
                                              ],
                                              staticClass:
                                                "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                              attrs: { type: "text" },
                                              domProps: {
                                                value: _vm.alert_form.name
                                              },
                                              on: {
                                                input: function($event) {
                                                  if ($event.target.composing) {
                                                    return
                                                  }
                                                  _vm.$set(
                                                    _vm.alert_form,
                                                    "name",
                                                    $event.target.value
                                                  )
                                                }
                                              }
                                            })
                                          ]),
                                          _vm._v(" "),
                                          _c("div", { staticClass: "mt-2" }, [
                                            _c("label", [
                                              _vm._v("Description")
                                            ]),
                                            _vm._v(" "),
                                            _c("input", {
                                              directives: [
                                                {
                                                  name: "model",
                                                  rawName: "v-model",
                                                  value:
                                                    _vm.alert_form.description,
                                                  expression:
                                                    "alert_form.description"
                                                }
                                              ],
                                              staticClass:
                                                "w-full border-0 bg-gray-100 rounded text-black outline-none focus:ring-opacity-0",
                                              attrs: { type: "text" },
                                              domProps: {
                                                value:
                                                  _vm.alert_form.description
                                              },
                                              on: {
                                                input: function($event) {
                                                  if ($event.target.composing) {
                                                    return
                                                  }
                                                  _vm.$set(
                                                    _vm.alert_form,
                                                    "description",
                                                    $event.target.value
                                                  )
                                                }
                                              }
                                            })
                                          ])
                                        ]
                                      )
                                    : _vm._e()
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
                              on: { click: _vm.update }
                            },
                            [
                              _vm._v(
                                "\n                            Update\n                        "
                              )
                            ]
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
                                  _vm.level_mdl = false
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

/***/ "./resources/js/view/Agency.vue":
/*!**************************************!*\
  !*** ./resources/js/view/Agency.vue ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Agency_vue_vue_type_template_id_9f15977e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Agency.vue?vue&type=template&id=9f15977e& */ "./resources/js/view/Agency.vue?vue&type=template&id=9f15977e&");
/* harmony import */ var _Agency_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Agency.vue?vue&type=script&lang=js& */ "./resources/js/view/Agency.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Agency_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Agency_vue_vue_type_template_id_9f15977e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Agency_vue_vue_type_template_id_9f15977e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/view/Agency.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/view/Agency.vue?vue&type=script&lang=js&":
/*!***************************************************************!*\
  !*** ./resources/js/view/Agency.vue?vue&type=script&lang=js& ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Agency_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Agency.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Agency.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Agency_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/view/Agency.vue?vue&type=template&id=9f15977e&":
/*!*********************************************************************!*\
  !*** ./resources/js/view/Agency.vue?vue&type=template&id=9f15977e& ***!
  \*********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Agency_vue_vue_type_template_id_9f15977e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Agency.vue?vue&type=template&id=9f15977e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/Agency.vue?vue&type=template&id=9f15977e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Agency_vue_vue_type_template_id_9f15977e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Agency_vue_vue_type_template_id_9f15977e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);