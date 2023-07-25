<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading" :can-cancel="true" :opacity="0.8" :is-full-page="false" />
        <card :title="$t('Kamion_info')">
            <v-list-item v-for="item in vagons" :key="item.id" link>
                <v-list-item-content @click="showDialog(item)">
                    Vagon száma: {{ item.vagon_szama }}
                </v-list-item-content>
            </v-list-item>
        </card>

        <v-dialog v-model="dialog" width="700px">
            <v-card>
                <v-card-title class="justify-center">
                    <span class="headline"> Teherauto adatai </span>
                </v-card-title>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import axios from 'axios'
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'
export default {
    components: {
        Loading,
    },
    data() {
        return {
            isLoading: false,
            vagons: [],
            dialog: false,
        }
    },
    mounted() {
        this.getKamions()
    },
    methods: {
        showDialog(item) {
            // Set the dialog property to true to show the dialog
            this.dialog = true
            console.log(item)
        },
        updateItem(item) {
            // ...
        },
        getKamions() {
            axios.get('/api/allVagons').then((response) => {
                console.log(response.data, 'kamions')
                this.vagons = response.data
            })
        },
    },
}
</script>
