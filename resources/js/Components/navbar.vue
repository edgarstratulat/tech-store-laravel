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
                        <div v-for="btn in filterButtonsNavBar" :key="btn.id">
                            <button
                                @click="redirect(btn.route)"
                                class="text-gray-500 hover:text-blue-600 transition duration-300"
                            >
                                {{ btn.button_name }}
                            </button>
                        </div>
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

                    <div class="flex items-center space-x-4">
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
                                class="absolute right-0 z-10 mt-2 w-48 rounded-lg border border-slate-200 bg-white shadow-lg text-center"
                            >
                                <li
                                    class="cursor-pointer text-slate-800 hover:text-blue-600"
                                >
                                    <button
                                        v-if="!Utilizador"
                                        v-for="btn in filterButtonsDropDownMenuNotLogged"
                                        :key="btn.id"
                                        @click="redirect(btn.route)"
                                        class="text-slate-800 hover:text-blue-600 transition duration-300 ml-2"
                                    >
                                        {{ btn.button_name }}
                                    </button>
                                </li>
                                <a v-if="Utilizador">
                                    <li
                                        class="cursor-pointer text-slate-800 px-2 pt-2 font-bold"
                                    >
                                        <span class="text-center"
                                            >Olá, {{ Utilizador.name }}</span
                                        >
                                        <hr class="my-2 border-slate-200" />
                                    </li>
                                </a>

                                <li
                                    class="cursor-pointer text-slate-800 p-3 hover:text-blue-600"
                                >
                                    <button
                                        v-if="Utilizador"
                                        v-for="btn in filterButtonsDropDownMenuLogged"
                                        :key="btn.id"
                                        @click="redirect(btn.route)"
                                        class="text-slate-800 hover:text-blue-600 transition duration-300 ml-2"
                                    >
                                        {{ btn.button_name }}
                                    </button>
                                </li>
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

                    <!-- Hamburger Menu for Mobile -->
                    <div class="md:hidden flex items-center">
                        <button
                            @click="toggleMobileMenu"
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
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Menu Mobile -->
            <div v-if="isMobileMenuOpen" class="md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-2">
                    <!-- Barra de Pesquisa (Mobile) -->
                    <input
                        type="text"
                        placeholder="Pesquisar..."
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                    />

                    <!-- Links do Menu (Mobile) -->
                    <a
                        v-for="btn in filterButtonsNavBar"
                        :key="btn.id"
                        @click="redirect(btn.route)"
                        class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded text-center"
                    >
                        {{ btn.button_name }}
                    </a>
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
            isMobileMenuOpen: false,
            isDropdownNavbarOpen: false,
        };
    },
    props: {
        Utilizador: {
            type: Object,
        },
        Buttons: {
            type: Array,
        },
    },
    computed: {
        filterButtonsNavBar() {
            const navbarButtons = [1, 2, 3, 4, 5, 6];
            return this.Buttons.filter((btn) => navbarButtons.includes(btn.id));
        },
        filterButtonsDropDownMenuNotLogged() {
            const DropdownButtons = [8, 9];
            return this.Buttons.filter((btn) =>
                DropdownButtons.includes(btn.id)
            );
        },
        filterButtonsDropDownMenuLogged() {
            const DropdownButtons = [7, 10];
            return this.Buttons.filter((btn) =>
                DropdownButtons.includes(btn.id)
            );
        },
    },
    methods: {
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        },
        toggleMobileMenu() {
            this.isMobileMenuOpen = !this.isMobileMenuOpen;
        },
        toggleDropdownNavbarOpen() {
            this.isDropdownNavbarOpen = !this.isDropdownNavbarOpen;
        },
        redirect(route) {
            this.$inertia.visit(route);
        },
    },
};
</script>
