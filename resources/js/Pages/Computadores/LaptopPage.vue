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
            {{ t("computers-laptop-page-title") }}
        </h1>
        <div class="flex gap-5 px-8">
            <div class="w-1/4">
                <FilterSideBar
                    :manufacturer="manufacturer"
                    :subcategory="subcategory"
                    :computer="computer"
                    :cpu="cpu"
                    :ram="ram"
                    :motherboard="motherboard"
                    :armazenamento="armazenamento"
                    :gpu="gpu"
                    :powersupply="powersupply"
                    :PCcases="PCcases"
                />
            </div>

            <div class="w-3/4">
                <Product
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

import navbar from "../../Components/navbar.vue";
import Product from "../../Components/Categories/productComponent.vue";
import Pagination from "../../Components/Inputs/Pagination/paginate.vue";
import FilterSideBar from "../../Components/Filters/FilterBar.vue";

export default {
    components: {
        navbar,
        Product,
        Pagination,
        FilterSideBar,
    },
    props: {
        products: {
            type: [Array, Object],
            default: () => [],
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
        computer: {
            type: Array,
            default: () => [],
        },
        cpu: {
            type: Array,
            default: () => [],
        },
        ram: {
            type: Array,
            default: () => [],
        },
        motherboard: {
            type: Array,
            default: () => [],
        },
        armazenamento: {
            type: Array,
            default: () => [],
        },
        gpu: {
            type: Array,
            default: () => [],
        },
        powersupply: {
            type: Array,
            default: () => [],
        },
        PCcases: {
            type: Array,
            default: () => [],
        },
    },
    setup() {
        const { t } = useI18n();
        return {
            t,
        };
    },
};
</script>
