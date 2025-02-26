<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Lista de Computadores</h1>
        <div>
            <ul>
                <li v-for="prod in produtos" :key="prod.id">
                    <a :href="`http://localhost:8000/produtos/${prod.id}`">
                        {{ prod.name }} - {{ prod.price }}€
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        produtos: {
            type: Array,
            required: true,
        },
    },
};
</script>
