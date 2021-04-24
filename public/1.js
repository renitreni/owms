(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/ChatBox.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/view/ChatBox.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["data"],
  data: function data() {
    return {
      hide_panel: true,
      props_data: JSON.parse(this._props.data),
      overview: {
        message: ""
      }
    };
  },
  methods: {
    selfDestruct: function selfDestruct() {
      console.log(this.$el);
    },
    sendChat: function sendChat() {
      var $this = this;

      if ($this.overview.message === "") {
        return false;
      }

      axios.post(this.props_data.send_link, this.overview).then(function () {
        $this.overview.message = "";
      });
    }
  },
  mounted: function mounted() {
    Echo.channel("form-ofw").listen("chat-line-" + this.props_data.line_id, function (e) {
      console.log(e);
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/ChatBox.vue?vue&type=template&id=88a50e72&":
/*!****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/view/ChatBox.vue?vue&type=template&id=88a50e72& ***!
  \****************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "bg-white bottom-0 right-2 w-full" }, [
    _c(
      "nav",
      {
        staticClass: "w-full h-10 bg-blue-400 flex justify-between items-center"
      },
      [
        _c("div", { staticClass: "flex justify-center items-center" }, [
          _c("i", {
            staticClass: "mdi mdi-arrow-left font-normal text-gray-300 ml-1"
          }),
          _vm._v(" "),
          _c(
            "span",
            { staticClass: "text-base font-bold font-medium text-white ml-1" },
            [_vm._v("Alex cairo Chat Line: " + _vm._s(_vm.props_data.line_id))]
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "flex items-center" })
      ]
    ),
    _vm._v(" "),
    _c("div", [
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "flex justify-between items-center p-4" }, [
        _c("div", { staticClass: "flex flex-grow" }, [
          _c("input", {
            directives: [
              {
                name: "model",
                rawName: "v-model",
                value: _vm.overview.message,
                expression: "overview.message"
              }
            ],
            staticClass:
              "border-0 rounded-md pl-6 pr-12 mr-2 py-2 w-full focus:outline-none h-auto placeholder-gray-400 bg-gray-200 focus:bg-gray-100",
            staticStyle: { "font-size": "11px" },
            attrs: {
              type: "text",
              placeholder: "Type a message...",
              id: "typemsg"
            },
            domProps: { value: _vm.overview.message },
            on: {
              keyup: function($event) {
                if (
                  !$event.type.indexOf("key") &&
                  _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                ) {
                  return null
                }
                return _vm.sendChat()
              },
              input: function($event) {
                if ($event.target.composing) {
                  return
                }
                _vm.$set(_vm.overview, "message", $event.target.value)
              }
            }
          })
        ]),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass:
              "w-7 h-7 rounded-full bg-blue-300 text-center items-center flex justify-center"
          },
          [
            _c(
              "button",
              {
                staticClass:
                  "w-7 h-7 rounded-full text-center items-center flex justify-center outline-none hover:bg-gray-300 hover:text-white",
                on: {
                  click: function($event) {
                    return _vm.sendChat()
                  }
                }
              },
              [_c("i", { staticClass: "fas fa-paper-plane" })]
            )
          ]
        )
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "overflow-auto px-1 py-1",
        staticStyle: { height: "35rem" },
        attrs: { id: "journal-scroll" }
      },
      [
        _c("div", { staticClass: "flex items-center pr-10" }, [
          _c(
            "span",
            {
              staticClass:
                "shadow-md flex ml-1 h-auto bg-gray-500 text-gray-200 text-base font-bold rounded-sm px-1 p-1 items-end rounded",
              staticStyle: { "font-size": "10px" }
            },
            [
              _vm._v(
                "\n          Hi Dr.Hendrikson, I haven't been feeling well for past few days.\n          "
              ),
              _c(
                "span",
                {
                  staticClass: "text-white pl-1",
                  staticStyle: { "font-size": "8px" }
                },
                [_vm._v("01:25am")]
              )
            ]
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "flex justify-end pt-2 pl-10" }, [
          _c(
            "span",
            {
              staticClass:
                "shadow-md bg-blue-400 h-auto text-white text-base font-bold rounded-sm px-1 p-1 items-end flex justify-end rounded",
              staticStyle: { "font-size": "10px" }
            },
            [
              _vm._v("\n          Lets jump on a video call.\n          "),
              _c(
                "span",
                {
                  staticClass: "text-white pl-1",
                  staticStyle: { "font-size": "8px" }
                },
                [_vm._v("02.30am")]
              )
            ]
          )
        ]),
        _vm._v(" "),
        _c("div", { attrs: { id: "chatmsg" } })
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

/***/ "./resources/js/view/ChatBox.vue":
/*!***************************************!*\
  !*** ./resources/js/view/ChatBox.vue ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ChatBox_vue_vue_type_template_id_88a50e72___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ChatBox.vue?vue&type=template&id=88a50e72& */ "./resources/js/view/ChatBox.vue?vue&type=template&id=88a50e72&");
/* harmony import */ var _ChatBox_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ChatBox.vue?vue&type=script&lang=js& */ "./resources/js/view/ChatBox.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ChatBox_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ChatBox_vue_vue_type_template_id_88a50e72___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ChatBox_vue_vue_type_template_id_88a50e72___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/view/ChatBox.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/view/ChatBox.vue?vue&type=script&lang=js&":
/*!****************************************************************!*\
  !*** ./resources/js/view/ChatBox.vue?vue&type=script&lang=js& ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ChatBox_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./ChatBox.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/ChatBox.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ChatBox_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/view/ChatBox.vue?vue&type=template&id=88a50e72&":
/*!**********************************************************************!*\
  !*** ./resources/js/view/ChatBox.vue?vue&type=template&id=88a50e72& ***!
  \**********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ChatBox_vue_vue_type_template_id_88a50e72___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./ChatBox.vue?vue&type=template&id=88a50e72& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/view/ChatBox.vue?vue&type=template&id=88a50e72&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ChatBox_vue_vue_type_template_id_88a50e72___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ChatBox_vue_vue_type_template_id_88a50e72___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);