<template>
    <Navbar />
    <Carroussel />
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
