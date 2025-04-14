<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("case-format")
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
                    <span class="ml-2">{{ t("case-glass-option") }}</span>
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
</template>

<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();

const props = defineProps({
    casesFormat: Array,
    casesNumberLowerFans: Array,
    casesNumberUpperFans: Array,
    casesNumberFrontFans: Array,
    casesNumberRearFans: Array,
    temperedGlass: Array,
    casesGpuLength: Array,
    casesCoolerHeight: Array,
    PCcases: Array,
});

const emit = defineEmits([
    "update:casesFormat",
    "update:casesNumberLowerFans",
    "update:casesNumberUpperFans",
    "update:casesNumberFrontFans",
    "update:casesNumberRearFans",
    "update:temperedGlass",
    "update:casesGpuLength",
    "update:casesCoolerHeight",
]);

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

const uniqueFormat = () => {
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
