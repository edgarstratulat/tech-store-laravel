<script setup>
const props = defineProps({
    minPrice: String,
    maxPrice: String,
});

const emit = defineEmits(["update:minPrice", "update:maxPrice"]);

function updateMinPrice(event) {
    emit("update:minPrice", event.target.value);
}
function updateMaxPrice(event) {
    emit("update:maxPrice", event.target.value);
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
                @change="updateMinPrice"
            />
            <input
                type="number"
                placeholder="max"
                class="w-1/3 border p-1 rounded"
                @change="updateMaxPrice"
            />
        </div>
    </div>
</template>
