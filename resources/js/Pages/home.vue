<template>
    <div class="bg-zinc-100">
        <Navbar />
        <Carroussel />
        <Promocoes :Promocoes="Promocoes" />
        <div class="flex justify-center">
            <a href="http://localhost:8000/promocoes">
                <button
                    class="bg-blue-600 text-white px-6 py-4 rounded-sm hover:bg-blue-600 transition-colors duration-300 justify-center"
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
import Promocoes from "../Components/promocoes.vue";
import Computadores from "../Components/computadores.vue";

export default {
    components: {
        Navbar,
        Carroussel,
        Promocoes,
        Computadores,
    },
    props: {
        Promocoes: {
            type: Array,
            required: true,
        },
    },
};
</script>
