<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import Navbar from "../../../Components/Buttons/AdminNavbar/navbar.vue";

const form = reactive({
    name: "",
    price: "",
    sale_price: "",
    description: "",
    category_id: "",
    subcategory_id: "",
    image: null,
    stock: "",
});

const Discount = () => {
    const Discount = form.price * (form.sale_price / 100);
    const FinalDiscount = form.price - Discount;
    return FinalDiscount.toFixed(2);
};

const handleImageUpload = (event) => {
    form.image = event.target.files[0];
};

const submit = () => {
    const formData = new FormData();
    formData.append("name", form.name);
    formData.append("price", form.price);
    formData.append("sale_price", form.sale_price);
    formData.append("description", form.description);
    formData.append("image", form.image);
    formData.append("category_id", form.category_id);
    formData.append("subcategory_id", form.subcategory_id);
    formData.append("stock", form.stock);

    router.post("/dashboard/produto/adicionar", formData);
};
</script>

<script>
export default {
    props: {
        adminBtn: {
            type: Array,
            required: true,
        },
        categories: {
            type: Array,
            required: true,
        },
        subcategories: {
            type: Array,
            required: true,
        },
    },
};
</script>

<template>
    <Navbar :adminBtn="adminBtn" />
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
                    autocomplete="name"
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
                    type="number"
                    v-model="form.price"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                />
            </div>

            <div>
                <label
                    for="price"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    % de Desconto:
                </label>
                <input
                    id="sale_price"
                    type="number"
                    v-model="form.sale_price"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                />
            </div>

            <div v-if="form.sale_price >= 0 && form.price > 0">
                <label
                    for="price"
                    class="block mb-2 text-md font-medium text-emerald-400"
                >
                    Preço Final: {{ Discount() }}€
                </label>
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
                    v-model="form.description"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
                />
            </div>
            <div>
                <label
                    for="category"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Categoria do produto:
                </label>
                <select
                    v-model="form.category_id"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="">Selecione uma Categoria</option>

                    <option v-for="category in categories" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </div>

            <div>
                <label
                    for="subCategory"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Sub categoria do produto:
                </label>
                <select
                    v-model="form.subcategory_id"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="">
                        Selecione uma Sub categoria
                    </option>

                    <option
                        v-for="subCategory in subcategories"
                        :value="subCategory.id"
                    >
                        {{ subCategory.name }}
                    </option>
                </select>
            </div>

            <div>
                <label
                    for="stock"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Stock do produto:
                </label>
                <input
                    id="stock"
                    type="number"
                    v-model="form.stock"
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
        </form>
    </div>
</template>
