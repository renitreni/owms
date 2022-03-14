(window.webpackJsonp=window.webpackJsonp||[]).push([[4],{2:function(t,e,s){"use strict";function a(t,e,s,a,i,n,o,r){var l,d="function"==typeof t?t.options:t;if(e&&(d.render=e,d.staticRenderFns=s,d._compiled=!0),a&&(d.functional=!0),n&&(d._scopeId="data-v-"+n),o?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),i&&i.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(o)},d._ssrRegister=l):i&&(l=r?function(){i.call(this,(d.functional?this.parent:this).$root.$options.shadowRoot)}:i),l)if(d.functional){d._injectStyles=l;var c=d.render;d.render=function(t,e){return l.call(e),c(t,e)}}else{var u=d.beforeCreate;d.beforeCreate=u?[].concat(u,l):[l]}return{exports:t,options:d}}s.d(e,"a",(function(){return a}))},51:function(t,e,s){"use strict";s.r(e);var a={props:["data"],data:function(){return{voucher_mdl:!1,voucher_update_mdl:!1,props_data:JSON.parse(this._props.data),dt:null,overview:{date:null,paid_to:null,particulars:null,amount:null}}},watch:{voucher_update_mdl:function(t){t||(this.overview={date:null,paid_to:null,particulars:null,amount:null})},voucher_mdl:function(t){t||(this.overview={date:null,paid_to:null,particulars:null,amount:null})}},methods:{add:function(){var t=this;axios.post(this.props_data.store_link,this.overview).then((function(e){t.voucher_mdl=!1,swal("Success!","Operation Successful!","success"),t.dt.draw()}))},update:function(){var t=this;axios.put(this.overview.update_link,this.overview).then((function(e){t.voucher_update_mdl=!1,swal("Success!","Operation Successful!","success"),t.dt.draw()}))},invalid:function(){var t=this;axios.post(this.overview.invalid_link,this.overview).then((function(e){t.voucher_update_mdl=!1,swal("Success!","Operation Successful!","success"),t.dt.draw()}))},getCopy:function(){window.open(this.overview.cash_voucherlink,"_blank")}},mounted:function(){var t=this;t.dt=$("#vouchers-table").DataTable({responsive:!0,serverSide:!0,scrollX:!0,order:[[0,"desc"]],ajax:{url:t.props_data.datatable_link,type:"POST"},columns:[{data:"id",name:"id",title:"ID"},{data:"paid_to",name:"paid_to",title:"Paid To"},{data:"amount",name:"amount",title:"Amount"},{data:"change",name:"change",title:"Change"},{data:function(t){return"cancelled"==t.status?'<span class="block text-center text-red-500"><i class="fas fa-ban"></i></span>':'<span class="block text-center text-green-500"><i class="fas fa-check"></i></span>'},name:"status",title:"Status"},{data:"created_at_display",name:"created_at",title:"Date Created"}],drawCallback:function(){$("table tr").click((function(e){var s=$(this),a=t.dt.row(s).data();console.log(a),t.overview=a,t.voucher_update_mdl=!0}))}})}},i=s(2),n=Object(i.a)(a,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"pt-8 pb-12"},[s("div",{staticClass:"mx-auto max-w-7xl sm:px-6 lg:px-8"},[s("div",{staticClass:"overflow-hidden bg-white shadow-sm sm:rounded-lg"},[s("div",{staticClass:"p-2 mt-5"},[s("a",{staticClass:"p-2 m-2 text-white bg-green-400 rounded shadow hover:bg-green-500",attrs:{href:"#"},on:{click:function(e){t.voucher_mdl=!0}}},[s("i",{staticClass:"fas fa-file-invoice-dollar"}),t._v(" "+t._s(t.__("New Voucher"))+"\n\n        ")]),t._v(" "),s("a",{staticClass:"p-2 m-2 text-white bg-indigo-400 rounded shadow hover:bg-indigo-500",attrs:{href:t.props_data.export_link,target:"_blank"}},[s("i",{staticClass:"fas fa-file-excel"}),t._v(" "+t._s(t.__("Export to Excel"))+"\n\n        ")])]),t._v(" "),t._m(0)])]),t._v(" "),s("transition",{attrs:{name:"slide-fade"}},[t.voucher_mdl?s("div",{staticClass:"fixed inset-0 overflow-y-auto"},[s("div",{staticClass:"flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"},[s("div",{staticClass:"fixed inset-0 transition-opacity",attrs:{"aria-hidden":"true"}},[s("div",{staticClass:"absolute inset-0 bg-gray-500 opacity-75"})]),t._v(" "),s("span",{staticClass:"hidden sm:inline-block sm:align-middle sm:h-screen",attrs:{"aria-hidden":"true"}},[t._v("​")]),t._v(" "),s("div",{staticClass:"inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full",attrs:{role:"dialog","aria-modal":"true","aria-labelledby":"modal-headline"}},[s("div",{staticClass:"px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4"},[s("div",{staticClass:"sm:flex sm:items-start"},[s("div",{staticClass:"flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto text-gray-600 bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10"},[s("i",{staticClass:"fas fa-file-invoice-dollar"})]),t._v(" "),s("div",{staticClass:"flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"},[s("h3",{staticClass:"text-lg font-medium leading-6 text-gray-900",attrs:{id:"modal-headline"}},[t._v("\n                  New Voucher\n                  "),s("span",{staticClass:"underline"}),t._v(" "),s("input",{staticClass:"hidden",attrs:{name:"id"}})]),t._v(" "),s("div",{staticClass:"mt-6"},[s("div",{staticClass:"flex flex-col"},[s("div",{staticClass:"mt-2"},[s("label",[t._v("Date")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.overview.date,expression:"overview.date"}],staticClass:"w-full text-black bg-gray-100 border-0 rounded outline-none focus:ring-opacity-0",attrs:{type:"date",name:"salary_date"},domProps:{value:t.overview.date},on:{input:function(e){e.target.composing||t.$set(t.overview,"date",e.target.value)}}})]),t._v(" "),s("div",{staticClass:"mt-2"},[s("label",[t._v("Amount")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.overview.amount,expression:"overview.amount"}],staticClass:"w-full text-black bg-gray-100 border-0 rounded outline-none focus:ring-opacity-0",attrs:{type:"number",name:"salary_date"},domProps:{value:t.overview.amount},on:{input:function(e){e.target.composing||t.$set(t.overview,"amount",e.target.value)}}})]),t._v(" "),s("div",{staticClass:"mt-2"},[s("label",[t._v("Paid To")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.overview.paid_to,expression:"overview.paid_to"}],staticClass:"w-full text-black bg-gray-100 border-0 rounded outline-none focus:ring-opacity-0",attrs:{type:"text",name:"salary_date"},domProps:{value:t.overview.paid_to},on:{input:function(e){e.target.composing||t.$set(t.overview,"paid_to",e.target.value)}}})]),t._v(" "),s("div",{staticClass:"mt-2"},[s("label",[t._v("Particulars")]),t._v(" "),s("textarea",{directives:[{name:"model",rawName:"v-model",value:t.overview.particulars,expression:"overview.particulars"}],staticClass:"w-full text-black bg-gray-100 border-0 rounded outline-none focus:ring-opacity-0",attrs:{type:"text",name:"salary_date"},domProps:{value:t.overview.particulars},on:{input:function(e){e.target.composing||t.$set(t.overview,"particulars",e.target.value)}}})])])])])])]),t._v(" "),s("div",{staticClass:"px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse"},[s("button",{staticClass:"inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm",attrs:{type:"submit"},on:{click:function(e){return t.add()}}},[t._v("\n              Add\n            ")]),t._v(" "),s("button",{staticClass:"inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm",attrs:{type:"button"},on:{click:function(e){t.voucher_mdl=!1}}},[t._v("\n              Cancel\n            ")])])])])]):t._e()]),t._v(" "),s("transition",{attrs:{name:"slide-fade"}},[t.voucher_update_mdl?s("div",{staticClass:"fixed inset-0 overflow-y-auto"},[s("div",{staticClass:"flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"},[s("div",{staticClass:"fixed inset-0 transition-opacity",attrs:{"aria-hidden":"true"}},[s("div",{staticClass:"absolute inset-0 bg-gray-500 opacity-75"})]),t._v(" "),s("span",{staticClass:"hidden sm:inline-block sm:align-middle sm:h-screen",attrs:{"aria-hidden":"true"}},[t._v("​")]),t._v(" "),s("div",{staticClass:"inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full",attrs:{role:"dialog","aria-modal":"true","aria-labelledby":"modal-headline"}},[s("div",{staticClass:"px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4"},[s("div",{staticClass:"sm:flex sm:items-start"},[s("div",{staticClass:"flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto text-gray-600 bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10"},[s("i",{staticClass:"fas fa-file-invoice-dollar"})]),t._v(" "),s("div",{staticClass:"flex-1 mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"},[s("h3",{staticClass:"text-lg font-medium leading-6 text-gray-900",attrs:{id:"modal-headline"}},[t._v("\n                  New Voucher\n                  "),s("span",{staticClass:"underline"}),t._v(" "),s("input",{staticClass:"hidden",attrs:{name:"id"}})]),t._v(" "),s("div",{staticClass:"mt-6"},[s("div",{staticClass:"flex flex-col"},[s("div",{staticClass:"mt-2"},[s("label",[t._v("Date")]),t._v(" "),s("p",{staticClass:"font-bold"},[t._v(t._s(t.overview.date))])]),t._v(" "),s("div",{staticClass:"mt-2"},[s("label",[t._v("Amount")]),t._v(" "),s("p",{staticClass:"font-bold"},[t._v(t._s(t.overview.amount))])]),t._v(" "),s("div",{staticClass:"mt-2"},[s("label",[t._v("Paid To")]),t._v(" "),s("p",{staticClass:"font-bold"},[t._v(t._s(t.overview.paid_to))])]),t._v(" "),s("div",{staticClass:"mt-2"},[s("label",[t._v("Particulars")]),t._v(" "),s("p",{staticClass:"font-bold"},[t._v(t._s(t.overview.particulars))])]),t._v(" "),s("div",{staticClass:"mt-2"},[s("label",[t._v("Status")]),t._v(" "),s("select",{directives:[{name:"model",rawName:"v-model",value:t.overview.status,expression:"overview.status"}],staticClass:"w-full text-black bg-gray-100 border-0 rounded outline-none focus:ring-opacity-0",on:{change:function(e){var s=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){return"_value"in t?t._value:t.value}));t.$set(t.overview,"status",e.target.multiple?s:s[0])}}},[s("option",{attrs:{value:"active"}},[t._v("active")]),t._v(" "),s("option",{attrs:{value:"cancelled"}},[t._v("cancelled")])])]),t._v(" "),s("div",{staticClass:"mt-2"},[s("label",[t._v("Change")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.overview.change,expression:"overview.change"}],staticClass:"w-full text-black bg-gray-100 border-0 rounded outline-none focus:ring-opacity-0",attrs:{type:"number"},domProps:{value:t.overview.change},on:{input:function(e){e.target.composing||t.$set(t.overview,"change",e.target.value)}}})])])])])])]),t._v(" "),s("div",{staticClass:"px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse"},[s("button",{staticClass:"inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm",attrs:{type:"button"},on:{click:function(e){return t.update()}}},[t._v("\n              Update\n            ")]),t._v(" "),s("button",{staticClass:"inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm",attrs:{type:"button"},on:{click:function(e){return t.getCopy()}}},[t._v("\n              Print Cash Voucher\n            ")]),t._v(" "),s("button",{staticClass:"inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm",attrs:{type:"submit"},on:{click:function(e){return t.invalid()}}},[t._v("\n              Delete\n            ")]),t._v(" "),s("button",{staticClass:"inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm",attrs:{type:"button"},on:{click:function(e){t.voucher_update_mdl=!1}}},[t._v("\n              Cancel\n            ")])])])])]):t._e()])],1)}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"p-5"},[e("table",{staticClass:"stripe hover",staticStyle:{width:"100%"},attrs:{id:"vouchers-table"}})])}],!1,null,null,null);e.default=n.exports}}]);