require('./bootstrap');
require('alpinejs');
require('@claviska/jquery-minicolors/jquery.minicolors');
Vue.component('chat-box', () =>
    import ('./view/ChatBox.vue')
);
Vue.component('vouchers-page', () =>
    import ('./view/Vouchers.vue')
);
Vue.component('agency-page', () =>
    import ('./view/Agency.vue')
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
