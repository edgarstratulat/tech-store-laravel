<template>
    <div class="bg-zinc-100">
        <navbar
            :Utilizador="Utilizador"
            :Buttons="Buttons"
            :isAdmin="isAdmin"
        />

        <Carroussel />
        <h1
            class="flex text-3xl mb-5 ml-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            {{ t("promotions-page-title") }}
        </h1>
        <Product
            :products="discountProductsShow()"
            :category="category"
            :subcategory="subcategory"
            :manufacturer="manufacturer"
        />
        <div class="flex justify-center items-center p-5">
            <a href="http://localhost:8000/promotions">
                <button
                    class="bg-blue-600 text-white px-6 py-4 rounded-sm hover:bg-blue-800 transition-colors duration-300"
                >
                    {{ t("home-offers-button") }}
                </button>
            </a>
        </div>
        <div class="w-full bg-neutral-800">
            <div class="flex justify-center pt-20 mt-24">
                <h1 class="text-3xl font-bold text-white">
                    {{ t("home-pc-title") }}
                </h1>
            </div>
            <div>
                <p class="flex justify-center text-neutral-400 mt-2">
                    {{ t("home-pc-h1") }}
                </p>
            </div>
            <div>
                <span class="flex justify-center font-bold text-white"
                    >{{ t("home-pc-h2") }}
                </span>
            </div>
            <div class="flex justify-center m-4">
                <a href="/computers">
                    <button
                        class="bg-white text-black px-6 py-4 rounded-sm hover:bg-gray-300 transition-colors duration-300 justify-center"
                    >
                        {{ t("home-pc-button") }}
                    </button>
                </a>
            </div>
            <div class="pb-10">
                <ComputerHome :computers="computers" />
            </div>
        </div>
        <div class="m-10">
            <div class="flex justify-center">
                <a href="http://localhost:8000/promotions">
                    <button
                        class="bg-blue-600 text-white px-6 py-4 rounded-sm hover:bg-blue-800 transition-colors duration-300"
                    >
                        {{ t("home-offers-button") }}
                    </button>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from "vue-i18n";
import navbar from "../Components/navbar.vue";
import Carroussel from "../Components/carroussel.vue";
import Product from "../Components/Categories/productComponent.vue";
import ComputerHome from "../Components/Categories/HomeComputerComponent.vue";

export default {
    components: {
        navbar,
        Carroussel,
        Product,
        ComputerHome,
    },
    props: {
        products: {
            type: Array,
            required: true,
        },
        category: {
            type: Array,
            required: true,
        },
        manufacturer: {
            type: Array,
            required: true,
        },
        subcategory: {
            type: Array,
            required: true,
        },
        computers: {
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
        searchProducts: {
            type: Array,
        },
    },
    methods: {
        discountProductsShow() {
            const discountItems = this.products.filter(
                (item) => item.sale_price > 0
            );

            return discountItems;
        },
    },
    setup() {
        const { t } = useI18n();
        return { t };
    },
};
</script>
