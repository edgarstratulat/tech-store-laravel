<template>
    <div class="bg-zinc-100">
        <Navbar />
        <h1
            class="text-3xl text-center sm:text-center font-bold text-gray-800 mt-5"
        >
            Produtos
        </h1>
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
