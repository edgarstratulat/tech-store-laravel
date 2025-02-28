<template>
    <Navbar />
    <h1 class="text-3xl text-center font-bold text-gray-800 p-12">
        Lista de Produtos
    </h1>
    <Produtos :Produtos="Produtos" />
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Produtos from "../Components/produtos.vue";

export default {
    components: {
        Navbar,
        Produtos,
    },
    props: {
        Produtos: {
            type: Array,
            required: true,
        },
    },
};
</script>
