<template>
    <div
        class="container d-flex align-items-center justify-content-center"
        style="height: 80vh; overflow-y: hidden !important"
    >
        <!-- <div class="row" style="width: 100%">
            <div class="col-md-6">
                <div
                    class="card card-lg align-items-center border-dark"
                    style="height: 15rem; cursor: pointer"
                    @click="$router.push('/belepes')"
                >
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <h5 class="card-title">Belépés</h5>
                        <p class="card-text">Erre a kártyára kattintva tudod beléptetni a rendszerbe a járműveket.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="card card-lg align-items-center border-dark"
                    style="height: 15rem; cursor: pointer"
                    @click="$router.push('/kilepes')"
                >
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <h5 class="card-title">Kilépés</h5>
                        <p class="card-text">
                            Erre a kártyára kattintva tudod kiléptetni a rendszerben lévő járműveket.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12" v-show="user.role == 1" style="padding: 10px">
                <div
                    class="card card-md align-items-center border-dark"
                    style="height: 15rem; cursor: pointer"
                    @click="$router.push('/statistic')"
                >
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <h5 class="card-title">Statisztika</h5>
                        <p class="card-text">
                            Erre a kártyára kattintva tudod megtekinteni a rendszerben lévő járműveket.
                        </p>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row" style="width: 100%">
            <div class="col-sm-6">
                <div
                    class="card card-lg border-dark"
                    style="height: 15rem; cursor: pointer"
                    @click="$router.push('/belepes')"
                >
                    <div class="card-body d-flex flex-column justify-content-center text-center">
                        <h5 class="card-title">Belépés</h5>
                        <p class="card-text">Erre a kártyára kattintva tudod beléptetni a rendszerbe a járműveket.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div
                    class="card card-lg border-dark"
                    style="height: 15rem; cursor: pointer"
                    @click="$router.push('/kilepes')"
                >
                    <div class="card-body d-flex flex-column justify-content-center text-center">
                        <h5 class="card-title">Kilépés</h5>
                        <p class="card-text">
                            Erre a kártyára kattintva tudod kiléptetni a rendszerben lévő járműveket.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" v-show="user.role == 1" style="padding: 10px">
                <div
                    class="card card-md border-dark"
                    style="height: 15rem; cursor: pointer"
                    @click="$router.push('/statistic')"
                >
                    <div class="card-body d-flex flex-column justify-content-center text-center">
                        <h5 class="card-title">Statisztika</h5>
                        <p class="card-text">
                            Erre a kártyára kattintva tudod megtekinteni a rendszerben lévő járműveket.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import axios from 'axios'
import { mapGetters } from 'vuex'

export default {
    middleware: 'auth',

    computed: mapGetters({
        user: 'auth/user',
    }),

    // async asyncData () {
    //   const { data: projects } = await axios.get('/api/projects')

    //   return {
    //     projects
    //   }
    // },

    metaInfo() {
        return { title: this.$t('home') }
    },
    methods: {
        // navigate(path) {
        //   this.$router.push(path);
        // },
    },
}
</script>
<style scoped>
.card:hover {
    background-color: #0d6efd !important;
    color: white !important;
}
</style>
