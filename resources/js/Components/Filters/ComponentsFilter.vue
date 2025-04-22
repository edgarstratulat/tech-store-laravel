<template>
    <!--Ram memory page-->
    <div
        v-if="
            !cpuPage &&
            !storagePage &&
            !motherboardPage &&
            !gpuPage &&
            !psuPage &&
            !cpuCoolerPage &&
            !pcCasePage
        "
    >
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("ram-capacity")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueSizesRam()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.size"
                        class="form-checkbox size-4"
                        @change="updateMemoryCapacity"
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
            <label class="block text-md font-semibold mb-1"
                >{{ t("ram-type") }}
            </label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueTypeRam()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.type"
                        @change="updateMemoryType"
                        class="form-checkbox size-4"
                    />
                    <span class="ml-2">{{ option.type }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >{{ t("ram-speed") }}
            </label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueFrequencyRam()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.frequency"
                        class="form-checkbox size-4"
                        @change="updateMemoryFrequency"
                    />
                    <span class="ml-2">{{ option.frequency }} Mhz</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1"
                >{{ t("ram-latency") }}
            </label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueLatencyRam()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.latency"
                        class="form-checkbox size-4"
                        @change="updateMemoryLatency"
                    />
                    <span class="ml-2">CL{{ option.latency }}</span>
                </label>
            </div>
        </div>
    </div>

    <!--CPU Page-->
    <div
        v-if="
            !ramPage &&
            !storagePage &&
            !motherboardPage &&
            !gpuPage &&
            !psuPage &&
            !cpuCoolerPage &&
            !pcCasePage
        "
    >
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("processor-family")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueCPU()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.model"
                        class="form-checkbox size-4"
                        @change="updateModelCPU"
                    />
                    <span class="ml-2">{{ option.model }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("processor-socket")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueSocket()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.socket"
                        class="form-checkbox size-4"
                        @change="updateSocketCPU"
                    />
                    <span class="ml-2">{{ option.socket }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("processor-tdp")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueTDP()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.tdp"
                        class="form-checkbox size-4"
                        @change="updateTDPcpu"
                    />
                    <span class="ml-2">{{ option.tdp }} W</span>
                </label>
            </div>
        </div>
    </div>

    <!--Storage Page-->

    <div
        v-if="
            !ramPage &&
            !cpuPage &&
            !motherboardPage &&
            !gpuPage &&
            !psuPage &&
            !cpuCoolerPage &&
            !pcCasePage
        "
    >
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("storage-capacity")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueSizesDrive()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.size"
                        class="form-checkbox size-4"
                        @change="updateDriveCapacity"
                    />
                    <span class="ml-2">{{
                        option.size >= 1000
                            ? option.size / 1000 + " TB"
                            : option.size + " GB"
                    }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">{{
                t("storage-type")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueTypeDrive()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.type"
                        class="form-checkbox size-4"
                        @change="updateDriveType"
                    />
                    <span class="ml-2">{{ option.type }} </span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">{{
                t("storage-ssd")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueWritingSpeedDrive()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.writing_speed"
                        class="form-checkbox size-4"
                        @change="updateWritingSpeedDrive"
                    />
                    <span class="ml-2">{{ option.writing_speed }} MB/s</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">{{
                t("storage-hdd")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueRotationArmazenamento()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.rotation_speed"
                        class="form-checkbox size-4"
                        @change="updateRotationSpeedDrive"
                    />
                    <span class="ml-2">{{ option.rotation_speed }} RPM</span>
                </label>
            </div>
        </div>
    </div>
    <div
        v-if="
            !ramPage &&
            !storagePage &&
            !cpuPage &&
            !gpuPage &&
            !psuPage &&
            !cpuCoolerPage &&
            !pcCasePage
        "
    >
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("motherboard-format")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueFormat()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.format"
                        class="form-checkbox size-4"
                        @change="updateMotherboardFormat"
                    />
                    <span class="ml-2">{{ option.format }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("motherboard-chipset")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueChipset()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.chipset"
                        class="form-checkbox size-4"
                        @change="updateMotherboardChipset"
                    />
                    <span class="ml-2">{{ option.chipset }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("motherboard-cpu-socket")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueCpuSocket()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.cpu_socket"
                        class="form-checkbox size-4"
                        @change="updateMotherboardCpuSocket"
                    />
                    <span class="ml-2">{{ option.cpu_socket }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">{{
                t("motherboard-wifi")
            }}</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="true"
                        class="form-checkbox size-4"
                        @change="updateMotherboardWifi"
                    />
                    <span class="ml-2">{{ t("yes") }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">{{
                t("motherboard-bluetooth")
            }}</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        value="true"
                        class="form-checkbox size-4"
                        @change="updateMotherboardBluetooth"
                    />
                    <span class="ml-2">{{ t("yes") }}</span>
                </label>
            </div>
        </div>
    </div>
    <div
        v-if="
            !ramPage &&
            !storagePage &&
            !cpuPage &&
            !motherboardPage &&
            !psuPage &&
            !cpuCoolerPage &&
            !pcCasePage
        "
    >
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("gpu-category")
            }}</label>
            <select
                :value="categoryGPU"
                @change="updateCategoryGPU"
                class="w-full border p-1 rounded"
            >
                <option
                    v-for="manu in uniqueCategory()"
                    :value="manu.id"
                    :key="manu.id"
                >
                    {{ manu.category }}
                </option>
            </select>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("gpu-model")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueGPU()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.model"
                        class="form-checkbox size-4"
                        @change="updateModelGPU"
                    />
                    <span class="ml-2">{{ option.model }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("gpu-memory")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueVRAM()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.vram"
                        class="form-checkbox size-4"
                        @change="updateVramGPU"
                    />
                    <span class="ml-2">{{ option.vram }} GB</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("gpu-type-memory")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueTypeVram()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.type_vram"
                        class="form-checkbox size-4"
                        @change="updateTypeVramGPU"
                    />
                    <span class="ml-2">{{ option.type_vram }} </span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("gpu-interface")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueInterface()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.interface"
                        class="form-checkbox size-4"
                        @change="updateInterface"
                    />
                    <span class="ml-2">{{ option.interface }} </span>
                </label>
            </div>
        </div>
    </div>
    <div
        v-if="
            !ramPage &&
            !storagePage &&
            !cpuPage &&
            !motherboardPage &&
            !gpuPage &&
            !cpuCoolerPage &&
            !pcCasePage
        "
    >
        <div>
            <div class="mt-4">
                <label class="block text-md font-semibold mb-1">{{
                    t("psu-format")
                }}</label>
                <div
                    class="flex items-center space-x-4"
                    v-for="option in uniquePSUFormat()"
                    :key="option.id"
                >
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            :value="option.format"
                            class="form-checkbox size-4"
                            @change="updatePSUFormat"
                        />
                        <span class="ml-2">{{ option.format }} </span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("psu-wattage")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueWattage()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.wattage"
                        class="form-checkbox size-4"
                        @change="updatePSUWattage"
                    />
                    <span class="ml-2">{{ option.wattage }} W </span>
                </label>
            </div>
        </div>
        <div>
            <div class="mt-4">
                <label class="block text-md font-semibold mb-1">{{
                    t("psu-efficiency")
                }}</label>
                <div
                    class="flex items-center space-x-4"
                    v-for="option in uniqueEfficiency()"
                    :key="option.id"
                >
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            :value="option.efficiency"
                            class="form-checkbox size-4"
                            @change="updatePSUEfficiency"
                        />
                        <span class="ml-2">{{ option.efficiency }} </span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">{{
                t("psu-modular")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueModular()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.modular"
                        class="form-checkbox size-4"
                        @change="updatePSUModular"
                    />
                    <span class="ml-2">{{ option.modular }} </span>
                </label>
            </div>
        </div>
    </div>
    <div
        v-if="
            !ramPage &&
            !storagePage &&
            !cpuPage &&
            !motherboardPage &&
            !gpuPage &&
            !psuPage &&
            !pcCasePage
        "
    >
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("coolers-category")
            }}</label>
            <select
                :value="typeCooler"
                @change="updateTypeCooler"
                class="w-full border p-1 rounded"
            >
                <option
                    v-for="manu in uniqueType()"
                    :value="manu.type"
                    :key="manu.id"
                >
                    {{ manu.type }}
                </option>
            </select>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("coolers-compatibility")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueSocketCooler()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.socket"
                        class="form-checkbox size-4"
                        @change="updateSocketCooler"
                    />
                    <span class="ml-2">{{ option.socket }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("coolers-speed")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueFanRPM()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.fan_rpm"
                        class="form-checkbox size-4"
                        @change="updateFanRPMCooler"
                    />
                    <span class="ml-2">{{ option.fan_rpm }} RPM</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-medium mb-1">{{
                t("coolers-rgb")
            }}</label>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        class="form-checkbox size-4"
                        @change="updateRGBCooler"
                    />
                    <span class="ml-2">{{ t("yes") }}</span>
                </label>
            </div>
        </div>
    </div>
    <div
        v-if="
            !ramPage &&
            !cpuPage &&
            !storagePage &&
            !motherboardPage &&
            !gpuPage &&
            !psuPage &&
            !cpuCoolerPage
        "
    >
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("case-format")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueFormatCase()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.format"
                        class="form-checkbox size-4"
                        @change="updateCasesFormat"
                    />
                    <span class="ml-2">{{ option.format }} </span>
                </label>
            </div>
        </div>
        <div>
            <div class="mt-4">
                <label class="block text-md font-semibold mb-1">{{
                    t("case-glass")
                }}</label>
                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            value="true"
                            class="form-checkbox size-4"
                            @change="updateCasesGlass"
                        />
                        <span class="ml-2">{{ t("yes") }}</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("case-top-fans")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueUpperFans()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.number_upper_fans"
                        class="form-checkbox size-4"
                        @change="updateCasesUpperFans"
                    />
                    <span class="ml-2">{{ option.number_upper_fans }}</span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("case-lower-fans")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueLowerFans()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.number_lower_fans"
                        class="form-checkbox size-4"
                        @change="updateCasesLowerFans"
                    />
                    <span class="ml-2">{{ option.number_lower_fans }} </span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("case-front-fans")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueFrontFans()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.number_front_fans"
                        class="form-checkbox size-4"
                        @change="updateCasesFrontFans"
                    />
                    <span class="ml-2">{{ option.number_front_fans }} </span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("case-rear-fans")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueRearFans()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.number_rear_fans"
                        class="form-checkbox size-4"
                        @change="updateCasesRearFans"
                    />
                    <span class="ml-2">{{ option.number_rear_fans }} </span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("case-gpu-max")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueGPUlength()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.max_gpu_length"
                        class="form-checkbox size-4"
                        @change="updateCasesGpuLength"
                    />
                    <span class="ml-2">{{ option.max_gpu_length }} mm </span>
                </label>
            </div>
        </div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("case-cooler-max")
            }}</label>
            <div
                class="flex items-center space-x-4"
                v-for="option in uniqueCoolerHeight()"
                :key="option.id"
            >
                <label class="inline-flex items-center">
                    <input
                        type="checkbox"
                        :value="option.max_cooler_height"
                        class="form-checkbox size-4"
                        @change="updateCasesCoolerHeight"
                    />
                    <span class="ml-2">{{ option.max_cooler_height }} mm </span>
                </label>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useI18n } from "vue-i18n";
