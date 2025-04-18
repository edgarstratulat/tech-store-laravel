<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("processor-family")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueModelCPU()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.id"
                    class="form-checkbox size-4"
                    @change="updateProcessorFamily"
                />
                <span class="ml-2">{{ option.model }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("ram-capacity")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueRAM()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.id"
                    class="form-checkbox size-4"
                    @change="updateRAM"
                />
                <span class="ml-2">{{ option.size }} GB</span>
            </label>
        </div>
    </div>
    <div class="mt-4" v-if="!laptopsPage">
        <label class="block text-md font-semibold mb-1">{{
            t("motherboard-chipset")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueMotherboardChipset()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.id"
                    class="form-checkbox size-4"
                    @change="updateMotherboardChipset"
                />
                <span class="ml-2">{{ option.chipset }} </span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("storage-capacity")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueStorage()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.id"
                    class="form-checkbox size-4"
                    @change="updateStorage"
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
        <label class="block text-md font-semibold mb-1">{{
            t("gpu-model")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueModelGPU()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.id"
                    class="form-checkbox size-4"
                    @change="updateGPU"
                />
                <span class="ml-2">{{ option.model }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("gpu-integrated")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueIntegratedGPU()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.integrated_gpu"
                    class="form-checkbox size-4"
                    @change="updateIntegratedGPU"
                />
                <span
                    class="ml-2"
                    v-if="option.integrated_gpu === 'notavailable'"
                    >{{ t(`available_status.${option.integrated_gpu}`) }}</span
                >
                <span class="ml-2" v-else>{{ option.integrated_gpu }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4" v-if="!laptopsPage">
        <label class="block text-md font-semibold mb-1">{{
            t("psu-wattage")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniquePSU()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.id"
                    class="form-checkbox size-4"
                    @change="updatePSU"
                />
                <span class="ml-2">{{ option.wattage }} W</span>
            </label>
        </div>
    </div>
    <div class="mt-4" v-if="!laptopsPage">
        <label class="block text-md font-semibold mb-1">{{
            t("case-format")
        }}</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueCase()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.id"
                    class="form-checkbox size-4"
                    @change="updateCase"
                />
                <span class="ml-2">{{ option.format }}</span>
            </label>
        </div>
    </div>
</template>

<script setup>
import { useI18n } from "vue-i18n";
import { usePage } from "@inertiajs/vue3";
const page = usePage().url;
const { t } = useI18n();

const laptopsPage = page.includes("/computers/laptops");

const props = defineProps({
    computers: Array,
    cpu: Array,
    ram: Array,
    motherboard: Array,
    armazenamento: Array,
    gpu: Array,
    powersupply: Array,
    PCcases: Array,
    cpu_family: Array,
    ram_size: Array,
    motherboard_chipset: Array,
    storage_size: Array,
    gpu_model: Array,
    gpu_integrated: Array,
    psu_wattage: Array,
    case_format: Array,
});

const emit = defineEmits([
    "update:cpu_family",
    "update:ram_size",
    "update:motherboard_chipset",
    "update:storage_size",
    "update:gpu_model",
    "update:psu_wattage",
    "update:case_format",
    "update:gpu_integrated",
]);

function updateProcessorFamily(event) {
    const value = event.target.value;
    let updated = [...props.cpu_family];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:cpu_family", updated);
}

function updateRAM(event) {
    const value = event.target.value;
    let updated = [...props.ram_size];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:ram_size", updated);
}

function updateMotherboardChipset(event) {
    const value = event.target.value;
    let updated = [...props.motherboard_chipset];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:motherboard_chipset", updated);
}

function updateStorage(event) {
    const value = event.target.value;
    let updated = [...props.storage_size];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:storage_size", updated);
}

function updateGPU(event) {
    const value = event.target.value;
    let updated = [...props.gpu_model];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:gpu_model", updated);
}

function updatePSU(event) {
    const value = event.target.value;
    let updated = [...props.psu_wattage];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:psu_wattage", updated);
}

function updateCase(event) {
    const value = event.target.value;
    let updated = [...props.case_format];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:case_format", updated);
}

function updateIntegratedGPU(event) {
    const value = event.target.value;
    let updated = [...props.gpu_integrated];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:gpu_integrated", updated);
}

const uniqueModelCPU = () => {
    const sizeRAM = new Set();
    return props.cpu.filter((ram) => {
        if (!sizeRAM.has(ram.model)) {
            sizeRAM.add(ram.model);
            return true;
        }
        return false;
    });
};
const uniqueRAM = () => {
    const sizeRAM = new Set();
    return props.ram.filter((ram) => {
        if (!sizeRAM.has(ram.size)) {
            sizeRAM.add(ram.size);
            return true;
        }
        return false;
    });
};
const uniqueMotherboardChipset = () => {
    const sizeRAM = new Set();
    return props.motherboard.filter((ram) => {
        if (!sizeRAM.has(ram.chipset)) {
            sizeRAM.add(ram.chipset);
            return true;
        }
        return false;
    });
};

const uniqueStorage = () => {
    const sizeRAM = new Set();
    return props.armazenamento.filter((ram) => {
        if (!sizeRAM.has(ram.size)) {
            sizeRAM.add(ram.size);
            return true;
        }
        return false;
    });
};
const uniqueModelGPU = () => {
    const sizeRAM = new Set();
    return props.gpu.filter((ram) => {
        if (!sizeRAM.has(ram.model)) {
            sizeRAM.add(ram.model);
            return true;
        }
        return false;
    });
};
const uniquePSU = () => {
    const sizeRAM = new Set();
    return props.powersupply.filter((ram) => {
        if (!sizeRAM.has(ram.wattage)) {
            sizeRAM.add(ram.wattage);
            return true;
        }
        return false;
    });
};
const uniqueCase = () => {
    const sizeRAM = new Set();
    return props.PCcases.filter((ram) => {
        if (!sizeRAM.has(ram.format)) {
            sizeRAM.add(ram.format);
            return true;
        }
        return false;
    });
};
const uniqueIntegratedGPU = () => {
    const sizeRAM = new Set();
    return props.computers.filter((ram) => {
        if (!sizeRAM.has(ram.integrated_gpu)) {
            sizeRAM.add(ram.integrated_gpu);
            return true;
        }
        return false;
    });
};
</script>
