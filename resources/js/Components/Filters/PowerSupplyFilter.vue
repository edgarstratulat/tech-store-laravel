<template>
    <div>
        <div class="mt-4">
            <label class="block text-md font-semibold mb-1">{{
                t("psu-format")
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
</template>

<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();

const props = defineProps({
    psuFormat: Array,
    psuWattage: Array,
    psuEfficiency: Array,
    psuModular: Array,
    powersupply: Array,
});

const emit = defineEmits([
    "update:psuFormat",
    "update:psuWattage",
    "update:psuEfficiency",
    "update:psuModular",
]);

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

const uniqueFormat = () => {
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
</script>
