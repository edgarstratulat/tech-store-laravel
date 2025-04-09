<script setup>
const props = defineProps({
    modelValue: String,
    subcategory: Array,
});

const emit = defineEmits(["update:modelValue"]);

function updateManufacturer(event) {
    emit("update:modelValue", event.target.value);
}
</script>

<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Categoria</label>
        <select
            class="w-full border p-1 rounded"
            :value="modelValue"
            @change="updateManufacturer"
        >
            <option v-for="manu in subcategory" :value="manu.id" :key="manu.id">
                {{ manu.name }}
            </option>
        </select>
    </div>
</template>
