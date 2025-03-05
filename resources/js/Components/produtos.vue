<template>
    <div class="flex justify-center items-center p-4">
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
                                class="w-full h-56 object-contain rounded-lg transition delay-50 hover:scale-105"
                            />
                            <div
                                class="relative text-right px-2.5 py-1.5 rounded-r3 font-black text-sm text-red-600 lg:text-lg"
                                v-if="prod.sale_price <= 0"
                            >
                                <p class="invisible">Teste</p>
                            </div>
                            <div
                                class="relative text-right px-2.5 py-1.5 rounded-r3 font-black text-sm text-red-600 lg:text-lg"
                                v-else
                            >
                                -{{ prod.sale_price }}%
                            </div>
                        </div>

                        <div class="flex-grow">
                            <h2 class="text-md mb-2 text-neutral-300">
                                {{ prod.category }}
                            </h2>
                        </div>

                        <!-- Product Details -->
                        <div class="flex-grow">
                            <h2
                                class="text-md font-semibold mb-2 hover:text-blue-600"
                            >
                                {{ prod.name }}
                            </h2>
                        </div>

                        <!-- Price and Button -->
                        <div class="mt-4 flex gap-5 items-center">
                            <span
                                class="text-2xl mb-1 font-bold text-blue-600"
                                v-if="prod.sale_price <= 0"
                            >
                                {{ prod.price }}€
                            </span>
                            <span
                                class="text-2xl mb-1 font-bold text-red-600"
                                v-else
                            >
                                {{ Desconto(prod) }}€
                                <span
                                    class="text-sm mb-1 text-neutral-400 line-through"
                                >
                                    {{ prod.price }}€
                                </span>
                            </span>
                        </div>

                        <div class="flex gap-5 items-center">
                            <span
                                class="text-md mb-1 font-bold text-red-600"
                                v-if="prod.stock <= 0"
                            >
                                <p>Sem Stock</p>
                            </span>
                            <span
                                class="text-md font-bold text-yellow-600"
                                v-else-if="prod.stock <= 10"
                            >
                                <p>Poucas unidades</p>
                            </span>
                            <span
                                class="text-md font-bold text-yellow-400"
                                v-else-if="prod.stock == 1"
                            >
                                <p>É o último!</p>
                            </span>
                            <span
                                class="text-md mb-1 font-bold text-green-600"
                                v-else
                            >
                                <p>Em Stock</p>
                            </span>
                        </div>

                        <div class="flex items-center gap-2">
                            <button
                                class="bg-neutral-800 text-white px-4 py-2 hover:bg-blue-600 transition-colors duration-300 w-5/6"
                            >
                                Adicionar
                            </button>
                            <button
                                class="bg-neutral-400 text-white px-4 py-2 hover:bg-blue-700 transition-colors duration-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    class="w-6 h-6"
                                    fill="white"
                                >
                                    <path
                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                    />
                                </svg>
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
        Desconto(prod) {
            const Discount = prod.price * (prod.sale_price / 100);

            const FinalDiscount = prod.price - Discount;

            return FinalDiscount.toFixed(2);
        },
    },
};
</script>
