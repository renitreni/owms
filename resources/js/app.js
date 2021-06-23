require('./bootstrap');
require('alpinejs');
require('@claviska/jquery-minicolors/jquery.minicolors');

window.Swal = require('sweetalert2');

Vue.component('chat-box', () =>
    import ('./view/ChatBox.vue')
);
Vue.component('vouchers-page', () =>
    import ('./view/Vouchers.vue')
);
Vue.component('agency-page', () =>
    import ('./view/Agency.vue')
);

Vue.component('contracts-page', () =>
    import ('./view/Contracts.vue')
);

Vue.mixin(require('./trans'));

import Echo from 'laravel-echo';
import { lowerFirst } from 'lodash';
import Pusher from "pusher-js";

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,
    forceTLS: true,
});

window.catchError = function (excp) {
    var errors = excp.response.data.errors;
    var message = '';
    console.log(excp.response.status);
    $.each(errors, function (key, idx) {
        message += '<strong>' + key + '</strong> <br>'
        $.each(idx, function (key2, idx2) {
            message += '* ' + idx2 + '<br>'
        });
    });
    if (excp.response.status == 403) {
        Swal.fire({
            icon: 'error',
            title: 'Unathorized Action',
            html: excp.response.statusText,
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Please try again.',
            html: message,
        });
    }
};
