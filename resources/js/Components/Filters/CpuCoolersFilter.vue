<script setup>
const props = defineProps({
    socketCooler: Array,
    typeCooler: String,
    fanRPMCooler: Array,
    rgbCooler: Array,
    cpuCooler: Array,
});

const emit = defineEmits([
    "update:socketCooler",
    "update:typeCooler",
    "update:fanRPMCooler",
    "update:rgbCooler",
]);

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

const uniqueSocket = () => {
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
</script>

<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Categoria</label>
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
        <label class="block text-md font-semibold mb-1">Compatibilidade</label>
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
                    @change="updateSocketCooler"
                />
                <span class="ml-2">{{ option.socket }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1"
            >Velocidade de Rotação (máx.)</label
        >
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
        <label class="block text-md font-medium mb-1">RGB</label>
        <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    class="form-checkbox size-4"
                    @change="updateRGBCooler"
                />
                <span class="ml-2">Sim</span>
            </label>
        </div>
    </div>
</template>
