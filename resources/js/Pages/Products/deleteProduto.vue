<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    id: null,
});

const submit = () => {
    router.delete(`/produto/eliminar/${form.name}`);
};
</script>

<template>
    <navbar :Utilizador="Utilizador" :Buttons="Buttons"></navbar>
    <div class="max-w-2xl mx-auto p-6 mt-5">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            Eliminar Produtos
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
                </select>

                <div v-if="form.category === 'Telemóveis'">
                    <label
                        for="product"
                        class="block mt-2 mb-2 text-sm font-medium text-gray-700"
                        >Qual é o Telemóvel?</label
                    >
                    <select
                        v-model="form.name"
                        class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                    >
                        <option disabled value="">Selecione o Telemóvel</option>
                        <option
                            v-for="item in Telemoveis"
                            :key="item.name"
                            :value="item.name"
                        >
                            {{ item.name }}
                        </option>
                    </select>

                    <button
                        type="submit"
                        v-if="form.name"
                        class="mt-5 w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                    >
                        Eliminar Telemóvel
                    </button>
                </div>

                <div v-if="form.category === 'Componentes'">
                    <label
                        for="product"
                        class="block mt-2 mb-2 text-sm font-medium text-gray-700"
                        >Qual é o Componente?</label
                    >
                    <select
                        v-model="form.id"
                        class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                    >
                        <option disabled value="">
                            Selecione o Componente
                        </option>
                        <option
                            v-for="comp in Componentes"
                            :key="comp.id"
                            :value="comp.id"
                        >
                            {{ comp.name }}
                        </option>
                    </select>

                    <button
                        type="submit"
                        v-if="form.id"
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
import navbar from "../../Components/navbar.vue";

export default {
    components: {
        navbar,
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
        Telemoveis: {
            type: Array,
            default: () => [],
        },
        Componentes: {
            type: Array,
            default: () => [],
        },
    },
};
</script>
