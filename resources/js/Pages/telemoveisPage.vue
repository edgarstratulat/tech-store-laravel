<template>
    <div class="bg-zinc-100">
        <Navbar :Utilizador="Utilizador" />
        <Telemovel :Telemovel="Telemovel" />
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Telemovel from "../Components/Categories/telemovelComponent.vue";

export default {
    components: {
        Navbar,
        Telemovel,
    },
    props: {
        Telemovel: {
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
