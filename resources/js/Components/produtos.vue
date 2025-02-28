<template>
    <h1 class="bg-gray-50 text-3xl text-center font-bold text-gray-800 p-12">
        Lista de Produtos
    </h1>
    <div class="flex justify-center items-center bg-gray-50 p-4">
        <div class="w-full max-w-6xl">
            <!-- Container com largura máxima -->
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <li
                    v-for="prod in Produtos"
                    :key="prod.id"
                    class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300"
                >
                    <a
                        :href="`http://localhost:8000/produtos/${prod.id}`"
                        class="block p-6"
                    >
                        <div class="flex flex-col justify-between h-full">
                            <div>
                                <h2 class="text-xl font-semibold">
                                    {{ prod.name }}
                                </h2>
                                <p class="text-gray-600">{{ prod.desc }}</p>
                            </div>
                            <div class="mt-4 text-right">
                                <span
                                    class="text-lg font-bold text-gray-900 mr-2"
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
    </div>
</template>

<script>
export default {
    props: {
        Produtos: {
            type: Array,
            required: true,
        },
    },
};
</script>
