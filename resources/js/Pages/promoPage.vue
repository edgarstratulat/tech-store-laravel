<template>
    <div class="bg-zinc-100">
        <navbar
            :Utilizador="Utilizador"
            :Buttons="buttons"
            :isAdmin="isAdmin"
        />
        <h1
            class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            Promoções
        </h1>
        <Products
            :products="products.data"
            :category="category"
            :subcategory="subcategory"
            :manufacturer="manufacturer"
        ></Products>

        <Pagination :links="products.links" />
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Products from "../Components/Categories/productComponent.vue";
import Pagination from "../Components/Inputs/Pagination/paginate.vue";
import FilterSideBar from "../Components/Inputs/FilterSideBar/navbar.vue";

export default {
    components: {
        Navbar,
        Products,
        Pagination,
        FilterSideBar,
    },
    props: {
        products: {
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
        manufacturer: {
            type: Array,
            required: true,
        },
        Utilizador: {
            type: Object,
        },
        buttons: {
            type: Array,
            required: true,
        },
        isAdmin: {
            type: Boolean,
        },
    },
};
</script>
