require('./bootstrap');

require('alpinejs');

Vue.component('chat-box', () =>
    import ('./view/ChatBox.vue')
);
Vue.component('vouchers-page', () =>
    import ('./view/Vouchers.vue')
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