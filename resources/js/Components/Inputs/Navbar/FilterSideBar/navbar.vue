<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { router } from "@inertiajs/vue3";

const isOpen = ref(false);
const selectedFilters = ref({
    manufacturer: "",
    stock: "",
    nostock: "",
    category: "",
    sort: "",
});

const closeSidebar = (event) => {
    if (!event.target.closest(".sidebar") && window.innerWidth < 1024) {
        isOpen.value = false;
    }
};

onMounted(() => document.addEventListener("click", closeSidebar));
onUnmounted(() => document.removeEventListener("click", closeSidebar));

const applyFilters = () => {
    const queryParams = {};

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
    if (selectedFilters.value.category) {
        queryParams["filter[category]"] = selectedFilters.value.category;
    }
    if (selectedFilters.value.sort) {
        queryParams["filter[sort]"] = selectedFilters.value.sort;
    }

    router.get(window.location.pathname, queryParams);
};
</script>

<script>
export default {
    props: {
        manufacturer: {
            type: Array,
            required: true,
        },
        products: {
            type: Array,
            required: true,
        },
        category: {
            type: Array,
            required: true,
        },
    },
};
</script>

<template>
    <div class="mt-8 h-screen w-full bg-white shadow-lg p-4">
        <h2 class="text-lg font-semibold mb-4">Filtros</h2>

        <div>
            <label for="minimum_price" class="block text-sm font-medium mb-1"
                >Ordenar por:</label
            >
            <select
                v-model="selectedFilters.sort"
                class="w-full border p-1 rounded"
            >
                <option value="asc">Preço mais baixo</option>
                <option value="desc">Preço mais alto</option>
            </select>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium mb-1">Stock</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        v-model="selectedFilters.stock"
                        class="form-checkbox"
                    />
                    <span class="ml-2">Em stock</span>
                </label>
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        v-model="selectedFilters.nostock"
                        class="form-checkbox"
                    />
                    <span class="ml-2">Sem Stock</span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium mb-1">Fabricante</label>
            <select
                v-model="selectedFilters.manufacturer"
                class="w-full border p-2 rounded"
            >
                <option
                    v-for="manu in manufacturer"
                    :value="manu.id"
                    :key="manu.id"
                >
                    {{ manu.name }}
                </option>
            </select>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium mb-1">Categoria</label>
            <select
                v-model="selectedFilters.category"
                class="w-full border p-2 rounded"
            >
                <option
                    v-for="cate in category"
                    :value="cate.id"
                    :key="cate.id"
                >
                    {{ cate.name }}
                </option>
            </select>
        </div>

        <button
            @click="applyFilters"
            class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded"
        >
            Aplicar Filtros
        </button>
    </div>
</template>
