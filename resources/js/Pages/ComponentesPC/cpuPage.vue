<template>
    <div class="bg-zinc-100">
        <Navbar
            :Utilizador="Utilizador"
            :Buttons="Buttons"
            :isAdmin="isAdmin"
        />
        <h1
            class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            Processadores
        </h1>
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
        },
        Buttons: {
            type: Array,
            required: true,
        },
        isAdmin: {
            type: Boolean,
        },
    },
};
</script>
