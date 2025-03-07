<template>
    <div class="bg-zinc-100">
        <Navbar :Utilizador="Utilizador" />
        <ComponentePC :Componentes="Componentes" />
    </div>
</template>

<script>
import Navbar from "../../Components/navbar.vue";
import ComponentePC from "../../Components/Categories/componentePC.vue";

export default {
    components: {
        Navbar,
        ComponentePC,
    },
    props: {
        Componentes: {
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
