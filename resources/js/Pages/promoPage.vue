<template>
    <div class="bg-zinc-100 min-h-screen">
        <navbar
            :Utilizador="Utilizador"
            :Buttons="buttons"
            :isAdmin="isAdmin"
        />

        <h1
            class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            {{ t("promotions-page-title") }}
        </h1>

        <div class="flex gap-5 px-8">
            <div class="w-1/4">
                <discountFilterNavbar
                    :manufacturer="manufacturer"
                    :products="products.data"
                    :category="category"
                />
            </div>

            <div class="w-3/4">
                <Products
                    :products="products.data"
                    :category="category"
                    :subcategory="subcategory"
                    :manufacturer="manufacturer"
                />
                <Pagination :links="products.links" />
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from "vue-i18n";
import Navbar from "../Components/navbar.vue";
import Products from "../Components/Categories/productComponent.vue";
import Pagination from "../Components/Inputs/Pagination/paginate.vue";
import discountFilterNavbar from "../Components/Filters/FilterBar.vue";

export default {
    components: {
        Navbar,
        Products,
        Pagination,
        discountFilterNavbar,
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
    setup() {
        const { t } = useI18n();
        return { t };
    },
};
</script>
