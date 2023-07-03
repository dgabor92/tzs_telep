<template>
  <card :title="$t('Teherauto_info')">
    <form @submit.prevent="update" @keydown="form.onKeydown($event)">
      <alert-success :form="form" :message="$t('info_updated')" />

      <!-- Sofőr neve -->
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label text-md-end">{{
          $t("Sofőr neve")
        }}</label>
        <div class="col-md-7">
          <input
            v-model="form.sofor_neve"
            :class="{ 'is-invalid': form.errors.has('sofor_neve') }"
            class="form-control"
            type="text"
            name="sofor_neve"
          />
          <has-error :form="form" field="sofor_neve" />
        </div>
      </div>

      <!-- Rendszám -->
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label text-md-end">{{
          $t("Rendszám")
        }}</label>
        <div class="col-md-7">
          <input
            v-model="form.rendszam"
            :class="{ 'is-invalid': form.errors.has('rendszam') }"
            class="form-control"
            type="text"
            name="rendszam"
          />
          <has-error :form="form" field="rendszam" />
        </div>
      </div>

      <!-- Szállító levél száma -->
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label text-md-end">{{
          $t("Szállító levél száma")
        }}</label>
        <div class="col-md-7">
          <input
            v-model="form.szal_level_szama"
            :class="{ 'is-invalid': form.errors.has('szal_level_szama') }"
            class="form-control"
            type="text"
            name="szal_level_szama"
          />
          <has-error :form="form" field="szal_level_szama" />
        </div>
      </div>

      <!-- Belépés dátuma -->
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label text-md-end">{{
          $t("Belépés dátuma")
        }}</label>
        <div class="col-md-7">
          <input
            v-model="form.belepes_datuma"
            :class="{ 'is-invalid': form.errors.has('belepes_datuma') }"
            class="form-control"
            type="date"
            name="belepes_datuma"
          />
          <has-error :form="form" field="belepes_datuma" />
        </div>
      </div>

      <!-- Súly üresen -->
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label text-md-end">{{
          $t("Súly üresen")
        }}</label>
        <div class="col-md-7">
          <input
            v-model="form.suly_üres"
            :class="{ 'is-invalid': form.errors.has('suly_üres') }"
            class="form-control"
            type="text"
            name="suly_üres"
          />
          <has-error :form="form" field="suly_üres" />
        </div>
      </div>

      <!-- Súly tele -->
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label text-md-end">{{
          $t("Súly tele")
        }}</label>
        <div class="col-md-7">
          <input
            v-model="form.suly_tele"
            :class="{ 'is-invalid': form.errors.has('suly_tele') }"
            class="form-control"
            type="text"
            name="suly_tele"
          />
          <has-error :form="form" field="suly_tele" />
        </div>
      </div>

      <!-- Megjegyzés -->
      <div class="mb-3 row">
        <label class="col-md-3 col-form-label text-md-end">{{
          $t("Megjegyzés")
        }}</label>
        <div class="col-md-7">
          <textarea
            v-model="form.megjegyzes"
            :class="{ 'is-invalid': form.errors.has('megjegyzes') }"
            class="form-control"
            type="text"
            name="megjegyzes"
          />
          <has-error :form="form" field="megjegyzes" />
        </div>
      </div>

      <!-- Submit Button -->
      <div class="mb-3 row">
        <div class="col-md-9 ms-md-auto">
          <v-button :loading="form.busy" type="primary">
            {{ $t("Mentés") }}
          </v-button>
        </div>
      </div>
    </form>
  </card>
</template>
<script>
import Form from "vform";
export default {
  scrollToTop: false,

  metaInfo() {
    return { title: this.$t("belepo") };
  },
  data() {
    return {
      form: new Form({
        sofor_neve: "",
        rendszam: "",
        szal_level_szama: "",
        belepes_datuma: new Date().toISOString().substr(0, 10),
        kilepes_datuma: new Date().toISOString().substr(0, 10),
        suly_üres: "",
        suly_tele: "",
        megjegyzes: "",
      }),
    };
  },
  methods: {
    async update() {
      for (const key in this.form) {
        if (this.form[key] === "") {
          alert("Minden mezőt ki kell tölteni!");
          return;
        }
      }
      const { data } = await this.form.post("/api/kamionok");
      this.form.reset();
      this.$router.push("/home");
    },
  },
};
</script>
<style lang="sss" scoped></style>
