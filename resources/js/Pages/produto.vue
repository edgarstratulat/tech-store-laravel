<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Detalhes do Produto</h1>
        <p>Nome: {{ produto.name }}</p>
        <p>Preço: {{ produto.price }}€</p>
        <p>Detalhes do produtos: {{ produto.desc }}</p>
    </div>
</template>

<script>
export default {
    props: {
        produto: {
            type: Object,
            required: true,
        },
    },
};
</script>
