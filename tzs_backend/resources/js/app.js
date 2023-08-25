import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'

import '~/plugins'
import '~/components'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

import '@mdi/font/css/materialdesignicons.css'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faTrash, faEdit } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import QuickEdit from 'vue-quick-edit'

import { mapGetters } from 'vuex'

library.add(faTrash, faEdit)

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('quick-edit', QuickEdit)

Vue.use(Vuetify, {
    icons: {
        iconfont: 'mdi',
    },
})

Vue.config.productionTip = false

const vuetify = new Vuetify()

/* eslint-disable no-new */
new Vue({
    el: '#app',
    i18n,
    router,
    store,
    vuetify,
    ...App,
})
Vue.mixin({
    computed: mapGetters({
        user: 'auth/user',
    }),
    methods: {},
})
