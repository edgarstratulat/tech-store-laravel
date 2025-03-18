<template>
    <navbar :adminBtn="adminBtn"></navbar>
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
    },
};
</script>
