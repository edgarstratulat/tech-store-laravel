<template>
    <div class="flex justify-center items-center bg-zinc-100 p-4">
        <div class="w-full max-w-6xl max-h-6xl">
            <h1
                class="text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
            >
                Promoções
            </h1>
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <li
                    v-for="prod in Produtos"
                    :key="prod.id"
                    class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col"
                >
                    <a
                        :href="`http://localhost:8000/produtos/${prod.id}`"
                        class="flex p-6 flex-col flex-grow"
                    >
                        <!-- Product Image -->
                        <div class="mb-4">
                            <img
                                :src="`/storage/${prod.image_path}`"
                                :alt="prod.name"
                                class="w-full h-64 object-contain rounded-lg transition delay-50 hover:scale-105"
                            />
                        </div>

                        <!-- Product Details -->
                        <div class="flex-grow">
                            <h2
                                class="text-md font-semibold mb-2 hover:text-blue-600"
                            >
                                {{ prod.name }}
                            </h2>
                        </div>
                        <div class="flex-grow">
                            <p class="text-gray-400 text-sm">
                                {{ DiminuirTexto(prod.desc, 100) }} ...
                            </p>
                        </div>

                        <!-- Price and Button -->
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-lg font-bold text-blue-600">
                                {{ prod.price }}€
                            </span>
                            <button
                                class="bg-neutral-800 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300"
                            >
                                Adicionar
                            </button>
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
