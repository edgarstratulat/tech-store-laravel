<template>
    <Navbar :adminBtn="adminBtn" :Utilizador="Utilizador"></Navbar>
    <div class="max-w-6xl mx-auto p-6 mt-5">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            {{ t("view-products-page-title") }}
        </h1>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <ViewProductsTable
                :products="products"
                :category="category"
                :subcategory="subcategory"
            ></ViewProductsTable>
        </div>

        <Pagination :links="products.links"></Pagination>
    </div>
</template>

<script>
import Navbar from "../../../Components/Buttons/AdminNavbar/navbar.vue";
import Pagination from "../../../Components/Inputs/Pagination/paginate.vue";
import ViewProductsTable from "../../../Components/Tables/ViewProducts.vue";
import { useI18n } from "vue-i18n";

export default {
    components: {
        Navbar,
        Pagination,
        ViewProductsTable,
    },
    props: {
        products: {
            type: [Array, Object],
            required: true,
        },
        adminBtn: {
            type: Array,
            required: true,
        },
        Utilizador: {
            type: Object,
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
    },
    methods: {
        showCategories(category_id) {
            const category = this.category.find(
                (cate) => cate.id === category_id
            );

            return category.name;
        },

        showSubcategories(subcategory_id) {
            const subcategory = this.subcategory.find(
                (subcate) => subcate.id === subcategory_id
            );

            return subcategory.name;
        },
    },
    setup() {
        const { t } = useI18n();
        return { t };
    },
};
</script>
