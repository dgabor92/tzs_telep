import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'

import '~/plugins'
import '~/components'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

// import uploadfiles from './components/UploadFiles.vue'
// import uploaddocs from './components/UploadDocs.vue'

import '@mdi/font/css/materialdesignicons.css'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faTrash, faEdit } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import QuickEdit from 'vue-quick-edit'
import VueVideoPlayer from 'vue-video-player'
import 'video.js/dist/video-js.css'

import { mapGetters } from 'vuex'
import axios from 'axios'

library.add(faTrash, faEdit)

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('quick-edit', QuickEdit)
// Vue.component('uploadfiles', uploadfiles)
// Vue.component('uploaddocs', uploaddocs)

Vue.use(Vuetify, {
    icons: {
        iconfont: 'mdi',
    },
})
Vue.use(VueVideoPlayer)

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
    methods: {
        getCountryByID() {
            var tempName = ''
            for (var i = 0; i < window.countryArr.length; i++) {
                if (window.countryArr[i].id == this.$route.params.id) {
                    tempName = window.countryArr[i].name
                    break
                }
            }
            return tempName
        },
        getMaxAdByID() {
            var tempNum = ''
            for (var i = 0; i < window.countryArr.length; i++) {
                if (window.countryArr[i].id == this.$route.params.id) {
                    tempNum = window.countryArr[i].num_ads
                    break
                }
            }
            return tempNum
        },
    },
})
