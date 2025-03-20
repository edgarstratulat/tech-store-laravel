<template>
    <div class="bg-zinc-100">
        <Navbar
            :Utilizador="Utilizador"
            :Buttons="buttons"
            :isAdmin="isAdmin"
        />
        <h1
            class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            Video
        </h1>
        <Product :products="products" />
    </div>
</template>

<script>
import Navbar from "../../Components/navbar.vue";
import Product from "../../Components/Categories/productComponent.vue";

export default {
    components: {
        Navbar,
        Product,
    },
    props: {
        products: {
            type: Array,
            required: true,
        },
        Utilizador: {
            type: Object,
        },
        buttons: {
            type: Array,
            required: true,
        },
        isAdmin: {
            type: Boolean,
        },
    },
};
</script>
