<script setup>
const props = defineProps({
    modelValue: String,
    manufacturer: Array,
});

const emit = defineEmits(["update:modelValue"]);

function updateManufacturer(event) {
    emit("update:modelValue", event.target.value);
}
</script>

<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Fabricante</label>
        <select
            :value="modelValue"
            @change="updateManufacturer"
            class="w-full border p-1 rounded"
        >
            <option
                v-for="manu in manufacturer"
                :value="manu.id"
                :key="manu.id"
            >
                {{ manu.name }}
            </option>
        </select>
    </div>
</template>
