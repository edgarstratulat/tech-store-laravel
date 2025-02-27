<template>
    <section class="pt-12 bg-gray-50">
        <!-- Título da seção -->
        <h1 class="text-3xl text-center font-bold text-gray-800 mb-5">
            Promoções da Semana
        </h1>

        <!-- Lista de produtos -->
        <div class="flex flex-wrap justify-center gap-8 px-4">
            <!-- Produto 1 -->
            <a
                href="#"
                class="block bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:scale-105"
            >
                <div class="w-72 h-96 flex flex-col">
                    <img
                        class="w-full h-60 object-cover rounded-t-lg"
                        src="/resources/img/computer-6816638_1280.jpg"
                        alt="PC Gaming"
                    />
                    <div class="p-4 flex flex-col items-center">
                        <h2 class="text-xl font-semibold text-gray-800">
                            PC Gaming
                        </h2>
                        <p class="text-lg text-gray-600 mt-2">599€</p>
                        <button
                            class="mt-4 bg-gray-700 text-white px-6 py-2 rounded-md hover:bg-gray-900 transition-colors duration-300"
                        >
                            Comprar
                        </button>
                    </div>
                </div>
            </a>

            <!-- Produto 2 -->
            <a
                href="#"
                class="block bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:scale-105"
            >
                <div class="w-72 h-96 flex flex-col">
                    <img
                        class="w-full h-60 object-cover rounded-t-lg"
                        src="/resources/img/gaming-computer-6903836_1280.jpg"
                        alt="PC Gaming Ultra"
                    />
                    <div class="p-4 flex flex-col items-center">
                        <h2 class="text-xl font-semibold text-gray-800">
                            PC Gaming Ultra
                        </h2>
                        <p class="text-lg text-gray-600 mt-2">799€</p>
                        <button
                            class="mt-4 bg-gray-700 text-white px-6 py-2 rounded-md hover:bg-gray-900 transition-colors duration-300"
                        >
                            Comprar
                        </button>
                    </div>
                </div>
            </a>

            <!-- Produto 3 -->
            <a
                href="#"
                class="block bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:scale-105"
            >
                <div class="w-72 h-96 flex flex-col">
                    <img
                        class="w-full h-60 object-cover rounded-t-lg"
                        src="/resources/img/computer-6816638_1280.jpg"
                        alt="PC Gaming Ultra Max"
                    />
                    <div class="p-4 flex flex-col items-center">
                        <h2 class="text-xl font-semibold text-gray-800">
                            PC Gaming Ultra Max
                        </h2>
                        <p class="text-lg text-gray-600 mt-2">999€</p>
                        <button
                            class="mt-4 bg-gray-700 text-white px-6 py-2 rounded-md hover:bg-gray-900 transition-colors duration-300"
                        >
                            Comprar
                        </button>
                    </div>
                </div>
            </a>
        </div>
    </section>
</template>

<script>
export default {};
</script>
