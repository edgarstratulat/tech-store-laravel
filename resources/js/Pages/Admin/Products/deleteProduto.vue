<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    id: null,
});

const submit = () => {
    router.delete(`/dashboard/produto/eliminar/${form.id}`);
};
</script>

<template>
    <navbar :adminBtn="adminBtn"></navbar>
    <div class="max-w-2xl mx-auto p-6 mt-5">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            Eliminar Produtos
        </h1>
        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <div>
                    <label
                        for="product"
                        class="block mt-2 mb-2 text-sm font-medium text-gray-700"
                        >Qual é o Produto?</label
                    >
                    <select
                        v-model="form.id"
                        class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                    >
                        <option disabled value="">Selecione o produto</option>
                        <option
                            v-for="item in products"
                            :key="item.id"
                            :value="item.id"
                        >
                            {{ item.name }}
                        </option>
                    </select>

                    <button
                        type="submit"
                        class="mt-5 w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                    >
                        Eliminar Telemóvel
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import navbar from "../../../Components/Buttons/AdminNavbar/navbar.vue";

export default {
    components: {
        navbar,
    },
    props: {
        adminBtn: {
            type: Array,
            required: true,
        },
        products: {
            type: Array,
            default: () => [],
        },
    },
};
</script>
