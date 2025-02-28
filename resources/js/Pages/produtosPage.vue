<template>
    <div class="bg-zinc-100">
        <Navbar />
        <Produtos :Produtos="Produtos" />
    </div>
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
