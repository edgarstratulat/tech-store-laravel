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
            Telemóveis Iphone
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
