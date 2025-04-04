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

    memoria_ram: [],
    type_ram: [],
    frequecy_ram: [],
    latency_ram: [],
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
    if (selectedFilters.value.category) {
        queryParams["filter[category]"] = selectedFilters.value.category;
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
    if (selectedFilters.value.memoria_ram) {
        queryParams["filter[capacidade_ram]"] =
            selectedFilters.value.memoria_ram;
    }
    if (selectedFilters.value.type_ram) {
        queryParams["filter[tipo_ram]"] = selectedFilters.value.type_ram;
    }
    if (selectedFilters.value.frequecy_ram) {
        queryParams["filter[velocidade_ram]"] =
            selectedFilters.value.frequecy_ram;
    }
    if (selectedFilters.value.latency_ram) {
        queryParams["filter[latencia_ram]"] = selectedFilters.value.latency_ram;
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
        ram: {
            type: Array,
            default: () => [],
        },
    },
    computed: {
        uniqueSizesRam() {
            const sizeRAM = new Set();
            return this.ram.filter((ram) => {
                if (!sizeRAM.has(ram.size)) {
                    sizeRAM.add(ram.size);
                    return true;
                }
                return false;
            });
        },
        uniqueTypesRam() {
            const sizeRAM = new Set();
            return this.ram.filter((ram) => {
                if (!sizeRAM.has(ram.type)) {
                    sizeRAM.add(ram.type);
                    return true;
                }
                return false;
            });
        },
        uniqueFrequencyRam() {
            const sizeRAM = new Set();
            return this.ram.filter((ram) => {
                if (!sizeRAM.has(ram.frequency)) {
                    sizeRAM.add(ram.frequency);
                    return true;
                }
                return false;
            });
        },
        uniqueLatencyRam() {
            const sizeRAM = new Set();
            return this.ram.filter((ram) => {
                if (!sizeRAM.has(ram.latency)) {
                    sizeRAM.add(ram.latency);
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
            <label class="block text-md font-medium mb-1"
                >Memória RAM (Capacidade)</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueSizesRam"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.size"
                        v-model="selectedFilters.memoria_ram"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.size }}</span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-medium mb-1"
                >Memória RAM (Tipo)
            </label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueTypesRam"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.type"
                        v-model="selectedFilters.type_ram"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.type }}</span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-medium mb-1"
                >Memória RAM (Velocidade)
            </label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueFrequencyRam"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.frequency"
                        v-model="selectedFilters.frequecy_ram"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.frequency }} Mhz</span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-medium mb-1"
                >Memória RAM (Latência)
            </label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueLatencyRam"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.latency"
                        v-model="selectedFilters.latency_ram"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.latency }}</span>
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
