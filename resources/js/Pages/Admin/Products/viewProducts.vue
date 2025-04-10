<template>
    <Navbar :adminBtn="adminBtn" :Utilizador="Utilizador"></Navbar>
    <div class="max-w-6xl mx-auto p-6 mt-5">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            Produtos
        </h1>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white uppercase bg-blue-500">
                    <tr>
                        <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
                            Nome
                        </th>
                        <th
                            scope="col"
                            class="px-4 py-3 sm:px-6 sm:py-3 sm:table-cell"
                        >
                            Preço
                        </th>
                        <th
                            scope="col"
                            class="px-4 py-3 sm:px-6 sm:py-3 hidden md:table-cell"
                        >
                            Descrição
                        </th>
                        <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
                            Categoria
                        </th>
                        <th
                            scope="col"
                            class="px-4 py-3 sm:px-6 sm:py-3 hidden lg:table-cell"
                        >
                            Subcategoria
                        </th>
                        <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="product in products.data"
                        class="bg-white border-b hover:bg-gray-50"
                    >
                        <td
                            class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap"
                        >
                            {{ product.name }}
                        </td>

                        <td class="px-4 py-4 sm:table-cell">
                            {{ product.price }}€
                        </td>

                        <td
                            class="px-4 py-4 hidden md:table-cell truncate max-w-[150px]"
                        >
                            {{ product.description }}
                        </td>

                        <td class="px-4 py-4">
                            {{ showCategories(product.category_id) }}
                        </td>

                        <td class="px-4 py-4 hidden lg:table-cell">
                            {{ showSubcategories(product.subcategory_id) }}
                        </td>

                        <td
                            v-if="product.stock <= 0"
                            class="px-4 py-4 text-red-600"
                        >
                            {{ product.stock }}
                        </td>
                        <td
                            v-else-if="product.stock <= 10"
                            class="text-yellow-400"
                        >
                            {{ product.stock }}
                        </td>
                        <td v-else class="text-emerald-500">
                            {{ product.stock }}
                        </td>

                        <td class="px-4 py-4 space-x-2 whitespace-nowrap">
                            <button
                                @click="editProduct(product.id)"
                                class="bg-emerald-500 hover:bg-emerald-600 text-white p-2 rounded-lg text-sm"
                            >
                                <span class="hidden sm:inline">Atualizar</span>
                                <svg
                                    class="w-5 h-5 sm:hidden"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                    />
                                </svg>
                            </button>
                            <button
                                @click="deleteProduct(product.id)"
                                class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg text-sm"
                            >
                                <span class="hidden sm:inline">Eliminar</span>
                                <svg
                                    class="w-5 h-5 sm:hidden"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <Pagination :links="products.links"></Pagination>
    </div>
</template>

<script>
import Navbar from "../../../Components/Buttons/AdminNavbar/navbar.vue";
import Pagination from "../../../Components/Inputs/Pagination/paginate.vue";

export default {
    components: {
        Navbar,
        Pagination,
    },
    props: {
        products: {
            type: [Array, Object],
            required: true,
        },
        adminBtn: {
            type: Array,
            required: true,
        },
        Utilizador: {
            type: Object,
            required: true,
        },
        category: {
            type: Array,
            required: true,
        },
        subcategory: {
            type: Array,
            required: true,
        },
    },
    methods: {
        showCategories(category_id) {
            const category = this.category.find(
                (cate) => cate.id === category_id
            );

            return category.name;
        },

        showSubcategories(subcategory_id) {
            const subcategory = this.subcategory.find(
                (subcate) => subcate.id === subcategory_id
            );

            return subcategory.name;
        },
    },
};
</script>
