<template>
    <input
        type="text"
        v-model="query"
        :placeholder="t('looking-for')"
        @keyup.enter="search"
        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
    />
</template>

<script setup>
import { useI18n } from "vue-i18n";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

const query = ref("");
const { t } = useI18n();

const search = () => {
    router.get("/search", { query: query.value });
};
</script>
