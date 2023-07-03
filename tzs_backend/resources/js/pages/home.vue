<template>
  <div
    class="container d-flex align-items-center justify-content-center"
    style="height: 80vh; overflow-y: hidden"
  >
    <div class="row" style="width: 100%">
      <div class="col-md-6">
        <div
          class="card card-lg align-items-center border-dark"
          style="height: 15rem; cursor: pointer"
          @click="$router.push('/belepes')"
        >
          <div
            class="card-body d-flex flex-column align-items-center justify-content-center"
          >
            <h5 class="card-title">Belépés</h5>
            <p class="card-text">
              Erre a kártyára kattintva tudod beléptetni a rendszerbe a
              járműveket.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div
          class="card card-lg align-items-center border-dark"
          style="height: 15rem; cursor: pointer"
          @click="$router.push('/kilepes')"
        >
          <div
            class="card-body d-flex flex-column align-items-center justify-content-center"
          >
            <h5 class="card-title">Kilépés</h5>
            <p class="card-text">
              Erre a kártyára kattintva tudod kiléptetni a rendszerben lévő
              járműveket.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import axios from 'axios'
export default {
  middleware: "auth",

  // async asyncData () {
  //   const { data: projects } = await axios.get('/api/projects')

  //   return {
  //     projects
  //   }
  // },

  metaInfo() {
    return { title: this.$t("home") };
  },
  methods: {
    // navigate(path) {
    //   this.$router.push(path);
    // },
  },
};
</script>
<style scoped>
.card:hover {
  background-color: #0d6efd !important;
  color: white !important;
}
</style>
