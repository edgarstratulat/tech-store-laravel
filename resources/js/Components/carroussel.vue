<template>
    <section>
        <!-- Título da seção -->
        <h1 class="text-3xl text-center my-8 font-bold">Promoções da semana</h1>

        <!-- Lista de produtos -->
        <div class="flex flex-wrap justify-center gap-8 px-4">
            <!-- Produto 1 -->
            <a
                href="http://localhost:8000/produtos/1"
                class="block bg-slate-100 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300"
            >
                <div class="w-80 h-96 flex flex-col">
                    <img
                        class="w-full h-72 object-cover rounded-t-lg"
                        src="/resources/img/computer-6816638_1280.jpg"
                        alt="PC Gaming"
                    />
                    <h2 class="text-2xl mt-4 text-center text-gray-800">
                        PC Gaming
                    </h2>
                    <p class="text-lg text-center text-gray-800">599€</p>
                </div>
            </a>

            <!-- Produto 2 -->
            <a href="http://localhost:8000/produtos/2">
                <div
                    class="bg-slate-100 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300"
                >
                    <div class="w-80 h-96 flex flex-col">
                        <img
                            class="w-full h-72 object-cover rounded-t-lg"
                            src="/resources/img/gaming-computer-6903836_1280.jpg"
                            alt="PC Gaming Ultra"
                        />
                        <h2 class="text-2xl mt-4 text-center text-gray-800">
                            PC Gaming Ultra
                        </h2>
                        <p class="text-lg text-center text-gray-800">799€</p>
                    </div>
                </div>
            </a>

            <!-- Produto 3 -->
            <a
                href="http://localhost:8000/produtos/3"
                class="block bg-slate-100 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300"
            >
                <div class="w-80 h-96 flex flex-col">
                    <img
                        class="w-full h-72 object-cover rounded-t-lg"
                        src="/resources/img/computer-6816638_1280.jpg"
                        alt="PC Gaming"
                    />
                    <h2 class="text-2xl mt-4 text-center text-gray-800">
                        PC Gaming Ultra Max
                    </h2>
                    <p class="text-lg text-center text-gray-800">999€</p>
                </div>
            </a>
        </div>
    </section>
</template>

<script>
export default {};
</script>
