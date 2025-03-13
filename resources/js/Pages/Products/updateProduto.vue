<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    price: null,
    stock: null,
    category: [],
});

const submit = () => {
    router.put("/produto/atualizar", form);
};
</script>

<template>
    <Navbar :Utilizador="Utilizador" :Buttons="Buttons"></Navbar>
    <div class="max-w-2xl mx-auto p-6 mt-5">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            Atualizar Produtos
        </h1>
        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <label
                    for="category"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Categoria do produto:
                </label>
                <select
                    v-model="form.category"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="">Selecione uma Categoria</option>
                    <option value="Telemóveis">Telemóveis</option>
                    <option value="Componentes">Componentes</option>
                    <option value="Acessorios">Acessórios</option>
                    <option value="Computadores">Computadores</option>
                </select>
            </div>
            <div v-if="form.category == 'Telemóveis'">
                <label
                    for="product"
                    class="block mb-2 text-sm font-medium text-gray-700"
                    >Qual produto?</label
                >
                <select
                    v-model="form.id"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="">Selecione o Telemóvel</option>
                    <option
                        v-for="item in Telemovel"
                        :key="item.id"
                        :value="item.id"
                    >
                        {{ item.name }}
                    </option>
                </select>

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
                        Qual é o stock neste momento?:
                    </label>
                    <input
                        id="stock"
                        type="number"
                        v-model="form.stock"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                    />
                </div>

                <button
                    type="submit"
                    v-if="form.id && form.category && form.price && form.stock"
                    class="mt-5 w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    Atualizar Produto
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import Navbar from "../../Components/navbar.vue";

export default {
    components: {
        Navbar,
    },
    props: {
        Buttons: {
            type: Array,
            required: true,
        },
        Utilizador: {
            type: Object,
            required: true,
        },
        Telemovel: {
            type: Array,
            default: () => [],
        },
    },
};
</script>
