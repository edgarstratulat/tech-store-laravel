<template>
    <Navbar />
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Detalhes do Produto</h1>
        <div class="mb-4">
            <img
                :src="`/storage/${DetalhesProduto.image_path}`"
                :alt="DetalhesProduto.name"
                class="w-full h-64 object-contain rounded-lg transition delay-50 hover:scale-105"
            />
        </div>
        <p>Nome: {{ DetalhesProduto.name }}</p>
        <p>Preço: {{ Desconto(DetalhesProduto) }}€</p>
        <p>Stock: {{ DetalhesProduto.stock }}</p>
        <p>Detalhes do produto: {{ DetalhesProduto.desc }}</p>
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";

export default {
    components: {
        Navbar,
    },
    props: {
        DetalhesProduto: {
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
