<template>
    <Navbar />
    <Carroussel />
    <Produtos />
    <div class="p-4 bg-gray-50 min-h-screen">
        <ul class="space-y-4">
            <li
                v-for="prod in produtos"
                :key="prod.id"
                class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300"
            >
                <a
                    :href="`http://localhost:8000/produtos/${prod.id}`"
                    class="block p-6"
                >
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold">
                                {{ prod.name }}
                            </h2>
                            <p class="text-gray-600">{{ prod.desc }}</p>
                        </div>
                        <div class="text-right">
                            <span class="text-lg font-bold text-gray-900 mr-2"
                                >{{ prod.price }}€</span
                            >
                            <button
                                class="mt-2 bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-900 transition-colors duration-300"
                            >
                                Ver Produto
                            </button>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Carroussel from "../Components/carroussel.vue";
import Produtos from "./produtos.vue";

export default {
    components: {
        Navbar,
        Carroussel,
        Produtos,
    },
    props: {
        produtos: {
            type: Array,
            required: true,
        },
    },
};
</script>
