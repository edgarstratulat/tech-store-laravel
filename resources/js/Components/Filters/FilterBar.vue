<template>
    <div
        class="overflow-y-auto mt-8 h-screen w-full bg-white shadow-lg p-4 rounded-lg"
    >
        <h2 class="text-2xl font-bold mb-4">Filtros</h2>

        <!--Default-->
        <DefaultFilter
            :manufacturer="manufacturer"
            v-model:manufacturerValue="selectedFilters.manufacturer"
            :subcategory="subcategory"
            v-model:subcategoryValue="selectedFilters.subcategory"
            v-model:sort="selectedFilters.sort"
            v-model:stock="selectedFilters.stock"
            v-model:nostock="selectedFilters.nostock"
            v-model:minPrice="selectedFilters.min_price"
            v-model:maxPrice="selectedFilters.max_price"
            v-model:manufacturer="selectedFilters.manufacturer"
        ></DefaultFilter>

        <!--PC Components Filter-->

        <MemoryRamFilter
            v-if="
                !cpuPage &&
                !motherboardPage &&
                !storagePage &&
                !gpuPage &&
                !psuPage &&
                !cpuCoolerPage &&
                !pcCasesPage &&
                !discountPage &&
                !smartphonePage
            "
            :ram="ram"
            v-model:capacityRam="selectedFilters.memoria_ram"
            v-model:typeRam="selectedFilters.type_ram"
            v-model:frequencyRam="selectedFilters.frequecy_ram"
            v-model:latencyRam="selectedFilters.latency_ram"
        ></MemoryRamFilter>

        <ProcessorFilter
            v-if="
                !ramPage &&
                !motherboardPage &&
                !storagePage &&
                !gpuPage &&
                !psuPage &&
                !cpuCoolerPage &&
                !pcCasesPage &&
                !discountPage &&
                !smartphonePage
            "
            :cpu="cpu"
            v-model:modelCPU="selectedFilters.cpu"
            v-model:socketCPU="selectedFilters.cpu_socket"
            v-model:tdpCPU="selectedFilters.cpu_tdp"
        ></ProcessorFilter>

        <StorageFilter
            v-if="
                !ramPage &&
                !motherboardPage &&
                !cpuPage &&
                !gpuPage &&
                !psuPage &&
                !cpuCoolerPage &&
                !pcCasesPage &&
                !discountPage &&
                !smartphonePage
            "
            :armazenamento="armazenamento"
            v-model:capacityDrive="selectedFilters.storage"
            v-model:typeDrive="selectedFilters.storage_type"
            v-model:writingSpeedDrive="selectedFilters.writing_speed_storage"
            v-model:rotationSpeedDrive="selectedFilters.rotation_speed_storage"
        ></StorageFilter>

        <MotherboardFilter
            v-if="
                !ramPage &&
                !storagePage &&
                !cpuPage &&
                !gpuPage &&
                !psuPage &&
                !cpuCoolerPage &&
                !pcCasesPage &&
                !discountPage &&
                !smartphonePage
            "
            :motherboard="motherboard"
            v-model:motherboardFormat="selectedFilters.motherboard_format"
            v-model:motherboardChipset="selectedFilters.motherboard_chipset"
            v-model:motherboardCpuSocket="
                selectedFilters.motherboard_cpu_socket
            "
            v-model:motherboardBluetooth="selectedFilters.motherboard_bluetooth"
            v-model:motherboardWifi="selectedFilters.motherboard_wifi"
        ></MotherboardFilter>

        <GraphicsCardFilter
            v-if="
                !ramPage &&
                !storagePage &&
                !cpuPage &&
                !motherboardPage &&
                !psuPage &&
                !cpuCoolerPage &&
                !pcCasesPage &&
                !discountPage &&
                !smartphonePage
            "
            :gpu="gpu"
            v-model:modelGPU="selectedFilters.gpu_model"
            v-model:categoryGPU="selectedFilters.gpu_category"
            v-model:vramGPU="selectedFilters.gpu_vram"
            v-model:typeVramGPU="selectedFilters.gpu_type_vram"
            v-model:interfaceGPU="selectedFilters.gpu_interface"
        ></GraphicsCardFilter>

        <PowerSupplyFilter
            v-if="
                !ramPage &&
                !storagePage &&
                !cpuPage &&
                !motherboardPage &&
                !gpuPage &&
                !cpuCoolerPage &&
                !pcCasesPage &&
                !discountPage &&
                !smartphonePage
            "
            :powersupply="powersupply"
            v-model:psuFormat="selectedFilters.psu_format"
            v-model:psuWattage="selectedFilters.psu_wattage"
            v-model:psuEfficiency="selectedFilters.psu_efficiency"
            v-model:psuModular="selectedFilters.psu_modular"
        ></PowerSupplyFilter>

        <CpuCoolersFilter
            v-if="
                !ramPage &&
                !storagePage &&
                !cpuPage &&
                !motherboardPage &&
                !gpuPage &&
                !psuPage &&
                !pcCasesPage &&
                !discountPage &&
                !smartphonePage
            "
            :cpuCooler="cpuCooler"
            v-model:socketCooler="selectedFilters.cooler_socket"
            v-model:typeCooler="selectedFilters.cooler_type"
            v-model:fanRPMCooler="selectedFilters.cooler_fan_rpm"
            v-model:rgbCooler="selectedFilters.cooler_rgb"
        ></CpuCoolersFilter>

        <ComputerCasesFilter
            v-if="
                !ramPage &&
                !storagePage &&
                !cpuPage &&
                !motherboardPage &&
                !gpuPage &&
                !psuPage &&
                !cpuCoolerPage &&
                !discountPage &&
                !smartphonePage
            "
            :PCcases="PCcases"
            v-model:casesFormat="selectedFilters.case_format"
            v-model:casesNumberLowerFans="
                selectedFilters.case_number_lower_fans
            "
            v-model:casesNumberUpperFans="
                selectedFilters.case_number_upper_fans
            "
            v-model:casesNumberFrontFans="
                selectedFilters.case_number_front_fans
            "
            v-model:casesNumberRearFans="selectedFilters.case_number_rear_fans"
            v-model:temperedGlass="selectedFilters.case_tempered_glass"
            v-model:casesGpuLength="selectedFilters.case_max_gpu_length"
            v-model:casesCoolerHeight="selectedFilters.case_max_cooler_height"
        ></ComputerCasesFilter>

        <SmartphoneFilter
            v-if="smartphonePage"
            :smartphone="smartphone"
            v-model:capacityStorage="selectedFilters.smartphone_storage"
            v-model:SIM="selectedFilters.smartphone_SIM"
            v-model:familyCPU="selectedFilters.smartphone_family_cpu"
            v-model:CPU="selectedFilters.smartphone_cpu"
            v-model:operating_system="selectedFilters.smartphone_os"
            v-model:screen_resolution="
                selectedFilters.smartphone_screen_resolution
            "
            v-model:screen_inches="selectedFilters.smartphones_screen_inches"
            v-model:screen_hz="selectedFilters.smartphones_screen_hz"
            v-model:screen_type="selectedFilters.smartphones_screen_type"
        ></SmartphoneFilter>

        <button
            @click="applyFilters"
            class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded"
        >
            Aplicar Filtros
        </button>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { router, usePage } from "@inertiajs/vue3";