import { usePage } from "@inertiajs/vue3";
const { t } = useI18n();
const page = usePage().url;

const ramPage = page.includes("/components/ram-memory");
const cpuPage = page.includes("/components/processors");
const storagePage = page.includes("/components/storage");
const motherboardPage = page.includes("/components/motherboard");
const gpuPage = page.includes("/components/graphic-cards");
const psuPage = page.includes("/components/power-supplies");
const cpuCoolerPage = page.includes("/components/cpu-coolers");
const pcCasePage = page.includes("/components/computer-cases");

const props = defineProps({
    //Props
    cpu: Array,
    ram: Array,
    storage: Array,
    motherboard: Array,
    gpu: Array,
    powersupply: Array,
    cpuCooler: Array,
    PCcases: Array,

    capacityRam: Array,
    typeRam: Array,
    frequencyRam: Array,
    latencyRam: Array,

    modelCPU: Array,
    socketCPU: Array,
    tdpCPU: Array,

    capacityDrive: Array,
    typeDrive: Array,
    writingSpeedDrive: Array,
    rotationSpeedDrive: Array,

    motherboardFormat: Array,
    motherboardChipset: Array,
    motherboardCpuSocket: Array,
    motherboardBluetooth: Array,
    motherboardWifi: Array,

    modelGPU: Array,
    categoryGPU: String,
    vramGPU: Array,
    typeVramGPU: Array,
    interfaceGPU: Array,

    psuFormat: Array,
    psuWattage: Array,
    psuEfficiency: Array,
    psuModular: Array,

    socketCooler: Array,
    typeCooler: String,
    fanRPMCooler: Array,
    rgbCooler: Array,

    casesFormat: Array,
    casesNumberLowerFans: Array,
    casesNumberUpperFans: Array,
    casesNumberFrontFans: Array,
    casesNumberRearFans: Array,
    temperedGlass: Array,
    casesGpuLength: Array,
    casesCoolerHeight: Array,
});

