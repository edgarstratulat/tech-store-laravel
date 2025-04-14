<template>
    <div class="max-w-2xl mx-auto p-6 mt-5">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            {{ t("login-title") }}
        </h1>
        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <label
                    for="price"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    {{ t("email") }}
                </label>
                <input
                    id="price"
                    v-model="form.email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                />
            </div>

            <div>
                <label
                    for="pass"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    {{ t("password") }}
                </label>
                <input
                    id="pass"
                    v-model="form.password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                />
            </div>
            <button
                type="submit"
                class="w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
            >
                {{ t("login-button") }}
            </button>

            <a href="/">
                <h1 class="font-bold mb-6 text-gray-800 text-center mt-5">
                    {{ t("home-button") }}
                </h1>
            </a>
        </form>
    </div>
</template>

<script setup>
import { useI18n } from "vue-i18n";
const { t } = useI18n();

import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    email: null,
    password: null,
});

function submit() {
    router.post("/login", form);
}
</script>