// import ManufacturerFilter from "./ManufacturerFilter.vue";
// import StockFilter from "./StockFilter.vue";
// import SortFilter from "./SortFilter.vue";
// import MaxMinPriceFilter from "./Max&MinPriceFilter.vue";
// import SubCategoryFilter from "./SubcategoryFilter.vue";
// import ProductStatusFilter from "./ProductStatusFilter.vue";
// import CategoryFilter from "./CategoryFilter.vue";
import MemoryRamFilter from "./MemoryRamFilter.vue";
import ProcessorFilter from "./ProcessorFilter.vue";
import StorageFilter from "./StorageFilter.vue";
import MotherboardFilter from "./MotherboardFilter.vue";
import GraphicsCardFilter from "./GraphicsCardFilter.vue";
import PowerSupplyFilter from "./PowerSupplyFilter.vue";
import CpuCoolersFilter from "./CpuCoolersFilter.vue";
import ComputerCasesFilter from "./ComputerCasesFilter.vue";
import SmartphoneFilter from "./SmartphonesFilter.vue";
import DefaultFilter from "./DefaultFilters.vue";

const page = usePage();
const currentPath = page.url;

const discountPage = currentPath.includes("/promocoes");

const ramPage = currentPath.includes("/componentes/memoria-ram");
const cpuPage = currentPath.includes("/componentes/processadores");
const storagePage = currentPath.includes("/componentes/armazenamento");
const motherboardPage = currentPath.includes("/componentes/motherboards");
const gpuPage = currentPath.includes("/componentes/placas-graficas");
const psuPage = currentPath.includes("/componentes/fontes-de-alimentacao");
const cpuCoolerPage = currentPath.includes("/componentes/cpu-coolers");
const pcCasesPage = currentPath.includes(
    "/componentes/caixas-para-computadores"
);

const smartphonePage = currentPath.includes("/telemoveis");

