<template>
    <div class="bg-zinc-100">
        <Navbar
            :Utilizador="Utilizador"
            :Buttons="Buttons"
            :isAdmin="isAdmin"
        />
        <h1
            class="m-8 text-center text-xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            Resultados da pesquisa: {{ query }}
        </h1>
        <Product
            :products="searchProducts.data"
            :category="category"
            :subcategory="subcategory"
        ></Product>
        <Pagination :links="searchProducts.links"></Pagination>
    </div>
</template>

<script>
import Product from "../Components/Categories/productComponent.vue";
import Navbar from "../Components/navbar.vue";
import Pagination from "../Components/Inputs/Pagination/paginate.vue";

export default {
    components: {
        Product,
        Navbar,
        Pagination,
    },
    props: {
        searchProducts: {
            type: [Object, Array],
            default: () => [],
        },
        category: {
            type: Array,
            required: true,
        },
        subcategory: {
            type: Array,
            required: true,
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
            type: String,
            required: true,
        },
    },
};
</script>
