<template lang="">
    <div>
        <v-tabs v-model="currmaintab" no-animation backgroud-color="default" @change="maintabchanged">
            <v-tab v-for="datab in maintabs" :key="datab.name" :href="'#' + datab.name" :disabled="datab.disable">
                {{ datab.label }}</v-tab
            >
        </v-tabs>

        <v-tabs-items v-model="currmaintab" class="tabs">
            <v-tab-item value="kamionok">
                <div>
                    <v-data-table dense :headers="kamionheaders" :items="kamions" item-key="id" :options="options">
                        <template v-slot:top>
                            <v-toolbar flat><v-toolbar-title>Összes Kamion</v-toolbar-title> </v-toolbar>
                        </template>
                        <template v-slot:item.actions="{ item }">
                            <v-btn small @click="showEdit(item, 'kamionok')">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                    />
                                </svg>
                            </v-btn>
                            <v-btn small @click="showRemove(item, 'kamionok')">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    height="1em"
                                    viewBox="0 0 448 512"
                                    style="color: red"
                                >
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                    />
                                </svg>
                            </v-btn>
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
                        <template v-slot:item.actions="{ item }">
                            <v-btn small @click="showEdit(item, 'teherautok')">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                    /></svg
                            ></v-btn>
                            <v-btn small @click="showRemove(item, 'teherauto')">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    height="1em"
                                    viewBox="0 0 448 512"
                                    style="color: red"
                                >
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                    />
                                </svg>
                            </v-btn>
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
                        <template v-slot:item.actions="{ item }">
                            <v-btn small @click="showEdit(item, 'szemelyautok')">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                    />
                                </svg>
                            </v-btn>
                            <v-btn small @click="showRemove(item, 'szemelyauto')">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    height="1em"
                                    viewBox="0 0 448 512"
                                    style="color: red"
                                >
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                    /></svg
                            ></v-btn>
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
                        <template v-slot:item.actions="{ item }">
                            <v-btn small @click="showEdit(item, 'vagons')">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                    /></svg
                            ></v-btn>
                            <v-btn small @click="showRemove(item, 'vagon')">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    height="1em"
                                    viewBox="0 0 448 512"
                                    style="color: red"
                                >
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"
                                    />
                                </svg>
                            </v-btn>
                        </template>
                    </v-data-table>
                </div>
            </v-tab-item>
        </v-tabs-items>
        <div v-if="removeDialog" class="dialog">
            <v-card>
                <v-card-title>
                    <span class="headline">Biztosan törölni szeretnéd az adott sort?</span>
                </v-card-title>

                <v-card-actions>
                    <div class="flex-grow-1" />
                    <v-btn color="blue darken-1" text @click="remove"> Yes </v-btn>
                    <v-btn color="blue darken-1" text @click="closeR"> No </v-btn>
                </v-card-actions>
            </v-card>
        </div>
        <div v-if="editDialog" class="editDialog">
            <div class="dialog-header">
                <h2 class="dialog-title">{{ editItem.rendszam }} Kamion adatai</h2>
            </div>

            <div class="dialog-body pt-2">
                <form @submit.prevent="edit">
                    <alert-success :form="editItem" :message="$t('info_updated')" />
                    <div v-for="(value, key) in editItem" :key="key">
                        <div class="row">
                            <label class="col-md-3 col-form-label text-md-end">{{ key }}</label>
                            <div class="col-md-7">
                                <input
                                    v-model="editItem[key]"
                                    class="form-control"
                                    :name="editItem[key]"
                                    :readonly="key === 'id'"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Cancel and Submit buttons -->
                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                            <button class="btn btn-secondary mr-2" type="button" @click="closeE">
                                {{ $t('Mégse') }}
                            </button>
                            <button class="btn btn-primary" type="submit">{{ $t('Mentés') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import 'vue-loading-overlay/dist/vue-loading.css'
import { mdiPencil } from '@mdi/js'

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
            removeDialog: false,
            editDialog: false,
            editItem: null,
            editType: null,
            removeItem: null,
            removeType: null,
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
        isReadOnly() {
            return this.editItem[this.key] === 'id'
        },
        inputType() {
            switch (typeof this.editItem[this.key]) {
                case 'number':
                    return 'number'
                case 'string':
                    return 'text'
                case 'date':
                    return 'date'
                default:
                    return 'text'
            }
        },
        kamionheaders() {
            return [
                // { text: 'ID', value: 'id', align: 'start', sortable: false },
                { text: 'Sofőr neve', value: 'sofor_neve' },
                { text: 'Rendszám', value: 'rendszam' },
                { text: 'Száll. Levél', value: 'szal_level_szama' },
                { text: 'Belépés ideje', value: 'belepes_datuma' },
                { text: 'Kilépés ideje', value: 'kilepes_datuma' },
                { text: 'Megjegyzés', value: 'megjegyzes' },
                { text: 'Actions', value: 'actions' },
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
                { text: 'Actions', value: 'actions' },
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
                { text: 'Actions', value: 'actions' },
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
                { text: 'Actions', value: 'actions' },
                { text: '', value: 'data-table-expand' },
            ]
        },
    },
    watch: {},
    mounted() {
        this.getKamionsData()
        this.getTeherautosData()
        this.getAllSzemelyautoData()
        this.getAllVagonData()
    },
    methods: {
        async remove() {
            try {
                const response = await axios.delete(`/api/${this.removeType}/${this.removeItem.id}`)
                if (response.status === 204) {
                }
            } catch (error) {
                console.log(error)
            }
            this.removeDialog = false
            document.body.classList.remove('blurOverlay')
            //refresh the data
            this.getKamionsData()
            this.getTeherautosData()
            this.getAllSzemelyautoData()
            this.getAllVagonData()
        },
        async edit() {
            for (const key in this.editItem) {
                if (this.editItem[key] === '' || this.editItem[key] === null) {
                    alert('Minden mezőt ki kell tölteni!')
                    return
                }
            }
            try {
                const response = await axios.put(`/api/${this.editType}`, this.editItem)
            } catch (error) {
                console.log(error)
            }
            this.editDialog = false
            document.body.classList.remove('blurOverlay')
            //refresh the data
            this.getKamionsData()
            this.getTeherautosData()
            this.getAllSzemelyautoData()
            this.getAllVagonData()
        },
        showRemove(item, type) {
            document.body.classList.add('blurOverlay')
            this.removeDialog = true
            this.removeItem = item
            this.removeType = type
        },
        showEdit(item, type) {
            document.body.classList.add('blurOverlay')
            this.editDialog = true
            // this.editItem = item
            //add everything to editItem except id, created_at, updated_at

            this.editItem = Object.assign({}, item)
            // hide id, created_at, updated_at without delete them
            delete this.editItem.created_at
            delete this.editItem.updated_at
            this.editType = type
        },
        closeE() {
            this.editDialog = false
            document.body.classList.remove('blurOverlay')
        },
        closeR() {
            this.removeDialog = false
            document.body.classList.remove('blurOverlay')
        },
        goBack() {
            this.$router.go(-1)
        },
        maintabchanged() {},
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
<style scoped>
.blurOverlay .tabs {
    -webkit-filter: blur(8px);
    filter: blur(2px);
}
.dialog {
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 400px;
    transform: translate(-50%, -50%);
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    padding: 20px;
    z-index: 9999;
}

.dialog::before {
    content: '';
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    border: 10px solid transparent;
    border-bottom-color: white;
}

.dialog::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    border: 10px solid transparent;
    border-top-color: white;
}

@media (max-width: 768px) {
    .dialog {
        min-width: 90%;
        max-width: 90%;
        padding: 10px;
    }

    .dialog::before,
    .dialog::after {
        display: none;
    }
}
.editDialog {
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 1200px;
    max-height: 700px;
    transform: translate(-50%, -50%);
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    padding: 20px;
    z-index: 9999;
    /* overflow-y: auto; */
}

.editDialog::before {
    content: '';
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    border: 10px solid transparent;
    border-bottom-color: white;
}

.editDialog::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    border: 10px solid transparent;
    border-top-color: white;
}

@media (max-width: 1225px) {
    .editDialog {
        height: -webkit-fill-available;
        min-width: 90%;
        max-width: 90%;
        overflow-x: hidden;
        padding: 10px;
    }

    .editDialog::before,
    .editDialog::after {
        display: none;
    }
}

@media (max-width: 768px) {
    .editDialog {
        height: -webkit-fill-available;
        min-width: 90%;
        max-width: 90%;
        padding: 10px;
        overflow-x: hidden;
    }

    .editDialog::before,
    .editDialog::after {
        display: none;
    }
}
</style>
