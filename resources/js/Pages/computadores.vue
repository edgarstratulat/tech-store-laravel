<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Lista de Computadores</h1>
        <div>
            <ul>
                <li v-for="pc in computadores" :key="pc.id">
                    <a :href="`http://localhost:8000/computadores/${pc.id}`">
                        {{ pc.name }} - {{ pc.price }}€
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        computadores: {
            type: Array,
            required: true,
        },
    },
};
</script>
