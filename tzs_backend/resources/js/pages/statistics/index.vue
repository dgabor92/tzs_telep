<template lang="">
    <div>
        <v-data-table dense :headers="headers" :items="kamions" item-key="id" :options="options">
            <template v-slot:top>
                <v-toolbar flat><v-toolbar-title>Összes kamion</v-toolbar-title> </v-toolbar>
            </template>
        </v-data-table>
    </div>
</template>
<script>
import axios from 'axios'
import 'vue-loading-overlay/dist/vue-loading.css'

export default {
    middleware: 'auth',

    data() {
        return {
            kamions: [],
            szemelyautos: [],
            teherautos: [],
            vagons: [],
            expanded: [],
            options: {
                itemsPerPage: 200,
            },
        }
    },
    computed: {
        headers() {
            return [
                { text: 'ID', value: 'id', align: 'start', sortable: false },
                { text: 'Sofőr neve', value: 'sofor_neve' },
                { text: 'Rendszám', value: 'rendszam' },
                { text: 'Száll. Levél', value: 'szal_level_szama' },
                { text: 'Belépés ideje', value: 'belepes_datuma' },
                { text: 'Megjegyzés', value: 'megjegyzes' },
                { text: '', value: 'data-table-expand' },
            ]
        },
    },
    mounted() {
        this.getKamionsData()
    },
    methods: {
        getKamionsData() {
            axios.get('/api/allKamionok').then((response) => {
                console.log(response.data)
                this.kamions = response.data
            })
        },
    },
}
</script>
<style lang=""></style>
