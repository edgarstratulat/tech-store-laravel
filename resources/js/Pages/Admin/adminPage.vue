<template>
    <navbar :adminBtn="adminBtn" :Utilizador="Utilizador"></navbar>
</template>

<script>
import navbar from "../../Components/Buttons/AdminNavbar/navbar.vue";

export default {
    components: {
        navbar,
    },
    props: {
        adminBtn: {
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