const emit = defineEmits([
    "update:capacityRam",
    "update:typeRam",
    "update:frequencyRam",
    "update:latencyRam",
    "update:modelCPU",
    "update:socketCPU",
    "update:tdpCPU",
    "update:capacityDrive",
    "update:typeDrive",
    "update:writingSpeedDrive",
    "update:rotationSpeedDrive",
    "update:motherboardFormat",
    "update:motherboardChipset",
    "update:motherboardCpuSocket",
    "update:motherboardBluetooth",
    "update:motherboardWifi",
    "update:modelGPU",
    "update:categoryGPU",
    "update:vramGPU",
    "update:typeVramGPU",
    "update:interfaceGPU",
    "update:psuFormat",
    "update:psuWattage",
    "update:psuEfficiency",
    "update:psuModular",
    "update:socketCooler",
    "update:typeCooler",
    "update:fanRPMCooler",
    "update:rgbCooler",
    "update:casesFormat",
    "update:casesNumberLowerFans",
    "update:casesNumberUpperFans",
    "update:casesNumberFrontFans",
    "update:casesNumberRearFans",
    "update:temperedGlass",
    "update:casesGpuLength",
    "update:casesCoolerHeight",
]);

//RAM Memory
function updateMemoryCapacity(event) {
    const value = event.target.value;
    let updated = [...props.capacityRam];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:capacityRam", updated);
}

