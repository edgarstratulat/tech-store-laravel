<template>
    <Navbar :Utilizador="Utilizador" :Buttons="Buttons"></Navbar>
    <h1>Teste</h1>
</template>

<script>
import Navbar from "../../Components/navbar.vue";

export default {
    components: {
        Navbar,
    },
    props: {
        Buttons: {
            type: Array,
            required: true,
        },
        Utilizador: {
            type: Object,
            required: true,
        },
    },
};
</script>
