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
            Monitores
        </h1>
        <Perifericos :Perifericos="Perifericos" />
    </div>
</template>

<script>
import Navbar from "../../Components/navbar.vue";
import Perifericos from "../../Components/Categories/perifericosComponent.vue";

export default {
    components: {
        Navbar,
        Perifericos,
    },
    props: {
        Perifericos: {
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
