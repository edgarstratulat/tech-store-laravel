<script setup>
const props = defineProps({
    motherboardFormat: Array,
    motherboardChipset: Array,
    motherboardCpuSocket: Array,
    motherboardBluetooth: Array,
    motherboardWifi: Array,
    motherboard: Array,
});

const emit = defineEmits([
    "update:motherboardFormat",
    "update:motherboardChipset",
    "update:motherboardCpuSocket",
    "update:motherboardBluetooth",
    "update:motherboardWifi",
]);

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
</script>

<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1"
            >Formato da Motherboard</label
        >
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
        <label class="block text-md font-semibold mb-1"
            >Chipset da Motherboard</label
        >
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
        <label class="block text-md font-semibold mb-1"
            >Socket do Processador</label
        >
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
        <label class="block text-md font-medium mb-1">Wifi</label>
        <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    value="true"
                    class="form-checkbox size-4"
                    @change="updateMotherboardWifi"
                />
                <span class="ml-2">Sim</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-medium mb-1">Bluetooth</label>
        <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    value="true"
                    class="form-checkbox size-4"
                    @change="updateMotherboardBluetooth"
                />
                <span class="ml-2">Sim</span>
            </label>
        </div>
    </div>
</template>
