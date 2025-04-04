<template>
    <div class="bg-zinc-100">
        <Navbar
            :Utilizador="Utilizador"
            :Buttons="buttons"
            :isAdmin="isAdmin"
        />
        <h1
            class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            Armazenamento
        </h1>
        <div class="flex gap-5 px-8">
            <div class="w-1/4">
                <FilterSideBar
                    :manufacturer="manufacturer"
                    :products="products.data"
                    :category="category"
                    :subcategory="subcategory"
                    :armazenamento="armazenamento"
                />
            </div>

            <div class="w-3/4">
                <Product
                    :products="products.data"
                    :category="category"
                    :subcategory="subcategory"
                    :manufacturer="manufacturer"
                />
            </div>
        </div>
        <Pagination :links="products.links" />
    </div>
</template>

<script>
import Navbar from "../../Components/navbar.vue";
import Product from "../../Components/Categories/productComponent.vue";
import Pagination from "../../Components/Inputs/Pagination/paginate.vue";
import FilterSideBar from "../../Components/Inputs/Navbar/FilterSideBar/categories/PcComponents/Storage/navbar.vue";

export default {
    components: {
        Navbar,
        Product,
        Pagination,
        FilterSideBar,
    },
    props: {
        products: {
            type: [Array, Object],
            required: true,
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
        buttons: {
            type: Array,
            required: true,
        },
        isAdmin: {
            type: Boolean,
        },
        armazenamento: {
            type: Array,
            required: true,
        },
        manufacturer: {
            type: Array,
            required: true,
        },
    },
};
</script>
