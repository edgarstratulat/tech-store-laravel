<script setup>
const props = defineProps({
    modelValue: String,
    ram: Array,
});

const emit = defineEmits(["update:modelValue"]);

function updateMemoria(event) {
    emit("update:modelValue", event.target.value);
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
</script>

<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1"
            >Memória RAM (Capacidade)</label
        >
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
                    @change="updateMemoria"
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
</template>
