<template>
    <div class="bg-zinc-100">
        <Navbar
            :Utilizador="Utilizador"
            :Buttons="Buttons"
            :isAdmin="isAdmin"
        />
        <h1
            class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            Resultados da Pesquisa: {{ query }}
        </h1>
        <Product :products="searchProducts"></Product>
    </div>
</template>

<script>
import Product from "../Components/Categories/productComponent.vue";
import Navbar from "../Components/navbar.vue";

export default {
    components: {
        Product,
        Navbar,
    },
    props: {
        searchProducts: {
            type: Object,
            default: () => [],
        },
        Utilizador: {
            type: Object,
        },
        Buttons: {
            type: Array,
        },
        isAdmin: {
            type: Boolean,
        },
        query: {
            type: Array,
            required: true,
        },
    },
};
</script>