const props = defineProps({
    manufacturer: Array,
    subcategory: Array,
    category: Array,
    ram: Array,
    cpu: Array,
    armazenamento: Array,
    motherboard: Array,
    gpu: Array,
    powersupply: Array,
    cpuCooler: Array,
    PCcases: Array,
    smartphone: Array,
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

    memoria_ram: [],
    type_ram: [],
    frequecy_ram: [],
    latency_ram: [],

    cpu: [],
    cpu_socket: [],
    cpu_tdp: [],

    storage: [],
    storage_type: [],
    writing_speed_storage: [],
    rotation_speed_storage: [],

    motherboard_format: [],
    motherboard_chipset: [],
    motherboard_cpu_socket: [],
    motherboard_bluetooth: [],
    motherboard_wifi: [],

    gpu_model: [],
    gpu_category: "",
    gpu_vram: [],
    gpu_type_vram: [],
    gpu_interface: [],

    psu_format: [],
    psu_wattage: [],
    psu_efficiency: [],
    psu_modular: [],

    cooler_socket: [],
    cooler_type: "",
    cooler_fan_rpm: [],
    cooler_rgb: [],

    case_format: [],
    case_number_lower_fans: [],
    case_number_upper_fans: [],
    case_number_front_fans: [],
    case_number_rear_fans: [],
    case_tempered_glass: [],
    case_max_gpu_length: [],
    case_max_cooler_height: [],

    smartphone_storage: [],
    smartphone_SIM: [],
    smartphone_family_cpu: [],
    smartphone_cpu: [],
    smartphone_os: [],
    smartphone_screen_resolution: [],
    smartphones_screen_inches: [],
    smartphones_screen_hz: [],
    smartphones_screen_type: [],
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

    //Ram
    if (selectedFilters.value.memoria_ram.length > 0) {
        queryParams["filter[capacidade_ram]"] =
            selectedFilters.value.memoria_ram;
    }
    if (selectedFilters.value.type_ram.length > 0) {
        queryParams["filter[tipo_ram]"] = selectedFilters.value.type_ram;
    }
    if (selectedFilters.value.frequecy_ram.length > 0) {
        queryParams["filter[velocidade_ram]"] =
            selectedFilters.value.frequecy_ram;
    }
    if (selectedFilters.value.latency_ram.length > 0) {
        queryParams["filter[latencia_ram]"] = selectedFilters.value.latency_ram;
    }

    //cpu
    if (selectedFilters.value.cpu.length > 0) {
        queryParams["filter[cpu]"] = selectedFilters.value.cpu;
    }
    if (selectedFilters.value.cpu_socket.length > 0) {
        queryParams["filter[cpu_socket]"] = selectedFilters.value.cpu_socket;
    }
    if (selectedFilters.value.cpu_tdp.length > 0) {
        queryParams["filter[cpu_tdp]"] = selectedFilters.value.cpu_tdp;
    }

    //storage
    if (selectedFilters.value.storage.length > 0) {
        queryParams["filter[capacidade_drive]"] = selectedFilters.value.storage;
    }
    if (selectedFilters.value.storage_type.length > 0) {
        queryParams["filter[tipo_drive]"] = selectedFilters.value.storage_type;
    }
    if (selectedFilters.value.writing_speed_storage.length > 0) {
        queryParams["filter[velocidade_escrita_drive]"] =
            selectedFilters.value.writing_speed_storage;
    }
    if (selectedFilters.value.rotation_speed_storage.length > 0) {
        queryParams["filter[velocidade_rotacao_drive]"] =
            selectedFilters.value.rotation_speed_storage;
    }

    //motherboard
    if (selectedFilters.value.motherboard_format.length > 0) {
        queryParams["filter[formato_motherboard]"] =
            selectedFilters.value.motherboard_format;
    }
    if (selectedFilters.value.motherboard_chipset.length > 0) {
        queryParams["filter[chipset_motherboard]"] =
            selectedFilters.value.motherboard_chipset;
    }
    if (selectedFilters.value.motherboard_cpu_socket.length > 0) {
        queryParams["filter[cpu_socket_motherboard]"] =
            selectedFilters.value.motherboard_cpu_socket;
    }
    if (selectedFilters.value.motherboard_wifi.length > 0) {
        queryParams["filter[motherboard_wifi]"] =
            selectedFilters.value.motherboard_wifi;
    }
    if (selectedFilters.value.motherboard_bluetooth.length > 0) {
        queryParams["filter[motherboard_bluetooth]"] =
            selectedFilters.value.motherboard_bluetooth;
    }

    //gpu
    if (selectedFilters.value.gpu_model.length > 0) {
        queryParams["filter[modelo_gpu]"] = selectedFilters.value.gpu_model;
    }
    if (selectedFilters.value.gpu_category) {
        queryParams["filter[categoria_gpu]"] =
            selectedFilters.value.gpu_category;
    }
    if (selectedFilters.value.gpu_vram.length > 0) {
        queryParams["filter[vram_gpu]"] = selectedFilters.value.gpu_vram;
    }
    if (selectedFilters.value.gpu_type_vram.length > 0) {
        queryParams["filter[tipo_vram_gpu]"] =
            selectedFilters.value.gpu_type_vram;
    }
    if (selectedFilters.value.gpu_interface.length > 0) {
        queryParams["filter[interface_gpu]"] =
            selectedFilters.value.gpu_interface;
    }

    //psu
    if (selectedFilters.value.psu_format.length > 0) {
        queryParams["filter[formato_psu]"] = selectedFilters.value.psu_format;
    }
    if (selectedFilters.value.psu_wattage.length > 0) {
        queryParams["filter[watts_psu]"] = selectedFilters.value.psu_wattage;
    }
    if (selectedFilters.value.psu_efficiency.length > 0) {
        queryParams["filter[efficiency_80_plus]"] =
            selectedFilters.value.psu_efficiency;
    }
    if (selectedFilters.value.psu_modular.length > 0) {
        queryParams["filter[modular_psu]"] = selectedFilters.value.psu_modular;
    }

    //cpu cooler
    if (selectedFilters.value.cooler_socket.length > 0) {
        queryParams["filter[cooler_socket]"] =
            selectedFilters.value.cooler_socket;
    }
    if (selectedFilters.value.cooler_type) {
        queryParams["filter[tipo_cooler]"] = selectedFilters.value.cooler_type;
    }
    if (selectedFilters.value.cooler_fan_rpm.length > 0) {
        queryParams["filter[cooler_fan_rpm]"] =
            selectedFilters.value.cooler_fan_rpm;
    }
    if (selectedFilters.value.cooler_rgb.length > 0) {
        queryParams["filter[fan_rgb]"] = selectedFilters.value.cooler_rgb;
    }

    // PC Cases
    if (selectedFilters.value.case_format.length > 0) {
        queryParams["filter[case_format]"] = selectedFilters.value.case_format;
    }
    if (selectedFilters.value.case_number_lower_fans.length > 0) {
        queryParams["filter[case_number_lower_fans]"] =
            selectedFilters.value.case_number_lower_fans;
    }
    if (selectedFilters.value.case_number_upper_fans.length > 0) {
        queryParams["filter[case_number_upper_fans]"] =
            selectedFilters.value.case_number_upper_fans;
    }
    if (selectedFilters.value.case_number_front_fans.length > 0) {
        queryParams["filter[case_number_front_fans]"] =
            selectedFilters.value.case_number_front_fans;
    }
    if (selectedFilters.value.case_number_rear_fans.length > 0) {
        queryParams["filter[case_number_rear_fans]"] =
            selectedFilters.value.case_number_rear_fans;
    }
    if (selectedFilters.value.case_tempered_glass.length > 0) {
        queryParams["filter[tempered_glass]"] =
            selectedFilters.value.case_tempered_glass;
    }
    if (selectedFilters.value.case_max_gpu_length.length > 0) {
        queryParams["filter[case_max_gpu_length]"] =
            selectedFilters.value.case_max_gpu_length;
    }
    if (selectedFilters.value.case_max_cooler_height.length > 0) {
        queryParams["filter[case_max_cooler_height]"] =
            selectedFilters.value.case_max_cooler_height;
    }

    // Smartphones

    if (selectedFilters.value.smartphone_storage.length > 0) {
        queryParams["filter[smartphone_capacity]"] =
            selectedFilters.value.smartphone_storage;
    }
    if (selectedFilters.value.smartphone_SIM.length > 0) {
        queryParams["filter[smartphone_sim]"] =
            selectedFilters.value.smartphone_SIM;
    }
    if (selectedFilters.value.smartphone_family_cpu.length > 0) {
        queryParams["filter[group_processor]"] =
            selectedFilters.value.smartphone_family_cpu;
    }
    if (selectedFilters.value.smartphone_cpu.length > 0) {
        queryParams["filter[smartphone_processor]"] =
            selectedFilters.value.smartphone_cpu;
    }
    if (selectedFilters.value.smartphone_os.length > 0) {
        queryParams["filter[smartphone_operating_system]"] =
            selectedFilters.value.smartphone_os;
    }
    if (selectedFilters.value.smartphone_screen_resolution.length > 0) {
        queryParams["filter[smartphone_screen_resolution]"] =
            selectedFilters.value.smartphone_screen_resolution;
    }
    if (selectedFilters.value.smartphones_screen_inches.length > 0) {
        queryParams["filter[smartphone_screen_inches]"] =
            selectedFilters.value.smartphones_screen_inches;
    }
    if (selectedFilters.value.smartphones_screen_hz.length > 0) {
        queryParams["filter[smartphone_screen_hz]"] =
            selectedFilters.value.smartphones_screen_hz;
    }
    if (selectedFilters.value.smartphones_screen_type.length > 0) {
        queryParams["filter[smartphone_screen_type]"] =
            selectedFilters.value.smartphones_screen_type;
    }

    console.log(queryParams);

    router.get(window.location.pathname, queryParams);
};
</script>