function updateMemoryType(event) {
    const value = event.target.value;
    let updated = [...props.typeRam];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:typeRam", updated);
}
function updateMemoryFrequency(event) {
    const value = event.target.value;
    let updated = [...props.frequencyRam];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:frequencyRam", updated);
}
function updateMemoryLatency(event) {
    const value = event.target.value;
    let updated = [...props.latencyRam];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }
    emit("update:latencyRam", updated);
}

const uniqueSizesRam = () => {
    const sizeRAM = new Set();
    return props.ram.filter((ram) => {
        if (!sizeRAM.has(ram.size)) {
            sizeRAM.add(ram.size);
            return true;
        }
        return false;
    });
};
const uniqueTypeRam = () => {
    const sizeRAM = new Set();
    return props.ram.filter((ram) => {
        if (!sizeRAM.has(ram.type)) {
            sizeRAM.add(ram.type);
            return true;
        }
        return false;
    });
};
const uniqueFrequencyRam = () => {
    const sizeRAM = new Set();
    return props.ram.filter((ram) => {
        if (!sizeRAM.has(ram.frequency)) {
            sizeRAM.add(ram.frequency);
            return true;
        }
        return false;
    });
};
const uniqueLatencyRam = () => {
    const sizeRAM = new Set();
    return props.ram.filter((ram) => {
        if (!sizeRAM.has(ram.latency)) {
            sizeRAM.add(ram.latency);
            return true;
        }
        return false;
    });
};

