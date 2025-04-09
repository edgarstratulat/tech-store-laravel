<script setup>
const props = defineProps({
    modelValue: String,
});

const emit = defineEmits(["update:modelValue"]);

function updateSort(event) {
    emit("update:modelValue", event.target.value);
}
</script>

<template>
    <div>
        <label class="block text-md font-semibold mb-1">Ordenar por:</label>
        <select class="w-full border p-1 rounded" @change="updateSort">
            <option value="-created_at">Mais Recentes</option>
            <option value="price">Preço mais baixo</option>
            <option value="-price">Preço mais alto</option>
        </select>
    </div>
</template>
