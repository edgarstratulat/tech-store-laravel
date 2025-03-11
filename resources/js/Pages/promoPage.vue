<template>
    <div class="bg-zinc-100">
        <navbar :Utilizador="Utilizador" :Buttons="Buttons" />
        <Promocoes :Promocoes="Promocoes" />
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Promocoes from "../Components/Categories/promocoes.vue";

export default {
    components: {
        Navbar,
        Promocoes,
    },
    props: {
        Promocoes: {
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
