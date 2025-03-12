<template>
    <div>
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

    <div
        v-if="isMobileMenuOpen"
        class="md:hidden absolute top-16 right-0 w-full z-10 bg-white"
    >
        <div class="px-2 pt-2 pb-3 space-y-2">
            <NavbarSearchMobile></NavbarSearchMobile>

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
</template>

<script>
import NavbarSearchMobile from "../../Inputs/Navbar/navbarSearchMobile.vue";

export default {
    components: {
        NavbarSearchMobile,
    },
    props: {
        Buttons: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            isMobileMenuOpen: false,
        };
    },
    methods: {
        redirect(route) {
            this.$inertia.visit(route);
        },
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
