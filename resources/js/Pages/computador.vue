<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Detalhes do Computador</h1>
        <p>Nome: {{ computador.name }}</p>
        <p>Preço: {{ computador.price }}€</p>
        <p>Detalhes do produtos: {{ computador.desc }}</p>
    </div>
</template>

<script>
export default {
    props: {
        computador: {
            type: Object,
            required: true,
        },
    },
};
</script>
