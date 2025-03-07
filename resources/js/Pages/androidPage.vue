<template>
    <div class="bg-zinc-100">
        <Navbar :Utilizador="Utilizador" />
        <Telemovel :Telemovel="Telemovel" />
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Telemovel from "../Components/Categories/telemovelComponent.vue";

export default {
    components: {
        Navbar,
        Telemovel,
    },
    props: {
        Telemovel: {
            type: Array,
            required: true,
        },
        Utilizador: {
            type: Object,
            required: true,
        },
    },
    methods: {
        Desconto(promo) {
            const Discount = promo.price * (promo.sale_price / 100);

            const FinalDiscount = promo.price - Discount;

            return FinalDiscount.toFixed(2);
        },
    },
};
</script>
