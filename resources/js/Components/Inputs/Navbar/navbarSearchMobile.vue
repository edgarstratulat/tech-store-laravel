<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

const query = ref("");

const search = () => {
    router.get("/search", { query: query.value });
};
</script>

<template>
    <input
        type="text"
        v-model="query"
        placeholder="O que procuras?"
        @keyup.enter="search"
        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
    />
</template>

<script>
export default {};
</script>
