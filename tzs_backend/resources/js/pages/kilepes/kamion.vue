<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading" :can-cancel="true" :opacity="0.8" :is-full-page="false" />
        <card :title="$t('Kamion_info')">
            <v-list-item v-for="item in filteredKamions" :key="item.id" link>
                <v-list-item-content @click="showDialog(item)">
                    {{ item.rendszam }} - {{ item.sofor_neve }}
                </v-list-item-content>
            </v-list-item>
        </card>
        <div v-if="dialog" class="dialog">
            <div class="dialog-header">
                <h2 class="dialog-title">{{ selectedItem.rendszam }} Kamion adatai</h2>
            </div>

            <div class="dialog-body pt-2">
                <form @submit.prevent="updateItem">
                    <alert-success :form="selectedItem" :message="$t('info_updated')" />
                    <!-- Sofőr neve -->
                    <div class="row">
                        <label class="col-md-3 col-form-label text-md-end">{{ $t('Sofőr neve') }}</label>
                        <div class="col-md-7">
                            <input
                                v-model="selectedItem.sofor_neve"
                                class="form-control"
                                type="text"
                                name="sofor_neve"
                            />
                        </div>
                    </div>

                    <!-- Rendszám -->
                    <div class="row">
                        <label class="col-md-3 col-form-label text-md-end">{{ $t('Rendszám') }}</label>
                        <div class="col-md-7">
                            <input v-model="selectedItem.rendszam" class="form-control" type="text" name="rendszam" />
                        </div>
                    </div>

                    <!-- Szállító levél száma -->
                    <div class="row">
                        <label class="col-md-3 col-form-label text-md-end">{{ $t('Szállító levél száma') }}</label>
                        <div class="col-md-7">
                            <input
                                v-model="selectedItem.szal_level_szama"
                                class="form-control"
                                type="text"
                                name="szal_level_szama"
                            />
                        </div>
                    </div>

                    <!-- Belépés dátuma -->
                    <div class="row">
                        <label class="col-md-3 col-form-label text-md-end">{{ $t('Belépés dátuma') }}</label>
                        <div class="col-md-7">
                            <input
                                v-model="selectedItem.belepes_datuma"
                                class="form-control"
                                type="date"
                                name="belepes_datuma"
                            />
                        </div>
                    </div>

                    <!-- Kilépés dátuma -->
                    <div class="row">
                        <label class="col-md-3 col-form-label text-md-end">{{ $t('Kilépés dátuma') }}</label>
                        <div class="col-md-7">
                            <input
                                v-model="selectedItem.kilepes_datuma"
                                class="form-control"
                                type="date"
                                name="kilepes_datuma"
                            />
                        </div>
                    </div>

                    <!-- Súly üresen -->
                    <div class="row">
                        <label class="col-md-3 col-form-label text-md-end">{{ $t('Súly üresen') }}</label>
                        <div class="col-md-7">
                            <input v-model="selectedItem.suly_üres" class="form-control" type="text" name="suly_üres" />
                        </div>
                    </div>

                    <!-- Súly tele -->
                    <div class="row">
                        <label class="col-md-3 col-form-label text-md-end">{{ $t('Súly tele') }}</label>
                        <div class="col-md-7">
                            <input v-model="selectedItem.suly_tele" class="form-control" type="text" name="suly_tele" />
                        </div>
                    </div>

                    <!-- Megjegyzés -->
                    <div class="row">
                        <label class="col-md-3 col-form-label text-md-end">{{ $t('Megjegyzés') }}</label>
                        <div class="col-md-7">
                            <textarea
                                v-model="selectedItem.megjegyzes"
                                class="form-control"
                                type="text"
                                name="megjegyzes"
                            ></textarea>
                        </div>
                    </div>

                    <!-- Cancel and Submit buttons -->
                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                            <button class="btn btn-secondary mr-2" type="button" @click="closeDialog">
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
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'
import Form from 'vform'
export default {
    components: {
        Loading,
    },
    data() {
        return {
            isLoading: false,
            kamions: [],
            selectedItem: {},
            dialog: false,
        }
    },
    mounted() {
        this.getKamions()
    },
    computed: {
        filteredKamions() {
            return this.kamions.filter((item) => item.kilepes_datuma === null)
        },
    },
    methods: {
        closeDialog() {
            this.dialog = false
        },
        showDialog(item) {
            // Set the dialog property to true to show the dialog
            this.dialog = !this.dialog
            this.selectedItem = item
        },
        async updateItem(item) {
            for (const key in this.selectedItem) {
                if (this.selectedItem[key] === '' || this.selectedItem[key] === null) {
                    alert('Minden mezőt ki kell tölteni!')
                    return
                }
            }
            const { data } = await axios.put(`/api/kamionok`, this.selectedItem)
            this.$router.push('/home')
        },
        getKamions() {
            axios.get('/api/allKamionok').then((response) => {
                console.log(response.data, 'kamions')
                this.kamions = response.data
            })
        },
    },
}
</script>
<style scoped>
.dialog {
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 1200px;
    transform: translate(-50%, -50%);
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    padding: 20px;
    z-index: 9999;
    overflow-y: auto;
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
</style>
