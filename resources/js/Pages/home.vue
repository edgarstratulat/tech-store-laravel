<template>
    <Navbar />
    <Carroussel />
    <Produtos />
    <div class="p-4">
        <ul>
            <li v-for="prod in produtos" :key="prod.id">
                <a :href="`http://localhost:8000/produtos/${prod.id}`">
                    {{ prod.name }} - {{ prod.price }}€
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Carroussel from "../Components/carroussel.vue";
import Produtos from "./produtos.vue";

export default {
    components: {
        Navbar,
        Carroussel,
        Produtos,
    },
    props: {
        produtos: {
            type: Array,
            required: true,
        },
    },
};
</script>
