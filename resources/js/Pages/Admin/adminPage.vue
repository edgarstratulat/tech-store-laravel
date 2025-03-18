<template>
    <div
        class="hs-overlay [--auto-close:lg] lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 w-64 hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform h-full hidden fixed top-0 start-0 bottom-0 z-60 bg-white border-e border-gray-200"
        tabindex="-1"
        aria-label="Sidebar"
    >
        <div class="relative flex flex-col h-full max-h-full">
            <header class="p-4 flex items-center gap-x-2">
                <a
                    class="flex-none font-semibold text-xl text-blue-600 focus:outline-hidden focus:opacity-80"
                    href="/"
                    aria-label="Brand"
                    >MaRca</a
                >
            </header>

            <navbar :adminBtn="adminBtn"></navbar>
        </div>
    </div>
</template>

<script>
import navbar from "../../Components/Buttons/AdminNavbar/navbar.vue";

export default {
    components: {
        navbar,
    },
    data() {
        return {
            dropdownNavbarStates: {},
        };
    },
    props: {
        adminBtn: {
            type: Array,
            required: true,
        },
    },
    methods: {
        toggleDropdownNavbar(btnId) {
            if (this.dropdownNavbarStates[btnId]) {
                this.dropdownNavbarStates[btnId] = false;
            } else {
                this.dropdownNavbarStates[btnId] = true;
            }
        },
        isDropdownNavbarOpen(btnId) {
            return this.dropdownNavbarStates[btnId] === true;
        },
        redirect(route) {
            this.$inertia.visit(route);
        },
    },
};
</script>
