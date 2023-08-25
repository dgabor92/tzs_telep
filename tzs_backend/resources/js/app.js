import Vue from 'vue';
import store from '~/store';
import router from '~/router';
import i18n from '~/plugins/i18n';
import App from '~/components/App';

import '~/plugins';
import '~/components';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';

import '@mdi/font/css/materialdesignicons.css';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import { mapGetters } from 'vuex';

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.use(Vuetify, {
    icons: {
        iconfont: 'mdi',
    },
});

Vue.config.productionTip = false;

const vuetify = new Vuetify();

new Vue({
    el: '#app',
    i18n,
    router,
    store,
    vuetify,
    ...App,
});
Vue.mixin({
    computed: mapGetters({
        user: 'auth/user',
    }),
    methods: {},
});
