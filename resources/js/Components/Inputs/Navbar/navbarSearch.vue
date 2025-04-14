<template>
    <div class="hidden md:block relative w-64">
        <input
            type="text"
            v-model="query"
            @keyup.enter="search"
            :placeholder="t('looking-for')"
            class="mt-3 w-64 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
        />
    </div>
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
