<template lang="">
    <div></div>
</template>
<script>
import axios from 'axios'
export default {
    middleware: 'auth',
    data() {
        return {
            kamions: [],
        }
    },
    mounted() {
        this.getKamions()
    },
    methods: {
        getKamions() {
            axios.get('/api/allKamionok').then((response) => {
                console.log(response.data, 'kamions')
                this.kamions = response.data
            })
        },
    },
}
</script>
<style lang=""></style>
