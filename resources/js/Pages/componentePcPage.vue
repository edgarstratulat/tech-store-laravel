<template>
    <div class="bg-zinc-100">
        <Navbar />
        <ComponentePC :Componentes="Componentes" />
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import ComponentePC from "../Components/componentePC.vue";

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
    },
};
</script>
