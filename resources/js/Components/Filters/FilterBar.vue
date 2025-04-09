<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

import ManufacturerFilter from "./ManufacturerFilter.vue";
import StockFilter from "./StockFilter.vue";
import SortFilter from "./SortFilter.vue";
import MaxMinPriceFilter from "./Max&MinPriceFilter.vue";
import CategoryFilter from "./CategoryFilter.vue";
import ProductStatusFilter from "./ProductStatusFilter.vue";
import ComponentesFilter from "./ComponentesFilter.vue";

const props = defineProps({
    manufacturer: Array,
    subcategory: Array,
    ram: Array,
});

const selectedFilters = ref({
    manufacturer: "",
    stock: "",
    nostock: "",
    sort: "",
    max_price: "",
    min_price: "",
    category: "",
    subcategory: "",
    promotion: "",
    reconditioned: "",
});

const applyFilters = () => {
    const queryParams = {};

    console.log(applyFilters);

    if (selectedFilters.value.manufacturer) {
        queryParams["filter[manufacturer]"] =
            selectedFilters.value.manufacturer;
    }
    if (selectedFilters.value.stock) {
        queryParams["filter[stock]"] = selectedFilters.value.stock;
    }
    if (selectedFilters.value.nostock) {
        queryParams["filter[nostock]"] = selectedFilters.value.nostock;
    }
    if (selectedFilters.value.sort) {
        queryParams["sort"] = selectedFilters.value.sort;
    }
    if (selectedFilters.value.min_price) {
        queryParams["filter[min_price]"] = selectedFilters.value.min_price;
    }
    if (selectedFilters.value.max_price) {
        queryParams["filter[max_price]"] = selectedFilters.value.max_price;
    }
    if (selectedFilters.value.subcategory) {
        queryParams["filter[subcategory]"] = selectedFilters.value.subcategory;
    }
    if (selectedFilters.value.promotion) {
        queryParams["filter[promotion]"] = selectedFilters.value.promotion;
    }
    if (selectedFilters.value.reconditioned) {
        queryParams["filter[reconditioned]"] =
            selectedFilters.value.reconditioned;
    }

    console.log(queryParams);

    router.get(window.location.pathname, queryParams);
};
</script>

<template>
    <div
        class="overflow-y-auto mt-8 h-screen w-full bg-white shadow-lg p-4 rounded-lg"
    >
        <h2 class="text-2xl font-bold mb-4">Filtros</h2>

        <SortFilter v-model="selectedFilters.sort"></SortFilter>
        <StockFilter
            v-model:stock="selectedFilters.stock"
            v-model:nostock="selectedFilters.nostock"
        ></StockFilter>

        <MaxMinPriceFilter
            v-model:minPrice="selectedFilters.min_price"
            v-model:maxPrice="selectedFilters.max_price"
        ></MaxMinPriceFilter>

        <ManufacturerFilter
            v-model="selectedFilters.manufacturer"
            :manufacturer="manufacturer"
        />

        <CategoryFilter
            v-model="selectedFilters.subcategory"
            :subcategory="subcategory"
        ></CategoryFilter>

        <ProductStatusFilter
            v-model:discount="selectedFilters.promotion"
            v-model:reconditioned="selectedFilters.reconditioned"
        ></ProductStatusFilter>

        <ComponentesFilter :ram="ram"></ComponentesFilter>

        <button
            @click="applyFilters"
            class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded"
        >
            Aplicar Filtros
        </button>
    </div>
</template>
