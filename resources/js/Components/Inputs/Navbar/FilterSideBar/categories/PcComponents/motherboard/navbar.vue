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

    format: [],
    chipset: [],
    cpu_socket: [],
    bluetooth: [],
    wifi: [],
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
    if (selectedFilters.value.format) {
        queryParams["filter[motherboard_format]"] =
            selectedFilters.value.format;
    }
    if (selectedFilters.value.chipset) {
        queryParams["filter[motherboard_chipset]"] =
            selectedFilters.value.chipset;
    }
    if (selectedFilters.value.cpu_socket) {
        queryParams["filter[motherboard_cpu_socket]"] =
            selectedFilters.value.cpu_socket;
    }
    if (selectedFilters.value.bluetooth) {
        queryParams["filter[motherboard_bluetooth]"] =
            selectedFilters.value.bluetooth;
    }
    if (selectedFilters.value.wifi) {
        queryParams["filter[motherboard_wifi]"] = selectedFilters.value.wifi;
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
        motherboard: {
            type: Array,
            default: () => [],
        },
    },
    computed: {
        uniqueFormat() {
            const sizeRAM = new Set();
            return this.motherboard.filter((ram) => {
                if (!sizeRAM.has(ram.format)) {
                    sizeRAM.add(ram.format);
                    return true;
                }
                return false;
            });
        },
        uniqueChipset() {
            const sizeRAM = new Set();
            return this.motherboard.filter((ram) => {
                if (!sizeRAM.has(ram.chipset)) {
                    sizeRAM.add(ram.chipset);
                    return true;
                }
                return false;
            });
        },
        uniqueSocket() {
            const sizeRAM = new Set();
            return this.motherboard.filter((ram) => {
                if (!sizeRAM.has(ram.cpu_socket)) {
                    sizeRAM.add(ram.cpu_socket);
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
                >Formato da Motherboard</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueFormat"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.format"
                        v-model="selectedFilters.format"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.format }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >Chipset da Motherboard</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueChipset"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.chipset"
                        v-model="selectedFilters.chipset"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.chipset }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >Socket do Processador</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueSocket"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.cpu_socket"
                        v-model="selectedFilters.cpu_socket"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.cpu_socket }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">Bluetooth</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="true"
                        v-model="selectedFilters.bluetooth"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">Sim</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">Wifi</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="true"
                        v-model="selectedFilters.wifi"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">Sim</span>
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
