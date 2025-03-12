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
                    <navbarButtons
                        :Utilizador="Utilizador"
                        :Buttons="Buttons"
                    ></navbarButtons>
                </div>

                <NavbarSearch></NavbarSearch>

                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-4">
                        <!-- User Icon with Dropdown -->
                        <userButton
                            :Utilizador="Utilizador"
                            :Buttons="Buttons"
                        ></userButton>

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

                        <!-- Hamburger Menu (moved to right side of the cart) -->
                        <NavbarMenuMobile :Buttons="Buttons"></NavbarMenuMobile>
                    </div>
                </div>
            </div>

            <!-- Menu Mobile -->
        </div>
    </nav>
</template>

<script>
import NavbarSearch from "./Inputs/Navbar/navbarSearch.vue";
import navbarButtons from "./Buttons/Navbar/navbarButtons.vue";
import userButton from "./Buttons/Navbar/userButton.vue";
import NavbarSearchMobile from "./Inputs/Navbar/navbarSearchMobile.vue";
import NavbarMenuMobile from "./Menu/Mobile/navbarMenuMobile.vue";

export default {
    components: {
        NavbarSearch,
        NavbarSearchMobile,
        navbarButtons,
        userButton,
        NavbarMenuMobile,
    },
    data() {
        return {
            isMobileMenuOpen: false,
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
    methods: {
        toggleMobileMenu() {
            this.isMobileMenuOpen = !this.isMobileMenuOpen;
        },
    },
    computed: {
        filterButtonsNavBar() {
            const navbarButtons = [1, 2, 3, 4, 5, 6];
            return this.Buttons.filter((btn) => navbarButtons.includes(btn.id));
        },
    },
};
</script>
