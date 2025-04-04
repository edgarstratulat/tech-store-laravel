<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { router } from "@inertiajs/vue3";

const isOpen = ref(false);
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

    cpu: [],
    cores: [],
    threads: [],
    tdp: [],
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
    if (selectedFilters.value.sort) {
        queryParams["sort[price]"] = selectedFilters.value.sort;
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
    if (selectedFilters.value.cpu) {
        queryParams["filter[cpu]"] = selectedFilters.value.cpu;
    }
    if (selectedFilters.value.cores) {
        queryParams["filter[cpu_cores]"] = selectedFilters.value.cores;
    }
    if (selectedFilters.value.threads) {
        queryParams["filter[cpu_threads]"] = selectedFilters.value.threads;
    }
    if (selectedFilters.value.tdp) {
        queryParams["filter[cpu_tdp]"] = selectedFilters.value.tdp;
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
        subcategory: {
            type: Array,
            required: true,
        },
        cpu: {
            type: Array,
            default: () => [],
        },
    },
    computed: {
        uniqueCPU() {
            const sizeRAM = new Set();
            return this.cpu.filter((ram) => {
                if (!sizeRAM.has(ram.model)) {
                    sizeRAM.add(ram.model);
                    return true;
                }
                return false;
            });
        },
        uniqueCores() {
            const sizeRAM = new Set();
            return this.cpu.filter((ram) => {
                if (!sizeRAM.has(ram.cores)) {
                    sizeRAM.add(ram.cores);
                    return true;
                }
                return false;
            });
        },
        uniqueThreads() {
            const sizeRAM = new Set();
            return this.cpu.filter((ram) => {
                if (!sizeRAM.has(ram.threads)) {
                    sizeRAM.add(ram.threads);
                    return true;
                }
                return false;
            });
        },
        uniqueTDP() {
            const sizeRAM = new Set();
            return this.cpu.filter((ram) => {
                if (!sizeRAM.has(ram.tdp)) {
                    sizeRAM.add(ram.tdp);
                    return true;
                }
                return false;
            });
        },
    },
};
</script>

<template>
    <div
        class="overflow-y-auto mt-8 h-screen w-full bg-white shadow-lg p-4 rounded-lg"
    >
        <h2 class="text-lg font-semibold mb-4">Filtros</h2>

        <div>
            <label class="block text-md font-medium mb-1">Ordenar por:</label>
            <select
                v-model="selectedFilters.sort"
                class="w-full border p-1 rounded"
            >
                <option value="created_at">Mais Recentes</option>
                <option value="price">Preço mais baixo</option>
                <option value="-price">Preço mais alto</option>
            </select>
        </div>

        <div class="mt-4">
            <label class="block text-md font-medium mb-1">Stock</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="min"
                        v-model="selectedFilters.stock"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">Em stock</span>
                </label>
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="max"
                        v-model="selectedFilters.nostock"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">Sem Stock</span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-medium mb-1">Preço</label>
            <div class="flex items-center space-x-4">
                <input
                    type="number"
                    placeholder="min"
                    v-model="selectedFilters.min_price"
                    class="w-1/3 border p-1 rounded"
                />
                <input
                    type="number"
                    placeholder="max"
                    v-model="selectedFilters.max_price"
                    class="w-1/3 border p-1 rounded"
                />
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-medium mb-1">Fabricante</label>
            <select
                v-model="selectedFilters.manufacturer"
                class="w-full border p-1 rounded"
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
            <label class="block text-md font-medium mb-1"
                >Estado do produto</label
            >
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="min"
                        v-model="selectedFilters.promotion"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">Promoções</span>
                </label>
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="min"
                        v-model="selectedFilters.reconditioned"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">Recondicionados</span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >Família Processador</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueCPU"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.model"
                        v-model="selectedFilters.cpu"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.model }}</span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >Núcleos Processador</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueCores"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.cores"
                        v-model="selectedFilters.cores"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.cores }} núcleos</span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >Threads Processador</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueThreads"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.threads"
                        v-model="selectedFilters.threads"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.threads }} threads</span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >TDP Processador</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueTDP"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.tdp"
                        v-model="selectedFilters.tdp"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.tdp }} W</span>
                </label>
            </div>
        </div>

        <button
            @click="applyFilters"
            class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded"
        >
            Aplicar Filtros
        </button>
    </div>
</template>
