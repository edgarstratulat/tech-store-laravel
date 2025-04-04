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

    capacidade_ssd: [],
    type_ssd: [],
    writing_speed: [],
    rotation_speed: [],
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
    if (selectedFilters.value.capacidade_ssd) {
        queryParams["filter[capacidade_drive]"] =
            selectedFilters.value.capacidade_ssd;
    }

    if (selectedFilters.value.type_ssd) {
        queryParams["filter[type_drive]"] = selectedFilters.value.type_ssd;
    }
    if (selectedFilters.value.writing_speed) {
        queryParams["filter[writing_speed_drive]"] =
            selectedFilters.value.writing_speed;
    }
    if (selectedFilters.value.rotation_speed) {
        queryParams["filter[rotation_speed_drive]"] =
            selectedFilters.value.rotation_speed;
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
        armazenamento: {
            type: Array,
            default: () => [],
        },
    },
    computed: {
        uniqueSizesArmazenamento() {
            const sizeRAM = new Set();
            return this.armazenamento.filter((ram) => {
                if (!sizeRAM.has(ram.size)) {
                    sizeRAM.add(ram.size);
                    return true;
                }
                return false;
            });
        },
        uniqueTypesArmazenamento() {
            const sizeRAM = new Set();
            return this.armazenamento.filter((ram) => {
                if (!sizeRAM.has(ram.type)) {
                    sizeRAM.add(ram.type);
                    return true;
                }
                return false;
            });
        },
        uniqueWritingArmazenamento() {
            const sizeRAM = new Set();
            return this.armazenamento.filter((ram) => {
                if (
                    ram.writing_speed &&
                    ram.type !== "HDD" &&
                    !sizeRAM.has(ram.writing_speed)
                ) {
                    sizeRAM.add(ram.writing_speed);
                    return true;
                }
                return false;
            });
        },
        uniqueRotationArmazenamento() {
            const sizeRAM = new Set();
            return this.armazenamento.filter((ram) => {
                if (
                    ram.rotation_speed &&
                    ram.type === "HDD" &&
                    !sizeRAM.has(ram.rotation_speed)
                ) {
                    sizeRAM.add(ram.rotation_speed);
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
                >Armazenamento (Capacidade)</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueSizesArmazenamento"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.size"
                        v-model="selectedFilters.capacidade_ssd"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2"
                        >{{
                            option.size >= 1000
                                ? option.size / 1000 + " TB"
                                : option.size + " GB"
                        }}
                    </span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-medium mb-1"
                >Armazenamento (Tipo)</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueTypesArmazenamento"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.type"
                        v-model="selectedFilters.type_ssd"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.type }} </span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-medium mb-1"
                >SSD (Velocidade de Escrita & Leitura)</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueWritingArmazenamento"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.writing_speed"
                        v-model="selectedFilters.writing_speed"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.writing_speed }} MB/s</span>
                </label>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-md font-medium mb-1"
                >HDD (Velocidade Rotações)</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueRotationArmazenamento"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.rotation_speed"
                        v-model="selectedFilters.rotation_speed"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.rotation_speed }} RPM</span>
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
