<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1"
            >Capacidade de Armazenamento</label
        >
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueSmartphoneStorage()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.storage"
                    class="form-checkbox size-4"
                    @change="updateSmartphoneStorage"
                />
                <span class="ml-2">{{ option.storage }} GB</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1"
            >Capacidade cartão SIM</label
        >
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueSIM()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.SIM"
                    class="form-checkbox size-4"
                    @change="updateSIM"
                />
                <span class="ml-2">{{ option.SIM }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1"
            >Família Processador</label
        >
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueFamilyCPU()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.family_processor"
                    class="form-checkbox size-4"
                    @change="updateFamilyCPU"
                />
                <span class="ml-2">{{ option.family_processor }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Processador</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueCPU()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.processor"
                    class="form-checkbox size-4"
                    @change="updateCPU"
                />
                <span class="ml-2">{{ option.processor }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1"
            >Sistema Operativo</label
        >
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueOS()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.operating_system"
                    class="form-checkbox size-4"
                    @change="updateOS"
                />
                <span class="ml-2">{{ option.operating_system }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Resolução</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueResolution()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.screen_resolution"
                    class="form-checkbox size-4"
                    @change="updateSmartphoneScreenResolution"
                />
                <span class="ml-2">{{ option.screen_resolution }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Polegadas</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueInches()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.screen_inches"
                    class="form-checkbox size-4"
                    @change="updateSmartphoneScreenInches"
                />
                <span class="ml-2">{{ option.screen_inches }}"</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1"
            >Taxa de atualização</label
        >
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueHz()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.screen_hz"
                    class="form-checkbox size-4"
                    @change="updateSmartphoneScreenHz"
                />
                <span class="ml-2">{{ option.screen_hz }} Hz</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Tipo de Painel</label>
        <div
            class="flex items-center space-x-4"
            v-for="option in uniqueType()"
            :key="option.id"
        >
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    :value="option.screen_type"
                    class="form-checkbox size-4"
                    @change="updateSmartphoneScreenType"
                />
                <span class="ml-2">{{ option.screen_type }}</span>
            </label>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    capacityStorage: Array,
    SIM: Array,
    familyCPU: Array,
    CPU: Array,
    operating_system: Array,
    screen_resolution: Array,
    screen_inches: Array,
    screen_hz: Array,
    screen_type: Array,
    smartphone: Array,
});

const emit = defineEmits([
    "update:capacityStorage",
    "update:SIM",
    "update:familyCPU",
    "update:CPU",
    "update:operating_system",
    "update:screen_resolution",
    "update:screen_inches",
    "update:screen_hz",
    "update:screen_type",
]);

function updateSmartphoneStorage(event) {
    const value = event.target.value;
    let updated = [...props.capacityStorage];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:capacityStorage", updated);
}

function updateSIM(event) {
    const value = event.target.value;
    let updated = [...props.SIM];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:SIM", updated);
}

function updateCPU(event) {
    const value = event.target.value;
    let updated = [...props.CPU];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:CPU", updated);
}

function updateFamilyCPU(event) {
    const value = event.target.value;
    let updated = [...props.familyCPU];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:familyCPU", updated);
}

function updateOS(event) {
    const value = event.target.value;
    let updated = [...props.operating_system];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:operating_system", updated);
}

function updateSmartphoneScreenResolution(event) {
    const value = event.target.value;
    let updated = [...props.screen_resolution];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:screen_resolution", updated);
}

function updateSmartphoneScreenInches(event) {
    const value = event.target.value;
    let updated = [...props.screen_inches];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:screen_inches", updated);
}

function updateSmartphoneScreenHz(event) {
    const value = event.target.value;
    let updated = [...props.screen_hz];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:screen_hz", updated);
}

function updateSmartphoneScreenType(event) {
    const value = event.target.value;
    let updated = [...props.screen_type];

    if (event.target.checked) {
        if (!updated.includes(value)) {
            updated.push(value);
        }
    } else {
        updated = updated.filter((v) => v !== value);
    }

    emit("update:screen_type", updated);
}

const uniqueSmartphoneStorage = () => {
    const sizeRAM = new Set();
    return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.storage)) {
            sizeRAM.add(ram.storage);
            return true;
        }
        return false;
    });
};
const uniqueSIM = () => {
    const sizeRAM = new Set();
    return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.SIM)) {
            sizeRAM.add(ram.SIM);
            return true;
        }
        return false;
    });
};
const uniqueFamilyCPU = () => {
    const sizeRAM = new Set();
    return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.family_processor)) {
            sizeRAM.add(ram.family_processor);
            return true;
        }
        return false;
    });
};
const uniqueCPU = () => {
    const sizeRAM = new Set();
    return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.processor)) {
            sizeRAM.add(ram.processor);
            return true;
        }
        return false;
    });
};
const uniqueOS = () => {
    const sizeRAM = new Set();
    return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.operating_system)) {
            sizeRAM.add(ram.operating_system);
            return true;
        }
        return false;
    });
};
const uniqueResolution = () => {
    const sizeRAM = new Set();
    return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.screen_resolution)) {
            sizeRAM.add(ram.screen_resolution);
            return true;
        }
        return false;
    });
};
const uniqueInches = () => {
    const sizeRAM = new Set();
    return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.screen_inches)) {
            sizeRAM.add(ram.screen_inches);
            return true;
        }
        return false;
    });
};
const uniqueHz = () => {
    const sizeRAM = new Set();
    return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.screen_hz)) {
            sizeRAM.add(ram.screen_hz);
            return true;
        }
        return false;
    });
};
const uniqueType = () => {
    const sizeRAM = new Set();
    return props.smartphone.filter((ram) => {
        if (!sizeRAM.has(ram.screen_type)) {
            sizeRAM.add(ram.screen_type);
            return true;
        }
        return false;
    });
};
</script>
