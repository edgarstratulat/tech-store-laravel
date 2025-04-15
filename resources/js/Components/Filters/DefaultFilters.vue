<template>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("filters-sort-by")
        }}</label>
        <select class="w-full border p-1 rounded" @change="updateSort">
            <option value="-created_at">{{ t("filters-most-recent") }}</option>
            <option value="price">{{ t("filters-lowest-price") }}</option>
            <option value="-price">{{ t("filters-highest-price") }}</option>
        </select>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("filters-stock")
        }}</label>
        <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    class="form-checkbox size-4"
                    @change="updateStock"
                />
                <span class="ml-2">{{ t("filters-in-stock") }}</span>
            </label>
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    class="form-checkbox size-4"
                    @change="updateNoStock"
                />
                <span class="ml-2">{{ t("filters-out-of-stock") }}</span>
            </label>
        </div>
    </div>
    <div class="mt-4">
        <label class="block text-md font-semibold mb-1">{{
            t("filters-price")
        }}</label>
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
        <label class="block text-md font-semibold mb-1">{{
            t("filters-manufacturer")
        }}</label>
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
        <label class="block text-md font-semibold mb-1">{{
            t("filters-product-status")
        }}</label>
        <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    class="form-checkbox size-4"
                    @change="updateDiscount"
                />
                <span class="ml-2">{{ t("filters-discount") }}</span>
            </label>
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    class="form-checkbox size-4"
                    @change="updateReconditioned"
                />
                <span class="ml-2">{{ t("filters-reconditioned") }}</span>
            </label>
        </div>
    </div>
</template>

<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();

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
</script>
