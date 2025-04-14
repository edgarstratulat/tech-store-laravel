<template>
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
</template>

<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();

const props = defineProps({
    capacityRam: Array,
    typeRam: Array,
    frequencyRam: Array,
    latencyRam: Array,
    ram: Array,
});

const emit = defineEmits([
    "update:capacityRam",
    "update:typeRam",
    "update:frequencyRam",
    "update:latencyRam",
]);

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
</script>