//CPU

function updateModelCPU(event) {
    const value = event.target.value;
    let updated = [...props.modelCPU];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:modelCPU", updated);
}
function updateSocketCPU(event) {
    const value = event.target.value;
    let updated = [...props.socketCPU];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:socketCPU", updated);
}
function updateTDPcpu(event) {
    const value = event.target.value;
    let updated = [...props.tdpCPU];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:tdpCPU", updated);
}

const uniqueCPU = () => {
    const sizeRAM = new Set();
    return props.cpu.filter((ram) => {
        if (!sizeRAM.has(ram.model)) {
            sizeRAM.add(ram.model);
            return true;
        }
        return false;
    });
};
const uniqueSocket = () => {
    const sizeRAM = new Set();
    return props.cpu.filter((ram) => {
        if (!sizeRAM.has(ram.socket)) {
            sizeRAM.add(ram.socket);
            return true;
        }
        return false;
    });
};
const uniqueTDP = () => {
    const sizeRAM = new Set();
    return props.cpu.filter((ram) => {
        if (!sizeRAM.has(ram.tdp)) {
            sizeRAM.add(ram.tdp);
            return true;
        }
        return false;
    });
};

// Storage

function updateDriveCapacity(event) {
    const value = event.target.value;
    let updated = [...props.capacityDrive];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:capacityDrive", updated);
}

function updateDriveType(event) {
    const value = event.target.value;
    let updated = [...props.typeDrive];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:typeDrive", updated);
}

function updateWritingSpeedDrive(event) {
    const value = event.target.value;
    let updated = [...props.writingSpeedDrive];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:writingSpeedDrive", updated);
}

function updateRotationSpeedDrive(event) {
    const value = event.target.value;
    let updated = [...props.rotationSpeedDrive];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:rotationSpeedDrive", updated);
}

