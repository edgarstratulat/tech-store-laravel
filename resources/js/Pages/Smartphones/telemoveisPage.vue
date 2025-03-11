<template>
    <div class="bg-zinc-100">
        <navbar :Utilizador="Utilizador" :Buttons="Buttons" />
        <h1
            class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            Telemóveis
        </h1>
        <Telemovel :Telemovel="Telemovel" />
    </div>
</template>

<script>
import Navbar from "../../Components/navbar.vue";
import Telemovel from "../../Components/Categories/telemovelComponent.vue";

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
        Buttons: {
            type: Array,
            required: true,
        },
    },
};
</script>
