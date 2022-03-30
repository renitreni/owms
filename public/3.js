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
          if (value.status == "cancelled") return '<span class="block text-center text-red-500"><i class="fas fa-ban"></i></span>';else return '<span class="block text-center text-green-500"><i class="fas fa-check"></i></span>';
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
    { staticClass: "pt-8 pb-12" },
    [
      _c("div", { staticClass: "mx-auto max-w-7xl sm:px-6 lg:px-8" }, [
        _c(
          "div",
          { staticClass: "overflow-hidden bg-white shadow-sm sm:rounded-lg" },
          [
            _c("div", { staticClass: "p-2 mt-5" }, [
              _c(
                "a",
                {
                  staticClass:
                    "p-2 m-2 text-white bg-green-400 rounded shadow hover:bg-green-500",
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
                    "p-2 m-2 text-white bg-indigo-400 rounded shadow hover:bg-indigo-500",
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
                    "flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"
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
                        {
                          staticClass: "px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4"
                        },
                        [
                          _c("div", { staticClass: "sm:flex sm:items-start" }, [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto text-gray-600 bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10"
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
                                      "text-lg font-medium leading-6 text-gray-900",
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
                                _c("div", { staticClass: "mt-6" })
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
                          _c(
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
                            [_vm._v("\n              Add\n            ")]
                          ),
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