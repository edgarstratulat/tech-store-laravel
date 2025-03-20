<template>
    <div class="bg-zinc-100">
        <navbar
            :Utilizador="Utilizador"
            :Buttons="buttons"
            :isAdmin="isAdmin"
        />
        <Products :products="products"></Products>
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Products from "../Components/Categories/productComponent.vue";

export default {
    components: {
        Navbar,
        Products,
    },
    props: {
        products: {
            type: Array,
            default: () => [],
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
