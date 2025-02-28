<template>
    <Navbar />
    <Carroussel />
    <h1
        class="bg-white text-3xl text-center sm:text-center mb-12 font-bold text-gray-800"
    >
        Promoções
    </h1>
    <Produtos :Produtos="Produtos" />
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Carroussel from "../Components/carroussel.vue";
import Produtos from "../Components/produtos.vue";

export default {
    components: {
        Navbar,
        Carroussel,
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
