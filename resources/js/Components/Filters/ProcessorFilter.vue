<template>
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
</template>

<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();

const props = defineProps({
    modelCPU: Array,
    socketCPU: Array,
    tdpCPU: Array,
    cpu: Array,
});

const emit = defineEmits([
    "update:modelCPU",
    "update:socketCPU",
    "update:tdpCPU",
]);

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
</script>
