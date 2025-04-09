<script setup>
const props = defineProps({
    discount: String,
    reconditioned: String,
});

const emit = defineEmits(["update:discount", "update:reconditioned"]);

function updateDiscount(event) {
    emit("update:discount", event.target.value);
}
function updateReconditioned(event) {
    emit("update:reconditioned", event.target.value);
}
</script>

<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1"
            >Estado do produto</label
        >
        <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    class="form-checkbox size-4"
                    @change="updateDiscount"
                />
                <span class="ml-2">Promoções</span>
            </label>
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    class="form-checkbox size-4"
                    @change="updateReconditioned"
                />
                <span class="ml-2">Recondicionados</span>
            </label>
        </div>
    </div>
</template>
