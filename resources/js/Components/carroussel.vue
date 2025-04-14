<template>
    <div class="bg-zinc-100">
        <section
            class="bg-cyan-900 text-white py-16 sm:m-12 lg:m-12 mb-5 rounded-lg"
        >
            <div class="container mx-auto text-center">
                <h2 class="text-4xl font-bold mb-4 drop-shadow-md">
                    {{ t("carroussel-h1") }}
                </h2>
                <p class="text-2xl mb-4">{{ t("carroussel-h2") }}</p>
                <p class="text-6xl font-bold text-white mb-4 drop-shadow-md">
                    {{ t("carroussel-discount") }}
                </p>
                <p class="text-xl mb-8 drop-shadow-md">
                    {{ t("carroussel-products") }}
                </p>
                <button
                    class="bg-white text-black px-8 py-3 rounded-full font-semibold hover:bg-gray-200 transition-colors duration-300"
                >
                    {{ t("carroussel-p") }}
                </button>
            </div>
        </section>
    </div>
</template>

<script>
import { useI18n } from "vue-i18n";

export default {
    setup() {
        const { t } = useI18n();
        return { t };
    },
};
</script>
