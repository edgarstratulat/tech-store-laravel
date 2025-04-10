<script setup>
const props = defineProps({
    capacityDrive: Array,
    typeDrive: Array,
    writingSpeedDrive: Array,
    rotationSpeedDrive: Array,
    armazenamento: Array,
});

const emit = defineEmits([
    "update:capacityDrive",
    "update:typeDrive",
    "update:writingSpeedDrive",
    "update:rotationSpeedDrive",
]);

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
    return props.armazenamento.filter((ram) => {
        if (!sizeRAM.has(ram.size)) {
            sizeRAM.add(ram.size);
            return true;
        }
        return false;
    });
};
const uniqueTypeDrive = () => {
    const sizeRAM = new Set();
    return props.armazenamento.filter((ram) => {
        if (!sizeRAM.has(ram.type)) {
            sizeRAM.add(ram.type);
            return true;
        }
        return false;
    });
};
const uniqueWritingSpeedDrive = () => {
    const sizeRAM = new Set();
    return props.armazenamento.filter((ram) => {
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
    return props.armazenamento.filter((ram) => {
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
</script>

<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1"
            >Capacidade Armazenamento</label
        >
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
        <label class="block text-md font-medium mb-1"
            >Tipo de Armazenamento</label
        >
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
        <label class="block text-md font-medium mb-1"
            >SSD (Velocidade de Escrita & Leitura)</label
        >
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
        <label class="block text-md font-medium mb-1"
            >HDD (Velocidade Rotações)</label
        >
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
</template>