const uniqueSizesDrive = () => {
    const sizeRAM = new Set();
    return props.storage.filter((ram) => {
        if (!sizeRAM.has(ram.size)) {
            sizeRAM.add(ram.size);
            return true;
        }
        return false;
    });
};
const uniqueTypeDrive = () => {
    const sizeRAM = new Set();
    return props.storage.filter((ram) => {
        if (!sizeRAM.has(ram.type)) {
            sizeRAM.add(ram.type);
            return true;
        }
        return false;
    });
};
const uniqueWritingSpeedDrive = () => {
    const sizeRAM = new Set();
    return props.storage.filter((ram) => {
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
};
const uniqueRotationArmazenamento = () => {
    const sizeRAM = new Set();
    return props.storage.filter((ram) => {
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
};

//Motherboard
function updateMotherboardFormat(event) {
    const value = event.target.value;
    let updated = [...props.motherboardFormat];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:motherboardFormat", updated);
}
function updateMotherboardChipset(event) {
    const value = event.target.value;
    let updated = [...props.motherboardChipset];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:motherboardChipset", updated);
}

function updateMotherboardCpuSocket(event) {
    const value = event.target.value;
    let updated = [...props.motherboardCpuSocket];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:motherboardCpuSocket", updated);
}

function updateMotherboardBluetooth(event) {
    const value = event.target.value;
    let updated = [...props.motherboardWifi];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:motherboardWifi", updated);
}
function updateMotherboardWifi(event) {
    const value = event.target.value;
    let updated = [...props.motherboardBluetooth];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:motherboardBluetooth", updated);
}

const uniqueFormat = () => {
    const sizeRAM = new Set();
    return props.motherboard.filter((ram) => {
        if (!sizeRAM.has(ram.format)) {
            sizeRAM.add(ram.format);
            return true;
        }
        return false;
    });
};
const uniqueChipset = () => {
    const sizeRAM = new Set();
    return props.motherboard.filter((ram) => {
        if (!sizeRAM.has(ram.chipset)) {
            sizeRAM.add(ram.chipset);
            return true;
        }
        return false;
    });
};
const uniqueCpuSocket = () => {
    const sizeRAM = new Set();
    return props.motherboard.filter((ram) => {
        if (!sizeRAM.has(ram.cpu_socket)) {
            sizeRAM.add(ram.cpu_socket);
            return true;
        }
        return false;
    });
};

//Graphics Card
function updateModelGPU(event) {
    const value = event.target.value;
    let updated = [...props.modelGPU];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:modelGPU", updated);
}

function updateCategoryGPU(event) {
    emit("update:categoryGPU", event.target.value);
}

function updateVramGPU(event) {
    const value = event.target.value;
    let updated = [...props.vramGPU];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:vramGPU", updated);
}

function updateTypeVramGPU(event) {
    const value = event.target.value;
    let updated = [...props.typeVramGPU];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:typeVramGPU", updated);
}

function updateInterface(event) {
    const value = event.target.value;
    let updated = [...props.interfaceGPU];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:interfaceGPU", updated);
}

const uniqueGPU = () => {
    const sizeRAM = new Set();
    return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.model)) {
            sizeRAM.add(ram.model);
            return true;
        }
        return false;
    });
};
const uniqueCategory = () => {
    const sizeRAM = new Set();
    return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.category)) {
            sizeRAM.add(ram.category);
            return true;
        }
        return false;
    });
};
const uniqueVRAM = () => {
    const sizeRAM = new Set();
    return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.vram)) {
            sizeRAM.add(ram.vram);
            return true;
        }
        return false;
    });
};
const uniqueTypeVram = () => {
    const sizeRAM = new Set();
    return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.type_vram)) {
            sizeRAM.add(ram.type_vram);
            return true;
        }
        return false;
    });
};
const uniqueInterface = () => {
    const sizeRAM = new Set();
    return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.interface)) {
            sizeRAM.add(ram.interface);
            return true;
        }
        return false;
    });
};

// Power Supply
function updatePSUFormat(event) {
    const value = event.target.value;
    let updated = [...props.psuFormat];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:psuFormat", updated);
}

function updatePSUWattage(event) {
    const value = event.target.value;
    let updated = [...props.psuWattage];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:psuWattage", updated);
}

function updatePSUEfficiency(event) {
    const value = event.target.value;
    let updated = [...props.psuEfficiency];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:psuEfficiency", updated);
}
function updatePSUModular(event) {
    const value = event.target.value;
    let updated = [...props.psuModular];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:psuModular", updated);
}

const uniquePSUFormat = () => {
    const sizeRAM = new Set();
    return props.powersupply.filter((ram) => {
        if (!sizeRAM.has(ram.format)) {
            sizeRAM.add(ram.format);
            return true;
        }
        return false;
    });
};
const uniqueWattage = () => {
    const sizeRAM = new Set();
    return props.powersupply.filter((ram) => {
        if (!sizeRAM.has(ram.wattage)) {
            sizeRAM.add(ram.wattage);
            return true;
        }
        return false;
    });
};
const uniqueEfficiency = () => {
    const sizeRAM = new Set();
    return props.powersupply.filter((ram) => {
        if (!sizeRAM.has(ram.efficiency)) {
            sizeRAM.add(ram.efficiency);
            return true;
        }
        return false;
    });
};
const uniqueModular = () => {
    const sizeRAM = new Set();
    return props.powersupply.filter((ram) => {
        if (!sizeRAM.has(ram.modular)) {
            sizeRAM.add(ram.modular);
            return true;
        }
        return false;
    });
};

