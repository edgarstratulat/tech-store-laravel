<template>
    <div class="bg-zinc-100">
        <Navbar :Utilizador="Utilizador" />
        <Acessorio :Acessorio="Acessorio" />
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Acessorio from "../Components/Categories/acessorioComponent.vue";

export default {
    components: {
        Navbar,
        Acessorio,
    },
    props: {
        Acessorio: {
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
