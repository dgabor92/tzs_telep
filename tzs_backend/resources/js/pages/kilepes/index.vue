<template>
  <div class="row justify-content-center">
    <div class="col-md-3">
      <card :title="$t('Kilépő')" class="settings-card">
        <ul class="nav flex-column nav-pills">
          <li v-for="tab in tabs" :key="tab.route" class="nav-item">
            <router-link
              :to="{ name: tab.route }"
              class="nav-link"
              active-class="active"
            >
              <fa :icon="tab.icon" fixed-width />
              {{ tab.name }}
            </router-link>
          </li>
        </ul>
      </card>
    </div>

    <div class="col-md-7">
      <transition name="fade" mode="out-in">
        <router-view />
      </transition>
    </div>
  </div>
</template>
<script>
import {
  faTruckMoving,
  faTruck,
  faCar,
  faTrain,
} from "@fortawesome/free-solid-svg-icons";
export default {
  middleware: "auth",

  computed: {
    tabs() {
      return [
        {
          icon: faTruckMoving,
          name: this.$t("Kamion"),
          route: "kilepes.kamion",
        },
        {
          icon: faTruck,
          name: this.$t("Teherautó"),
          route: "kilepes.teherauto",
        },
        {
          icon: faCar,
          name: this.$t("Személyautó"),
          route: "kilepes.szemelyauto",
        },
        {
          icon: faTrain,
          name: this.$t("Vagon"),
          route: "kilepes.vagon",
        },
      ];
    },
  },
};
</script>
<style scoped></style>
