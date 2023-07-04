<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
      <router-link
        :to="{ name: user ? 'home' : 'welcome' }"
        class="navbar-brand"
      >
        <!-- src="https://static-mh.content.disney.io/matterhorn/assets/goc/disney_logo_dark@2x-45d70f7dd57b.png" -->
        <!-- <img
          :src="'/images/disneyplus.png'"
          class="logo"
          style="height: 40px; margin-right: 20px"
          alt="erderttuzsér"
        /> -->
        <!-- <span style="vertical-align: middle;">{{ appName }}</span> -->
      </router-link>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarToggler"
        aria-controls="navbarToggler"
        aria-expanded="false"
      >
        <span class="navbar-toggler-icon" />
      </button>

      <div id="navbarToggler" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link
              :to="{ name: 'home', params: { id: currCountry } }"
              active-class="active"
            >
              Home
            </router-link>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <!-- Authenticated -->

          <li v-if="user" class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle text-dark"
              href="#"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <!-- <img
                :src="user.photo_url"
                class="rounded-circle profile-photo mr-1"
              /> -->
              {{ user.name }}
            </a>
            <div class="dropdown-menu">
              <router-link
                :to="{ name: 'settings.profile' }"
                class="dropdown-item pl-3"
              >
                <fa icon="cog" fixed-width />
                {{ $t("settings") }}
              </router-link>

              <div class="dropdown-divider" />
              <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
                <fa icon="sign-out-alt" fixed-width />
                {{ $t("logout") }}
              </a>
            </div>
          </li>
          <!-- Guest -->
          <template v-else>
            <li class="nav-item">
              <router-link
                :to="{ name: 'login' }"
                class="nav-link"
                active-class="active"
              >
                {{ $t("login") }}
              </router-link>
            </li>
          </template>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from "vuex";
// import LocaleDropdown from './LocaleDropdown'

// import axios from "axios";
export default {
  components: {
    // LocaleDropdown
  },
  data: function () {
    return {
      appName: window.config.appName,
      currCountry: this.$route.params.id,
      currCountryTo: this.$route.params.id,
      userRole: null,
      appTitle: "Awesome App",
      sidebar: false,
      menuItems: [
        { title: "Home", path: "/home", icon: "home" },
        { title: "Sign Up", path: "/signup", icon: "face" },
        { title: "Sign In", path: "/signin", icon: "lock_open" },
      ],
    };
  },

  computed: mapGetters({
    user: "auth/user",
  }),
  watch: {
    $route(from, to) {
      this.currCountry = from.params.id;
      this.currCountryTo = to.params.id;
      // var that = this;

      // this.getNumAd(this.currCountry);
    },
  },
  mounted() {
    // var that = this
    this.userRole = this.user.role;
    /* setTimeout(function(){
      axios.get("/api/getActiveNum?id="+that.currCountry).then(
        response => {
          that.user.countads = response.data
        },
        error => {
          console.log(error);
        }
      );
    },1300) */

    // this.$root.$emit('reloadCountries')
  },

  methods: {
    async logout() {
      // Log out the user.
      await this.$store.dispatch("auth/logout");

      // Redirect to login.
      this.$router.push({ name: "login" });
    },
  },
};
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -0.375rem 0;
}
li a.active {
  color: rgb(0, 119, 218);
} 
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -0.375rem 0;
}
li a.active {
  color: rgb(0, 119, 218);
}
/* .nav-item {
  padding: 8px;
} */

</style>
