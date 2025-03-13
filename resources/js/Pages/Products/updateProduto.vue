<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    id: null,
    price: null,
    stock: null,
    category: [],
    subCategory: [],
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
                <telemovelForm
                    :Telemovel="Telemovel"
                    :form="form"
                ></telemovelForm>
            </div>

            <div v-if="form.category == 'Componentes'">
                <componentesForm
                    :ComponentePC="ComponentePC"
                    :form="form"
                ></componentesForm>
            </div>
        </form>
    </div>
</template>

<script>
import Navbar from "../../Components/navbar.vue";
import telemovelForm from "../../Components/Forms/update/telemovelForm.vue";
import componentesForm from "../../Components/Forms/update/componentesForm.vue";

export default {
    components: {
        Navbar,
        telemovelForm,
        componentesForm,
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
        ComponentePC: {
            type: Array,
            default: () => [],
        },
    },
};
</script>
