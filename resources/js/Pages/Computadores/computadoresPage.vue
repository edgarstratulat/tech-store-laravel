<template>
    <div class="bg-zinc-100">
        <navbar
            :Utilizador="Utilizador"
            :Buttons="buttons"
            :isAdmin="isAdmin"
        />
        <h1
            class="m-8 text-center text-3xl mb-5 lg:text-left md:text-center sm:text-center font-bold text-gray-800"
        >
            Computadores MaRca
        </h1>
        <Product :products="products"></Product>
    </div>
</template>

<script>
import navbar from "../../Components/navbar.vue";
import Product from "../../Components/Categories/productComponent.vue";

export default {
    components: {
        navbar,
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
