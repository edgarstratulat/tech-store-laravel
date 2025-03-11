<template>
    <div class="bg-zinc-100">
        <navbar :Utilizador="Utilizador" :Buttons="Buttons" />
        <h1
            class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            Computadores MaRca
        </h1>
        <computadoresComponent :Computer="Computer" />
    </div>
</template>

<script>
import navbar from "../../Components/navbar.vue";
import computadoresComponent from "../../Components/Categories/computadoresComponent.vue";

export default {
    components: {
        navbar,
        computadoresComponent,
    },
    props: {
        Computer: {
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
