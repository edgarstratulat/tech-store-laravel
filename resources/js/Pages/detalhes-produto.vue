<template>
    <Navbar />
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Detalhes do Produto</h1>
        <p>Nome: {{ DetalhesProduto.name }}</p>
        <p>Preço: {{ DetalhesProduto.price }}€</p>
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
};
</script>
