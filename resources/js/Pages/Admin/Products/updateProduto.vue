<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    id: null,
    price: "",
    stock: "",
    category_id: "",
    subcategory_id: "",
});

const submit = () => {
    router.put("/dashboard/produto/atualizar", form);
};
</script>

<template>
    <Navbar :adminBtn="adminBtn"></Navbar>
    <div class="max-w-2xl mx-auto p-6 mt-5">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            Atualizar Produtos
        </h1>
        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <label
                    for="product"
                    class="block mb-2 text-sm font-medium text-gray-700"
                    >Qual é o produto?</label
                >
                <select
                    v-model="form.id"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="">Selecione o Produto</option>
                    <option
                        v-for="item in product"
                        :key="item.id"
                        :value="item.id"
                    >
                        {{ item.name }}
                    </option>
                </select>

                <label
                    v-if="form.id"
                    class="block mt-2 text-lg text-center font-medium text-emerald-400"
                >
                    Preço atual:
                    {{ product.find((item) => item.id === form.id).price }}€
                </label>

                <label
                    v-if="form.id"
                    class="block text-lg text-center mt-2 text-md font-medium text-red-400"
                    >Stock atual:
                    {{ product.find((item) => item.id === form.id).stock }}
                    Unidades</label
                >

                <div v-if="form.id" class="mt-5">
                    <label
                        for="price"
                        class="block mb-2 text-sm font-medium text-gray-700"
                    >
                        Novo Preço:
                    </label>
                    <input
                        id="price"
                        v-model="form.price"
                        type="number"
                        step="0.01"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                    />
                </div>
                <div v-if="form.id" class="mt-5">
                    <label
                        for="stock"
                        class="block mb-2 text-sm font-medium text-gray-700"
                    >
                        Adicionar Stock
                    </label>
                    <input
                        id="stock"
                        type="number"
                        v-model="form.stock"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                    />
                </div>

                <div v-if="form.price">
                    <label
                        for="price"
                        class="block mt-2 text-lg text-center font-medium text-emerald-400"
                    >
                        Preço final: {{ form.price }}€
                    </label>
                </div>

                <div v-if="form.stock">
                    <label
                        for="price"
                        class="block mt-2 text-lg text-center font-medium text-red-400"
                    >
                        Stock final: {{ form.stock }} unidades
                    </label>
                </div>

                <button
                    type="submit"
                    v-if="form.id && form.price && form.stock"
                    class="mt-5 w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    Atualizar Telemóvel
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import Navbar from "../../../Components/Buttons/AdminNavbar/navbar.vue";

export default {
    components: {
        Navbar,
    },
    props: {
        adminBtn: {
            type: Array,
            required: true,
        },
        product: {
            type: Array,
            required: true,
        },
    },
};
</script>
