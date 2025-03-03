<template>
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo e Links do Menu -->
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="http://localhost:8000/" class="flex items-center">
                        <span class="font-semibold text-blue-600 text-2xl"
                            >MaRca</span
                        >
                    </a>

                    <!-- Links do Menu (Desktop) -->
                    <div
                        class="hidden md:flex md:items-center md:space-x-6 ml-8"
                    >
                        <a
                            href="http://localhost:8000/promocoes"
                            class="text-gray-500 hover:text-blue-600 transition duration-300"
                            >Promoções</a
                        >
                        <a
                            href="#"
                            class="text-gray-500 hover:text-blue-600 transition duration-300"
                            >Contactos</a
                        >
                        <a
                            href="http://localhost:8000/produto/adicionar"
                            class="text-gray-500 hover:text-blue-600 transition duration-300"
                            >Adicionar Produtos</a
                        >
                    </div>
                </div>

                <div class="flex items-center space-x-6">
                    <!-- Barra de Pesquisa -->
                    <div class="hidden md:block">
                        <div class="relative">
                            <input
                                type="text"
                                name="search"
                                placeholder="Pesquisar produtos..."
                                class="w-64 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                            />
                            <button
                                type="submit"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center"
                            >
                                <svg
                                    class="w-5 h-5 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Ícones lua -->
                    <div class="flex items-center space-x-4">
                        <a
                            href="#"
                            class="p-2 text-neutral-400 hover:text-blue-600 transition duration-300 relative"
                        >
                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                                />
                            </svg>
                        </a>
                        <div class="flex items-center space-x-4">
                            <a
                                href="#"
                                class="p-2 text-neutral-400 hover:text-blue-600 transition duration-300 relative"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    class="w-6 h-6"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                    />
                                </svg>
                            </a>
                        </div>

                        <!-- User Icon with Dropdown -->
                        <div class="relative">
                            <button
                                @click="toggleDropdown"
                                class="p-2 text-neutral-400 hover:text-blue-600 transition duration-300"
                            >
                                <svg
                                    class="w-6 h-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                            </button>
                            <!-- Dropdown Menu -->
                            <ul
                                v-if="isDropdownOpen"
                                class="absolute right-0 z-10 mt-2 w-48 rounded-lg border border-slate-200 bg-white shadow-lg"
                            >
                                <a href="http://localhost:8000/login">
                                    <li
                                        class="cursor-pointer text-slate-800 flex items-center p-3 hover:bg-slate-100"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            class="w-5 h-5 text-slate-400"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        <span class="ml-2">Login</span>

                                        <hr class="my-2 border-slate-200" />
                                    </li>
                                </a>
                                <a href="http://localhost:8000/registo">
                                    <li
                                        class="cursor-pointer text-slate-800 flex items-center p-3 hover:text-blue-600"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            class="w-5 h-5 text-slate-400"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        <span class="ml-2">Registo</span>

                                        <hr class="my-2 border-slate-200" />
                                    </li>
                                </a>
                                <a href="http://localhost:8000/logout">
                                    <li
                                        class="cursor-pointer text-slate-800 flex items-center p-3 hover:bg-slate-100"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            class="w-5 h-5 text-slate-400"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        <span class="ml-2">Logout</span>

                                        <hr class="my-2 border-slate-200" />
                                    </li>
                                </a>
                            </ul>
                        </div>

                        <!-- Cart Icon -->
                        <a
                            href="#"
                            class="p-2 text-neutral-400 hover:text-blue-600 transition duration-300 relative"
                        >
                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Menu Mobile -->
            <div class="md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-2">
                    <!-- Barra de Pesquisa (Mobile) -->
                    <input
                        type="text"
                        placeholder="Pesquisar..."
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                    />

                    <!-- Links do Menu (Mobile) -->
                    <a
                        href="http://localhost:8000/"
                        class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded text-center"
                        >Home</a
                    >
                    <a
                        href="#"
                        class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded text-center"
                        >Promoções</a
                    >
                    <a
                        href="#"
                        class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded text-center"
                        >Contactos</a
                    >
                    <a
                        href="#"
                        class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded text-center"
                        >Adicionar Produtos</a
                    >
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            isDropdownOpen: false,
        };
    },
    methods: {
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        },
    },
};
</script>
