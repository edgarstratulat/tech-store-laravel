<template>
    <Navbar />
    <h1
        class="neutral-100 text-3xl text-center sm:text-center mt-5 font-bold text-gray-800"
    >
        Produtos
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
