<template>
    <div v-if="links.length > 0" class="flex justify-center mt-4 gap-2 mb-4">
        <template v-for="(link, index) in links" :key="index">
            <Link
                v-if="link.url"
                :href="link.url"
                class="px-4 py-2 text-sm text-black font-medium bg-white border border-gray-300 rounded-sm"
                :class="{
                    'bg-blue-700 text-white hover:bg-blue-500 ': link.active,
                }"
                v-html="link.label"
            />
        </template>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        links: {
            type: Array,
            default: () => [],
        },
    },
};
</script>
