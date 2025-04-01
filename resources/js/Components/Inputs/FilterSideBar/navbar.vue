<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { router } from "@inertiajs/vue3";

const isOpen = ref(false);
const selectedFilters = ref({
    manufacturer: "",
});

const closeSidebar = (event) => {
    if (!event.target.closest(".sidebar") && window.innerWidth < 1024) {
        isOpen.value = false;
    }
};

onMounted(() => document.addEventListener("click", closeSidebar));
onUnmounted(() => document.removeEventListener("click", closeSidebar));

const applyFilters = () => {
    router.get(
        `?filter[manufacturer_id]=${Number(selectedFilters.value)}`,
        selectedFilters.manufacturer
    );
    console.log("Filtros aplicados:", selectedFilters.value);
};
</script>

<script>
export default {
    props: {
        manufacturer: {
            type: Array,
            required: true,
        },
    },
};
</script>

<template>
    <div class="relative">
        <div
            class="sidebar fixed lg:relative inset-y-0 left-0 w-64 bg-white shadow-lg p-4 transition-transform duration-300 lg:translate-x-0"
            :class="{ '-translate-x-full': !isOpen, 'translate-x-0': isOpen }"
        >
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Filtros</h2>
                <button @click="isOpen = false" class="text-gray-500 lg:hidden">
                    ✖
                </button>
            </div>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium">Marca</label>
                    <select
                        v-model="selectedFilters.manufacturer"
                        class="w-full border p-2 rounded"
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
            </div>
            <button
                @click="applyFilters"
                class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white py-2 rounded"
            >
                Aplicar Filtros
            </button>
        </div>
    </div>
</template>

<style scoped>
.sidebar {
    z-index: 50;
}
</style>
