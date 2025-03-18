<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
import Navbar from "../../../Components/Buttons/AdminNavbar/navbar.vue";

const form = reactive({
    name: null,
    price: null,
    sale_price: null,
    desc: null,
    category: [],
    subCategory: [],
    image: null,
    stock: null,
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
    formData.append("desc", form.desc);
    formData.append("image", form.image);
    formData.append("category", form.category);
    formData.append("subCategory", form.subCategory);
    formData.append("desc", form.desc);
    formData.append("stock", form.stock);

    router.post("dashboard/produto/adicionar", formData);
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
                    v-model="form.desc"
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
                    v-model="form.category"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="">Selecione uma Categoria</option>

                    <option value="Computadores">Computadores</option>
                    <option value="Periféricos">Periféricos</option>
                    <option value="Telemóveis">Telemóveis</option>
                    <option value="Componentes">Componentes</option>
                    <option value="Acessórios">Acessórios</option>
                </select>
            </div>

            <div v-if="form.category == 'Computadores'">
                <label
                    for="subCategory"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Sub categoria do produto:
                </label>
                <select
                    v-model="form.subCategory"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="">
                        Selecione uma Sub categoria
                    </option>

                    <option value="desktop">Desktop</option>
                    <option value="gaming">Gaming</option>
                    <option value="portateis">Portáteis</option>
                    <option value="workstation">Workstation</option>
                    <option value="micro-computadores">
                        MicroComputadores
                    </option>
                </select>
            </div>
            <div v-else-if="form.category == 'Periféricos'">
                <label
                    for="subCategory"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Sub categoria do produto:
                </label>
                <select
                    v-model="form.subCategory"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="">
                        Selecione uma Sub categoria
                    </option>

                    <option value="ratos-e-teclados">Ratos & Teclados</option>
                    <option value="pc-audio">PC Audio</option>
                    <option value="monitores">Monitores</option>
                    <option value="webcams">Webcams</option>
                </select>
            </div>
            <div v-else-if="form.category == 'Telemóveis'">
                <label
                    for="subCategory"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Sub categoria do produto:
                </label>
                <select
                    v-model="form.subCategory"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="">
                        Selecione uma Sub categoria
                    </option>

                    <option value="iphone">Smartphones Iphone</option>
                    <option value="android">Smartphones Android</option>
                </select>
            </div>
            <div v-else-if="form.category == 'Componentes'">
                <label
                    for="subCategory"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Sub categoria do produto:
                </label>
                <select
                    v-model="form.subCategory"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="">
                        Selecione uma Sub categoria
                    </option>

                    <option value="processadores">Processadores</option>
                    <option value="motherboards">Motherboards</option>
                    <option value="cpu-coolers">CPU Coolers</option>
                    <option value="placas-graficas">Placas Gráficas</option>
                    <option value="memorias-ram">Memórias RAM</option>
                    <option value="armazenamento">Armazenamento</option>
                    <option value="caixas-de-computadores">
                        Caixas de Computadores
                    </option>
                    <option value="fontes-de-alimentacao">
                        Fontes de alimentação
                    </option>
                </select>
            </div>
            <div v-else-if="form.category == 'Acessórios'">
                <label
                    for="subCategory"
                    class="block mb-2 text-sm font-medium text-gray-700"
                >
                    Sub categoria do produto:
                </label>
                <select
                    v-model="form.subCategory"
                    class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                >
                    <option disabled value="Selecione uma Sub categoria">
                        Selecione uma Sub categoria
                    </option>

                    <option value="acessorios-para-computador">
                        Acessórios para Computador
                    </option>
                    <option value="acessorios-para-telemovel">
                        Acessórios para Smartphone
                    </option>
                    <option value="acessorios-para-casa">
                        Acessórios para Casa
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

<script>
export default {
    components: {
        Navbar,
    },
    props: {
        adminBtn: {
            type: Array,
            required: true,
        },
    },
};
</script>
