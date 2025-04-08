<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { router, usePage } from "@inertiajs/vue3";

const page = usePage();
const currentPath = page.url;

const ramPage = currentPath.includes("/componentes/memorias-ram");
const cpuPage = currentPath.includes("/componentes/processadores");
const armazenamentoPage = currentPath.includes("/componentes/armazenamento");
const gpuPage = currentPath.includes("/componentes/placas-graficas");
const moboPage = currentPath.includes("/componentes/motherboards");
const psuPage = currentPath.includes("/componentes/fontes-de-alimentacao");

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

    armazenamento: [],
    type_ssd: [],
    writing_speed: [],
    rotation_speed: [],

    cpu: [],
    socket: [],
    tdp: [],

    memoria_ram: [],
    type_ram: [],
    frequecy_ram: [],
    latency: [],

    gpu_category: "",
    gpu_model: [],
    vram: [],
    gpu_type_vram: [],
    gpu_interface: [],

    format: [],
    chipset: [],
    cpu_socket: [],
    bluetooth: [],
    wifi: [],

    efficiency: [],
    wattage: [],
    type_psu: [],
    modular: [],
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

    //Storage
    if (selectedFilters.value.armazenamento) {
        queryParams["filter[capacidade_drive]"] =
            selectedFilters.value.armazenamento;
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

    //RAM
    if (selectedFilters.value.type_ram) {
        queryParams["filter[tipo_ram]"] = selectedFilters.value.type_ram;
    }
    if (selectedFilters.value.memoria_ram) {
        queryParams["filter[capacidade_ram]"] =
            selectedFilters.value.memoria_ram;
    }
    if (selectedFilters.value.frequecy_ram) {
        queryParams["filter[velocidade_ram]"] =
            selectedFilters.value.frequecy_ram;
    }
    if (selectedFilters.value.latency) {
        queryParams["filter[latencia_ram]"] = selectedFilters.value.latency;
    }

    //CPU
    if (selectedFilters.value.cpu) {
        queryParams["filter[cpu]"] = selectedFilters.value.cpu;
    }
    if (selectedFilters.value.socket) {
        queryParams["filter[cpu_socket]"] = selectedFilters.value.socket;
    }
    if (selectedFilters.value.tdp) {
        queryParams["filter[cpu_tdp]"] = selectedFilters.value.tdp;
    }

    //GPU
    if (selectedFilters.value.gpu_category) {
        queryParams["filter[gpu_category]"] =
            selectedFilters.value.gpu_category;
    }
    if (selectedFilters.value.gpu_model) {
        queryParams["filter[gpu_model]"] = selectedFilters.value.gpu_model;
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

    //Motherboard
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

    //Psu
    if (selectedFilters.value.efficiency) {
        queryParams["filter[efficiency_80_plus]"] =
            selectedFilters.value.efficiency;
    }
    if (selectedFilters.value.wattage) {
        queryParams["filter[powersupply_wattage]"] =
            selectedFilters.value.wattage;
    }
    if (selectedFilters.value.type_psu) {
        queryParams["filter[powersupply_format]"] =
            selectedFilters.value.type_psu;
    }
    if (selectedFilters.value.modular) {
        queryParams["filter[powersupply_modular]"] =
            selectedFilters.value.modular;
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
        armazenamento: {
            type: Array,
            default: () => [],
        },
        cpu: {
            type: Array,
            default: () => [],
        },
        gpu: {
            type: Array,
            default: () => [],
        },
        motherboard: {
            type: Array,
            default: () => [],
        },
        powersupply: {
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
        uniqueSocket() {
            const sizeRAM = new Set();
            return this.cpu.filter((ram) => {
                if (!sizeRAM.has(ram.socket)) {
                    sizeRAM.add(ram.socket);
                    return true;
                }
                return false;
            });
        },
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
        uniqueCPUSocket() {
            const sizeRAM = new Set();
            return this.motherboard.filter((ram) => {
                if (!sizeRAM.has(ram.socket)) {
                    sizeRAM.add(ram.socket);
                    return true;
                }
                return false;
            });
        },
        uniqueEfficiency() {
            const sizeRAM = new Set();
            return this.powersupply.filter((ram) => {
                if (!sizeRAM.has(ram.efficiency)) {
                    sizeRAM.add(ram.efficiency);
                    return true;
                }
                return false;
            });
        },
        uniqueWattage() {
            const sizeRAM = new Set();
            return this.powersupply.filter((ram) => {
                if (!sizeRAM.has(ram.wattage)) {
                    sizeRAM.add(ram.wattage);
                    return true;
                }
                return false;
            });
        },
        uniquePSUFormat() {
            const sizeRAM = new Set();
            return this.powersupply.filter((ram) => {
                if (!sizeRAM.has(ram.format)) {
                    sizeRAM.add(ram.format);
                    return true;
                }
                return false;
            });
        },
        uniqueModular() {
            const sizeRAM = new Set();
            return this.powersupply.filter((ram) => {
                if (!sizeRAM.has(ram.modular)) {
                    sizeRAM.add(ram.modular);
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
        <h2 class="text-2xl font-bold mb-4">Filtros</h2>

        <div>
            <label class="block text-md font-semibold mb-1">Ordenar por:</label>
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
            <label class="block text-md font-semibold mb-1">Stock</label>
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
            <label class="block text-md font-semibold mb-1">Preço</label>
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

        <div
            v-if="
                !cpuPage &&
                !armazenamentoPage &&
                !gpuPage &&
                !moboPage &&
                !ramPage &&
                !psuPage
            "
            class="mt-4"
        >
            <label class="block text-md font-semibold mb-1">Categoria</label>
            <select
                v-model="selectedFilters.subcategory"
                class="w-full border p-1 rounded"
            >
                <option
                    v-for="manu in subcategory"
                    :value="manu.id"
                    :key="manu.id"
                >
                    {{ manu.name }}
                </option>
            </select>
        </div>

        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">Fabricante</label>
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
            <label class="block text-md font-semibold mb-1"
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

        <!--Home Page-->

        <div
            v-if="
                !cpuPage &&
                !armazenamentoPage &&
                !gpuPage &&
                !moboPage &&
                !psuPage
            "
            class="mt-4"
        >
            <label class="block text-md font-semibold mb-1"
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

        <div
            v-if="!cpuPage && !ramPage && !gpuPage && !moboPage && !psuPage"
            class="mt-4"
        >
            <label class="block text-md font-semibold mb-1"
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
                        v-model="selectedFilters.armazenamento"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{
                        option.size >= 1000
                            ? option.size / 1000 + " TB"
                            : option.size + " GB"
                    }}</span>
                </label>
            </div>
        </div>

        <div
            v-if="
                !ramPage &&
                !armazenamentoPage &&
                !gpuPage &&
                !moboPage &&
                !psuPage
            "
            class="mt-4"
        >
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

        <div
            v-if="
                !ramPage &&
                !armazenamentoPage &&
                !gpuPage &&
                !cpuPage &&
                !psuPage
            "
        >
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
        </div>

        <div
            v-if="
                !ramPage &&
                !armazenamentoPage &&
                !gpuPage &&
                !cpuPage &&
                !moboPage
            "
        >
            <div class="mt-4">
                <label class="block text-md font-medium mb-1"
                    >Certificação 80 PLUS</label
                >
                <div
                    class="flex items-center space-x-4"
                    v-for="option in uniqueEfficiency"
                    :key="option.id"
                >
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            :value="option.efficiency"
                            v-model="selectedFilters.efficiency"
                            class="form-checkbox size-4"
                        />
                        <span class="ml-2">{{ option.efficiency }} </span>
                    </label>
                </div>
            </div>
        </div>

        <!--RAM Page-->
        <div v-if="ramPage">
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
                            v-model="selectedFilters.latency"
                            class="form-checkbox size-4"
                        />
                        <span class="ml-2">CL{{ option.latency }}</span>
                    </label>
                </div>
            </div>
        </div>

        <!--CPU Page-->

        <div v-if="cpuPage">
            <div class="mt-4">
                <label class="block text-md font-semibold mb-1"
                    >Socket Processador</label
                >
                <div
                    class="flex items-center space-x-4"
                    v-for="option in uniqueSocket"
                    :key="option.id"
                >
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            :value="option.socket"
                            v-model="selectedFilters.socket"
                            class="form-checkbox size-4"
                        />
                        <span class="ml-2">{{ option.socket }}</span>
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
        </div>

        <!--Storage Page-->
        <div v-if="armazenamentoPage">
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
                        <span class="ml-2"
                            >{{ option.writing_speed }} MB/s</span
                        >
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
                        <span class="ml-2"
                            >{{ option.rotation_speed }} RPM</span
                        >
                    </label>
                </div>
            </div>
        </div>

        <!--GPU Component-->
        <div
            v-if="
                !cpuPage &&
                !armazenamentoPage &&
                !ramPage &&
                !moboPage &&
                !psuPage
            "
            class="mt-4"
        >
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
                        v-model="selectedFilters.gpu_model"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.model }}</span>
                </label>
            </div>
        </div>

        <!--GPU Page-->
        <div v-if="gpuPage">
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
        </div>

        <!--Motherboard Page-->
        <div v-if="moboPage">
            <div class="mt-4">
                <label class="block text-md font-semibold mb-1"
                    >Socket do Processador</label
                >
                <div
                    class="flex items-center space-x-4"
                    v-for="option in uniqueCPUSocket"
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
        </div>

        <div v-if="psuPage">
            <div class="mt-4">
                <label class="block text-md font-medium mb-1"
                    >Energia Total</label
                >
                <div
                    class="flex items-center space-x-4"
                    v-for="option in uniqueWattage"
                    :key="option.id"
                >
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            :value="option.wattage"
                            v-model="selectedFilters.wattage"
                            class="form-checkbox size-4"
                        />
                        <span class="ml-2">{{ option.wattage }} W </span>
                    </label>
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-md font-medium mb-1"
                    >Formato da PSU</label
                >
                <div
                    class="flex items-center space-x-4"
                    v-for="option in uniquePSUFormat"
                    :key="option.id"
                >
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            :value="option.format"
                            v-model="selectedFilters.format"
                            class="form-checkbox size-4"
                        />
                        <span class="ml-2">{{ option.format }} </span>
                    </label>
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-md font-medium mb-1"
                    >Tipo de Cabo</label
                >
                <div
                    class="flex items-center space-x-4"
                    v-for="option in uniqueModular"
                    :key="option.id"
                >
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            :value="option.modular"
                            v-model="selectedFilters.modular"
                            class="form-checkbox size-4"
                        />
                        <span class="ml-2">{{ option.modular }} </span>
                    </label>
                </div>
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