//Cpu coolers
function updateSocketCooler(event) {
    const value = event.target.value;
    let updated = [...props.socketCooler];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:socketCooler", updated);
}

function updateTypeCooler(event) {
    emit("update:typeCooler", event.target.value);
}

function updateRGBCooler(event) {
    const value = event.target.value;
    let updated = [...props.rgbCooler];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:rgbCooler", updated);
}

function updateFanRPMCooler(event) {
    const value = event.target.value;
    let updated = [...props.fanRPMCooler];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:fanRPMCooler", updated);
}

const uniqueSocketCooler = () => {
    const sizeRAM = new Set();
    return props.cpuCooler.filter((ram) => {
        if (!sizeRAM.has(ram.socket)) {
            sizeRAM.add(ram.socket);
            return true;
        }
        return false;
    });
};
const uniqueType = () => {
    const sizeRAM = new Set();
    return props.cpuCooler.filter((ram) => {
        if (!sizeRAM.has(ram.type)) {
            sizeRAM.add(ram.type);
            return true;
        }
        return false;
    });
};
const uniqueFanRPM = () => {
    const sizeRAM = new Set();
    return props.cpuCooler.filter((ram) => {
        if (!sizeRAM.has(ram.fan_rpm)) {
            sizeRAM.add(ram.fan_rpm);
            return true;
        }
        return false;
    });
};

function updateCasesFormat(event) {
    const value = event.target.value;
    let updated = [...props.casesFormat];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:casesFormat", updated);
}

function updateCasesGlass(event) {
    const value = event.target.value;
    let updated = [...props.temperedGlass];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:temperedGlass", updated);
}

function updateCasesLowerFans(event) {
    const value = event.target.value;
    let updated = [...props.casesNumberLowerFans];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:casesNumberLowerFans", updated);
}
function updateCasesUpperFans(event) {
    const value = event.target.value;
    let updated = [...props.casesNumberUpperFans];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:casesNumberUpperFans", updated);
}
function updateCasesFrontFans(event) {
    const value = event.target.value;
    let updated = [...props.casesNumberFrontFans];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:casesNumberFrontFans", updated);
}
function updateCasesRearFans(event) {
    const value = event.target.value;
    let updated = [...props.casesNumberRearFans];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:casesNumberRearFans", updated);
}
function updateCasesGpuLength(event) {
    const value = event.target.value;
    let updated = [...props.casesGpuLength];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:casesGpuLength", updated);
}

function updateCasesCoolerHeight(event) {
    const value = event.target.value;
    let updated = [...props.casesCoolerHeight];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:casesCoolerHeight", updated);
}

const uniqueFormatCase = () => {
    const sizeRAM = new Set();
    return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.format)) {
            sizeRAM.add(ram.format);
            return true;
        }
        return false;
    });
};
const uniqueLowerFans = () => {
    const sizeRAM = new Set();
    return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.number_lower_fans)) {
            sizeRAM.add(ram.number_lower_fans);
            return true;
        }
        return false;
    });
};
const uniqueUpperFans = () => {
    const sizeRAM = new Set();
    return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.number_upper_fans)) {
            sizeRAM.add(ram.number_upper_fans);
            return true;
        }
        return false;
    });
};
const uniqueFrontFans = () => {
    const sizeRAM = new Set();
    return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.number_front_fans)) {
            sizeRAM.add(ram.number_front_fans);
            return true;
        }
        return false;
    });
};
const uniqueRearFans = () => {
    const sizeRAM = new Set();
    return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.number_rear_fans)) {
            sizeRAM.add(ram.number_rear_fans);
            return true;
        }
        return false;
    });
};
const uniqueGPUlength = () => {
    const sizeRAM = new Set();
    return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.max_gpu_length)) {
            sizeRAM.add(ram.max_gpu_length);
            return true;
        }
        return false;
    });
};
const uniqueCoolerHeight = () => {
    const sizeRAM = new Set();
    return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.max_cooler_height)) {
            sizeRAM.add(ram.max_cooler_height);
            return true;
        }
        return false;
    });
};
</script>
