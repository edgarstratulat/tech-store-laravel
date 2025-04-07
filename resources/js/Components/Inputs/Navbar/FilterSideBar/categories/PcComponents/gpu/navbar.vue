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

    gpu_category: "",
    model: [],
    vram: [],
    gpu_type_vram: [],
    gpu_interface: [],
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
    if (selectedFilters.value.gpu_category) {
        queryParams["filter[gpu_category]"] =
            selectedFilters.value.gpu_category;
    }
    if (selectedFilters.value.model) {
        queryParams["filter[gpu_model]"] = selectedFilters.value.model;
    }
    if (selectedFilters.value.vram) {
        queryParams["filter[gpu_vram]"] = selectedFilters.value.vram;
    }
    if (selectedFilters.value.gpu_type_vram) {
        queryParams["filter[gpu_type_vram]"] =
            selectedFilters.value.gpu_type_vram;
    }
    if (selectedFilters.value.gpu_interface) {
        queryParams["filter[gpu_interface]"] =
            selectedFilters.value.gpu_interface;
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
        gpu: {
            type: Array,
            default: () => [],
        },
    },
    computed: {
        uniqueCategory() {
            const sizeRAM = new Set();
            return this.gpu.filter((ram) => {
                if (!sizeRAM.has(ram.category)) {
                    sizeRAM.add(ram.category);
                    return true;
                }
                return false;
            });
        },
        uniqueModel() {
            const sizeRAM = new Set();
            return this.gpu.filter((ram) => {
                if (!sizeRAM.has(ram.model)) {
                    sizeRAM.add(ram.model);
                    return true;
                }
                return false;
            });
        },
        uniqueVRAM() {
            const sizeRAM = new Set();
            return this.gpu.filter((ram) => {
                if (!sizeRAM.has(ram.vram)) {
                    sizeRAM.add(ram.vram);
                    return true;
                }
                return false;
            });
        },
        uniqueTypeVRAM() {
            const sizeRAM = new Set();
            return this.gpu.filter((ram) => {
                if (!sizeRAM.has(ram.type_vram)) {
                    sizeRAM.add(ram.type_vram);
                    return true;
                }
                return false;
            });
        },
        uniqueInterface() {
            const sizeRAM = new Set();
            return this.gpu.filter((ram) => {
                if (!sizeRAM.has(ram.interface)) {
                    sizeRAM.add(ram.interface);
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
            <label class="block text-md font-medium mb-1">Categoria</label>
            <select
                v-model="selectedFilters.gpu_category"
                class="w-full border p-1 rounded"
            >
                <option
                    v-for="manu in uniqueCategory"
                    :value="manu.category"
                    :key="manu.id"
                >
                    {{ manu.category }}
                </option>
            </select>
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
                    <span class="ml-2"
                        >Promoções
                        <pre>{{ selectedFilters.gpu_category }}</pre>
                    </span>
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
                >Modelo placa gráfica</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueModel"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.model"
                        v-model="selectedFilters.model"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.model }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >Memória placa gráfica</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueVRAM"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.vram"
                        v-model="selectedFilters.vram"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.vram }} GB</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >Tipo de interface</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueInterface"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.interface"
                        v-model="selectedFilters.gpu_interface"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.interface }} </span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >Tipo de memória</label
            >
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueTypeVRAM"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.type_vram"
                        v-model="selectedFilters.gpu_type_vram"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.type_vram }} </span>
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
