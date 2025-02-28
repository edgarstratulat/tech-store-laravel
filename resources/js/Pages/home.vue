<template>
    <div class="bg-zinc-100">
        <Navbar />
        <Carroussel />
        <Produtos :Produtos="Produtos" />
    </div>
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
