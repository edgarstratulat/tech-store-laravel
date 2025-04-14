<template>
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
</template>

<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();

const props = defineProps({
    modelGPU: Array,
    categoryGPU: String,
    vramGPU: Array,
    typeVramGPU: Array,
    interfaceGPU: Array,
    gpu: Array,
});

const emit = defineEmits([
    "update:modelGPU",
    "update:categoryGPU",
    "update:vramGPU",
    "update:typeVramGPU",
    "update:interfaceGPU",
]);

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
</script>
