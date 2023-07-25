<template lang="">
    <div>
        <v-tabs v-model="currmaintab" no-animation backgroud-color="default" @change="maintabchanged">
            <v-tab v-for="datab in maintabs" :key="datab.name" :href="'#' + datab.name" :disabled="datab.disable">
                {{ datab.label }}</v-tab
            >
        </v-tabs>

        <v-tabs-items v-model="currmaintab">
            <v-tab-item value="kamionok">
                <div>
                    <v-data-table dense :headers="kamionheaders" :items="kamions" item-key="id" :options="options">
                        <template v-slot:top>
                            <v-toolbar flat><v-toolbar-title>Összes Kamion</v-toolbar-title> </v-toolbar>
                        </template>
                    </v-data-table>
                </div>
            </v-tab-item>
            <v-tab-item value="teherauto">
                <div>
                    <v-data-table
                        dense
                        :headers="teherautoheaders"
                        :items="teherautos"
                        item-key="id"
                        :options="options"
                    >
                        <template v-slot:top>
                            <v-toolbar flat><v-toolbar-title>Összes Teherautó</v-toolbar-title> </v-toolbar>
                        </template>
                    </v-data-table>
                </div>
            </v-tab-item>
            <v-tab-item value="szemelyauto">
                <div>
                    <v-data-table
                        dense
                        :headers="szemelyautoheaders"
                        :items="szemelyautos"
                        item-key="id"
                        :options="options"
                    >
                        <template v-slot:top>
                            <v-toolbar flat><v-toolbar-title>Összes Személyautó</v-toolbar-title> </v-toolbar>
                        </template>
                    </v-data-table>
                </div>
            </v-tab-item>
            <v-tab-item value="vagon">
                <div>
                    <v-data-table dense :headers="vagonheaders" :items="vagons" item-key="id" :options="options">
                        <template v-slot:top>
                            <v-toolbar flat><v-toolbar-title>Összes Vagon</v-toolbar-title> </v-toolbar>
                        </template>
                    </v-data-table>
                </div>
            </v-tab-item>
        </v-tabs-items>
    </div>
</template>
<script>
import axios from 'axios'
import 'vue-loading-overlay/dist/vue-loading.css'

export default {
    middleware: 'auth',

    data() {
        return {
            maintabs: [
                { name: 'kamionok', label: 'Kamionok', disable: false },
                { name: 'teherauto', label: 'Teherautók', disable: false },
                { name: 'szemelyauto', label: 'Személyautók', disable: false },
                { name: 'vagon', label: 'Vagonok', disable: false },
            ],
            currmaintab: 'kamionom',
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
        kamionheaders() {
            return [
                // { text: 'ID', value: 'id', align: 'start', sortable: false },
                { text: 'Sofőr neve', value: 'sofor_neve' },
                { text: 'Rendszám', value: 'rendszam' },
                { text: 'Száll. Levél', value: 'szal_level_szama' },
                { text: 'Belépés ideje', value: 'belepes_datuma' },
                { text: 'Kilépés ideje', value: 'kilepes_datuma' },
                { text: 'Megjegyzés', value: 'megjegyzes' },
                { text: '', value: 'data-table-expand' },
            ]
        },
        teherautoheaders() {
            return [
                // { text: 'ID', value: 'id', align: 'start', sortable: false },
                { text: 'Sofőr neve', value: 'sofor_neve' },
                { text: 'Rendszám', value: 'rendszam' },
                { text: 'Száll. Levél', value: 'szal_level_szama' },
                { text: 'Belépés ideje', value: 'belepes_datuma' },
                { text: 'Kilépés ideje', value: 'kilepes_datuma' },
                { text: 'Megjegyzés', value: 'megjegyzes' },
                { text: '', value: 'data-table-expand' },
            ]
        },
        szemelyautoheaders() {
            return [
                // { text: 'ID', value: 'id', align: 'start', sortable: false },
                { text: 'Sofőr neve', value: 'sofor_neve' },
                { text: 'Rendszám', value: 'rendszam' },
                // { text: 'Száll. Levél', value: 'szal_level_szama' },
                { text: 'Belépés ideje', value: 'belepes_datuma' },
                { text: 'Kilépés ideje', value: 'kilepes_datuma' },
                { text: 'Megjegyzés', value: 'megjegyzes' },
                { text: '', value: 'data-table-expand' },
            ]
        },
        vagonheaders() {
            return [
                // { text: 'ID', value: 'id', align: 'start', sortable: false },
                { text: 'Vagon száma', value: 'vagon_szama' },
                { text: 'Belépés ideje', value: 'belepes_datuma' },
                { text: 'Kilépés ideje', value: 'kilepes_datuma' },
                { text: 'Megjegyzés', value: 'megjegyzes' },
                { text: '', value: 'data-table-expand' },
            ]
        },
    },
    mounted() {
        this.getKamionsData()
        this.getTeherautosData()
        this.getAllSzemelyautoData()
        this.getAllVagonData()
    },
    methods: {
        goBack() {
            this.$router.go(-1)
        },
        maintabchanged() {
            console.log('maintabchanged')
        },
        getKamionsData() {
            axios.get('/api/allKamionok').then((response) => {
                // desc order
                response.data.sort((a, b) => b.id - a.id)
                this.kamions = response.data
            })
        },
        getTeherautosData() {
            axios.get('/api/allTeherautok').then((response) => {
                response.data.sort((a, b) => b.id - a.id)
                this.teherautos = response.data
            })
        },
        getAllSzemelyautoData() {
            axios.get('/api/allSzemelygepkocsik').then((response) => {
                response.data.sort((a, b) => b.id - a.id)
                this.szemelyautos = response.data
            })
        },
        getAllVagonData() {
            axios.get('/api/allVagons').then((response) => {
                response.data.sort((a, b) => b.id - a.id)
                this.vagons = response.data
            })
        },
    },
}
</script>
<style lang=""></style>
