<script setup>
const props = defineProps({
    modelValue: String,
});

const emit = defineEmits(["update:modelValue"]);

function updateValue(event) {
    emit("update:modelValue", event.target.value);
}
</script>

<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Preço</label>
        <div class="flex items-center space-x-4">
            <input
                type="number"
                placeholder="min"
                class="w-1/3 border p-1 rounded"
                @change="updateValue"
            />
            <input
                type="number"
                placeholder="max"
                class="w-1/3 border p-1 rounded"
                @change="updateValue"
            />
        </div>
    </div>
</template>
