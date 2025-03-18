<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    id: null,
});

const submit = () => {
    router.delete(`dashboard/produto/eliminar/${form.id}`);
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
                    <option value="Computadores">Computadores</option>
                    <option value="Perifericos">Periféricos</option>
                    <option value="Acessorios">Acessórios</option>
                </select>

                <div v-if="form.category === 'Telemóveis'">
                    <label
                        for="product"
                        class="block mt-2 mb-2 text-sm font-medium text-gray-700"
                        >Qual é o Telemóvel?</label
                    >
                    <select
                        v-model="form.id"
                        class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                    >
                        <option disabled value="">Selecione o Telemóvel</option>
                        <option
                            v-for="item in Telemoveis"
                            :key="item.id"
                            :value="item.id"
                        >
                            {{ item.name }}
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
                        Eliminar Componente
                    </button>
                </div>

                <div v-if="form.category === 'Computadores'">
                    <label
                        for="product"
                        class="block mt-2 mb-2 text-sm font-medium text-gray-700"
                        >Qual é o Computador?</label
                    >
                    <select
                        v-model="form.id"
                        class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                    >
                        <option disabled value="">
                            Selecione o Computador
                        </option>
                        <option
                            v-for="comp in Computadores"
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
                        Eliminar Computador
                    </button>
                </div>

                <div v-if="form.category === 'Perifericos'">
                    <label
                        for="product"
                        class="block mt-2 mb-2 text-sm font-medium text-gray-700"
                        >Qual é o Periférico?</label
                    >
                    <select
                        v-model="form.id"
                        class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                    >
                        <option disabled value="">
                            Selecione o Periferico
                        </option>
                        <option
                            v-for="comp in Perifericos"
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
                        Eliminar Periférico
                    </button>
                </div>

                <div v-if="form.category === 'Acessorios'">
                    <label
                        for="product"
                        class="block mt-2 mb-2 text-sm font-medium text-gray-700"
                        >Qual é o Acessório?</label
                    >
                    <select
                        v-model="form.id"
                        class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                    >
                        <option disabled value="">Selecione o Acessório</option>
                        <option
                            v-for="comp in Acessorios"
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
                        Eliminar Acessório
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

        Telemoveis: {
            type: Array,
            default: () => [],
        },
        Componentes: {
            type: Array,
            default: () => [],
        },
        Computadores: {
            type: Array,
            default: () => [],
        },
        Perifericos: {
            type: Array,
            default: () => [],
        },
        Acessorios: {
            type: Array,
            default: () => [],
        },
    },
};
</script>
