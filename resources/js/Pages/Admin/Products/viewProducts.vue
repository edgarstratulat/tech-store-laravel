<template>
    <Navbar :adminBtn="adminBtn" :Utilizador="Utilizador"></Navbar>
    <div class="max-w-6xl mx-auto p-6 mt-5">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            Produtos
        </h1>
        <div class="w-full text-sm text-left text-gray-500">
            <table
                class="w-full max-h-6xl max-w-6xl mx-auto text-sm text-left text-gray-500"
            >
                <thead class="text-xs text-white uppercase bg-blue-500">
                    <tr>
                        <th class="px-6 py-3">Nome</th>
                        <th class="px-6 py-3">Preço</th>
                        <th class="px-6 py-3">Descrição</th>
                        <th class="px-6 py-3">Categoria</th>
                        <th class="px-6 py-3">Subcategoria</th>
                        <th class="px-6 py-3">Stock</th>
                        <th class="px-6 py-3">Atualizar</th>
                        <th class="px-6 py-3">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="products in products.data"
                        :key="products.id"
                        class="bg-gray-100 shadow-md text-center"
                    >
                        <td
                            class="pl-6 py-3 font-medium text-left text-gray-900 whitespace-nowrap"
                        >
                            {{ products.name }}
                        </td>
                        <td>{{ products.price }}</td>
                        <td>{{ products.description }}</td>
                        <td>{{ showCategories(products.category_id) }}</td>
                        <td>
                            {{ showSubcategories(products.subcategory_id) }}
                        </td>
                        <td v-if="products.stock <= 0" class="text-red-600">
                            {{ products.stock }}
                        </td>
                        <td
                            v-else-if="products.stock <= 10"
                            class="text-yellow-600"
                        >
                            {{ products.stock }}
                        </td>
                        <td v-else class="text-emerald-500">
                            {{ products.stock }}
                        </td>
                        <td>
                            <button
                                class="bg-emerald-500 hover:bg-emerald-600 text-white p-2 rounded-lg"
                            >
                                Atualizar
                            </button>
                        </td>
                        <td>
                            <button
                                class="bg-red-600 hover:bg-red-800 text-white p-2 rounded-lg"
                            >
                                Eliminar
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
