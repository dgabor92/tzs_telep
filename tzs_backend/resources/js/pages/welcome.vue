<template>
  <div>
    <div class="top-right links">
      <template v-if="authenticated">
        <router-link :to="{ name: 'home' }">
          {{ $t("home") }}
        </router-link>
      </template>
      <template v-else>
        <router-link :to="{ name: 'login' }">
          {{ $t("login") }}
        </router-link>
        <!-- <router-link :to="{ name: 'register' }">
          {{ $t("register") }}
        </router-link> -->
      </template>
    </div>

    <div class="text-center">
      <div class="title mb-4">
        {{ title }}
      </div>

      <div class="links">
        <h1>Üdvözöllek a Tuzséri beléptető rendszerben!</h1>
        <h2>A folytatáshoz szükséges bejelentkezned!</h2>
        <h5>Kérlek nyomj a jobb felső sarokban található "Log in" gombra</h5>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  layout: "basic",

  metaInfo() {
    return { title: this.$t("Welcome") };
  },

  data: () => ({
    title: window.config.appName,
  }),

  computed: mapGetters({
    authenticated: "auth/check",
  }),
};
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 85px;
}
</style>
