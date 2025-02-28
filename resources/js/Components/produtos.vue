<template>
    <div class="flex justify-center items-center bg-white p-4">
        <div class="w-full max-w-6xl">
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <li
                    v-for="prod in Produtos"
                    :key="prod.id"
                    class="bg-gray-50 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300"
                >
                    <a
                        :href="`http://localhost:8000/produtos/${prod.id}`"
                        class="block p-6"
                    >
                        <div class="flex flex-col justify-between h-full">
                            <!-- Product Image -->
                            <div class="mb-4">
                                <img
                                    :src="`/storage/${prod.image_path}`"
                                    :alt="prod.name"
                                    class="w-full h-48 object-cover rounded-lg"
                                />
                            </div>

                            <!-- Product Details -->
                            <div>
                                <h2 class="text-xl font-semibold mb-2">
                                    {{ prod.name }}
                                </h2>

                                <p class="text-gray-600 text-sm">
                                    {{ DiminuirTexto(prod.desc, 150) }}
                                    <a href="" class="font-bold text-gray-900"
                                        >Ver Mais</a
                                    >
                                </p>
                            </div>

                            <div class="mt-4 flex justify-between items-center">
                                <div>
                                    <span
                                        class="text-lg font-bold text-gray-900"
                                    >
                                        {{ prod.price }}€
                                    </span>
                                </div>
                                <button
                                    class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-900 transition-colors duration-300"
                                >
                                    Adicionar
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
    methods: {
        DiminuirTexto(text, maxLength) {
            return text.slice(0, maxLength);
        },
    },
};
</script>
