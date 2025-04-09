<script setup>
const props = defineProps({
    stock: String,
    nostock: String,
});

const emit = defineEmits(["update:stock", "update:nostock"]);

function updateStock(event) {
    emit("update:stock", event.target.value);
}
function updateNoStock(event) {
    emit("update:nostock", event.target.value);
}
</script>

<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Stock</label>
        <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    class="form-checkbox size-4"
                    @change="updateStock"
                />
                <span class="ml-2">Em stock</span>
            </label>
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    class="form-checkbox size-4"
                    @change="updateNoStock"
                />
                <span class="ml-2">Sem stock</span>
            </label>
        </div>
    </div>
</template>
