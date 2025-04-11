<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Ordenar por:</label>
        <select class="w-full border p-1 rounded" @change="updateSort">
            <option value="-created_at">Mais Recentes</option>
            <option value="price">Preço mais baixo</option>
            <option value="-price">Preço mais alto</option>
        </select>
    </div>
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
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">Fabricante</label>
        <select
            :value="manufacturerValue"
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

<script setup>
const props = defineProps({
    sort: String,
    stock: String,
    nostock: String,
    minPrice: String,
    maxPrice: String,
    manufacturerValue: String,
    manufacturer: Array,
    discount: String,
    reconditioned: String,
});

const emit = defineEmits([
    "update:sort",
    "update:stock",
    "update:nostock",
    "update:minPrice",
    "update:maxPrice",
    "update:manufacturer",
    "update:discount",
    "update:reconditioned",
    "update:subcategory",
]);

function updateSort(event) {
    emit("update:sort", event.target.value);
}

function updateStock(event) {
    emit("update:stock", event.target.value);
}
function updateNoStock(event) {
    emit("update:nostock", event.target.value);
}
function updateMinPrice(event) {
    emit("update:minPrice", event.target.value);
}
function updateMaxPrice(event) {
    emit("update:maxPrice", event.target.value);
}
function updateManufacturer(event) {
    emit("update:manufacturer", event.target.value);
}
function updateDiscount(event) {
    emit("update:discount", event.target.value);
}
function updateReconditioned(event) {
    emit("update:reconditioned", event.target.value);
}
function updateSubcategory(event) {
    emit("update:subcategory", event.target.value);
}
</script>
