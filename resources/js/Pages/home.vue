<template>
    <div class="bg-zinc-100">
        <navbar :Utilizador="Utilizador" :Buttons="Buttons" />
        <Carroussel />
        <Promocoes :Promocoes="maxPromotionProductsShow()" />
        <div class="flex justify-center">
            <a href="http://localhost:8000/promocoes">
                <button
                    class="bg-blue-600 text-white px-6 py-4 rounded-sm hover:bg-blue-800 transition-colors duration-300"
                >
                    Ver todas as ofertas
                </button>
            </a>
        </div>
        <div class="w-full bg-neutral-800">
            <div class="flex justify-center pt-20 mt-24">
                <h1 class="text-3xl font-bold text-white">Os nossos PC's</h1>
            </div>
            <div>
                <p class="flex justify-center text-neutral-400 mt-2">
                    Preparado para levar o teu jogo ao proximo nível? Conhece os
                    nossos PC's, com componentes cuidadosamente selecionados por
                    nós.
                </p>
            </div>
            <div>
                <span class="flex justify-center font-bold text-white"
                    >Desempenho extremo para jogadores exigentes
                </span>
            </div>
            <div class="flex justify-center m-4">
                <a href="/computadores">
                    <button
                        class="bg-white text-black px-6 py-4 rounded-sm hover:bg-gray-300 transition-colors duration-300 justify-center"
                    >
                        Ver todos
                    </button>
                </a>
            </div>
            <div class="pb-10">
                <ComputadoresComponent :Computer="maxComputerProductsShow()" />
            </div>
        </div>
        <div class="m-10">
            <MaisVendidos :Promocoes="Promocoes" />
            <div class="flex justify-center">
                <a href="http://localhost:8000/promocoes">
                    <button
                        class="bg-blue-600 text-white px-6 py-4 rounded-sm hover:bg-blue-800 transition-colors duration-300"
                    >
                        Ver todas as ofertas
                    </button>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import navbar from "../Components/navbar.vue";
import Carroussel from "../Components/carroussel.vue";
import Promocoes from "../Components/Categories/promocoes.vue";
import ComputadoresComponent from "../Components/Categories/computadoresComponent.vue";
import MaisVendidos from "../Components/maisVendidos.vue";

export default {
    components: {
        navbar,
        Carroussel,
        Promocoes,
        ComputadoresComponent,
        MaisVendidos,
    },
    props: {
        Promocoes: {
            type: Array,
            required: true,
        },
        Computadores: {
            type: Array,
            required: true,
        },
        Utilizador: {
            type: Object,
        },
        Buttons: {
            type: Array,
        },
    },
    methods: {
        maxPromotionProductsShow() {
            return this.Promocoes.slice(0, 8);
        },
        maxComputerProductsShow() {
            return this.Computadores.slice(0, 4);
        },
    },
};
</script>
