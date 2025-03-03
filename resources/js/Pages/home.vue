<template>
    <div class="bg-zinc-100">
        <Navbar />
        <Carroussel />
        <Produtos :Produtos="Produtos" />
        <div class="flex justify-center">
            <a href="http://localhost:8000/promocoes">
                <button
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300 justify-center"
                >
                    Ver todas as ofertas
                </button>
            </a>
        </div>
        <Computadores />
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Carroussel from "../Components/carroussel.vue";
import Produtos from "../Components/produtos.vue";
import Computadores from "../Components/computadores.vue";

export default {
    components: {
        Navbar,
        Carroussel,
        Produtos,
        Computadores,
    },
    props: {
        Produtos: {
            type: Array,
            required: true,
        },
    },
    methods: {
        limitedProducts() {
            return Produtos.slice(0, 4);
        },
    },
};
</script>
