<script setup>
import { handleError, reactive } from "vue";
import { router } from "@inertiajs/vue3";
import Navbar from "../Components/navbar.vue";

const form = reactive({
    name: null,
    price: null,
    desc: null,
    image: null,
});

const handleImageUpload = (event) => {
    form.image = event.target.files[0];
};

const submit = () => {
    const formData = new FormData();
    formData.append("name", form.name);
    formData.append("price", form.price);
    formData.append("desc", form.desc);
    formData.append("image", form.image);

    router.post("/produto/adicionar", formData);
};
</script>

<template>
    <Navbar />
    <div class="max-w-2xl mx-auto p-6 mt-5">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            Adicionar Produtos
        </h1>
        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <label
                    for="name"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Nome do produto:
                </label>
                <input
                    id="name"
                    v-model="form.name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                />
            </div>

            <div>
                <label
                    for="price"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Preço:
                </label>
                <input
                    id="price"
                    v-model="form.price"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                />
            </div>

            <div>
                <label
                    for="desc"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Descrição:
                </label>
                <input
                    type="text"
                    id="desc"
                    v-model="form.desc"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                />
            </div>
            <div>
                <label
                    for="image"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Imagem do Produto:
                </label>
                <input
                    id="image"
                    input
                    type="file"
                    @change="handleImageUpload"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                />
            </div>

            <button
                type="submit"
                class="w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
            >
                Adicionar Produto
            </button>

            <a href="/">
                <h1 class="font-bold mb-6 text-gray-800 text-center mt-5">
                    Página Inicial
                </h1>
            </a>
        </form>
    </div>
</template>

<script>
export default {
    components: {
        Navbar,
    },
};
</script>
