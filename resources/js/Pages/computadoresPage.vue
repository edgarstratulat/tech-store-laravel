<template>
    <div class="bg-zinc-100">
        <Navbar :Utilizador="Utilizador" />
        <computadoresComponent :Computer="Computer" />
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import computadoresComponent from "../Components/Categories/computadoresComponent.vue";

export default {
    components: {
        Navbar,
        computadoresComponent,
    },
    props: {
        Computer: {
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
