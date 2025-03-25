<template>
    <Navbar :adminBtn="adminBtn" :Utilizador="Utilizador"></Navbar>
    <div class="max-w-6xl mx-auto p-6 mt-5">
        <h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">
            Visualizar Produtos
        </h1>
        <table class="w-full text-sm text-center text-black">
            <thead
                class="text-xs text-white uppercase bg-gray-50 dark:bg-blue-500"
            >
                <tr>
                    <th scope="col" class="px-6 py-3">Nome</th>
                    <th scope="col" class="px-6 py-3">Preço</th>
                    <th scope="col" class="px-6 py-3">Descrição</th>
                    <th scope="col" class="px-6 py-3">Categoria</th>
                    <th scope="col" class="px-6 py-3">Subcategoria</th>
                    <th scope="col" class="px-6 py-3">Stock</th>
                    <th scope="col" class="px-6 py-3">Atualizar</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="products in products.data"
                    class="bg-gray-100 shadow-md text-center"
                >
                    <td>{{ products.name }}</td>
                    <td>{{ products.price }}</td>
                    <td>{{ products.description }}</td>
                    <td>{{ products.category_id }}</td>
                    <td>{{ products.subcategory_id }}</td>
                    <td>{{ products.stock }}</td>
                    <td>Atualizar</td>
                </tr>
            </tbody>
        </table>

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
    },
};
</script>
