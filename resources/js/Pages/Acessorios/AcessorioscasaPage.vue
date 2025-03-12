<template>
    <div class="bg-zinc-100">
        <Navbar :Utilizador="Utilizador" :Buttons="Buttons" />
        <h1
            class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            Acessórios para Casa
        </h1>
        <Acessorio :Acessorio="Acessorio" />
    </div>
</template>

<script>
import Navbar from "../../Components/navbar.vue";
import Acessorio from "../../Components/Categories/acessorioComponent.vue";

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
        },
        Buttons: {
            type: Array,
            required: true,
        },
    },
};
</script>
