<template>
    <!-- Mobile menu button (hamburger) - shown only on mobile -->
    <button
        @click="toggleMobileMenu"
        class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-md text-gray-500 hover:bg-gray-100 focus:outline-none"
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

    <!-- Overlay for mobile - shown when menu is open -->
    <div
        v-if="isMobileMenuOpen"
        @click="isMobileMenuOpen = false"
        class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40"
    ></div>

    <!-- Sidebar/Navbar -->
    <div
        class="hs-overlay [--auto-close:lg] lg:translate-x-0 lg:end-auto lg:bottom-0 w-64 lg:w-auto hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform h-full fixed top-0 start-0 bottom-0 z-50 bg-white shadow-lg border-e border-gray-200"
        :class="{
            'lg:block': true,
            'translate-x-0': isMobileMenuOpen,
            '-translate-x-full': !isMobileMenuOpen,
        }"
        tabindex="-1"
        aria-label="Sidebar"
    >
        <div class="relative flex flex-col h-full max-h-full">
            <header class="p-4 flex items-center gap-x-2">
                <a
                    class="flex-none font-semibold text-2xl text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 via-indigo-500 to-violet-700 focus:outline-hidden focus:opacity-80"
                    href="/"
                    aria-label="Brand"
                    >{{ t("title") }}</a
                >
                <!-- Close button for mobile -->
                <button
                    @click="toggleMobileMenu"
                    class="lg:hidden ml-auto p-2 rounded-md text-gray-500 hover:bg-gray-100 focus:outline-none"
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
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </header>
            <nav
                class="flex-1 overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 pr-5"
            >
                <div class="pb-20">
                    <!-- Added padding to prevent content from being hidden under bottom menu -->
                    <div
                        v-for="btn in filterButtonsNotDropDown"
                        :key="btn.id"
                        class="relative"
                    >
                        <button
                            @click="
                                btn.dropdown
                                    ? toggleDropdownNavbar(btn.id)
                                    : redirect(btn.route)
                            "
                            class="w-full flex items-center justify-between p-3 text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-300"
                        >
                            <span class="flex items-center gap-2">
                                <fa
                                    v-if="btn.icon"
                                    :icon="btn.icon"
                                    class="text-lg"
                                ></fa>

                                <span>{{
                                    t(`admin-buttons.${btn.button_name}`)
                                }}</span>
                            </span>
                            <fa
                                v-if="btn.dropdown"
                                :icon="
                                    isDropdownNavbarOpen(btn.id)
                                        ? 'chevron-up'
                                        : 'chevron-down'
                                "
                                class="text-sm text-gray-400"
                            />
                        </button>

                        <ul
                            v-if="btn.dropdown && isDropdownNavbarOpen(btn.id)"
                            class="ml-4 mt-1 space-y-1 border-l border-gray-200 pl-3"
                        >
                            <li
                                class="cursor-pointer text-slate-800 hover:text-blue-600"
                                v-for="option in JSON.parse(
                                    btn.dropdownOptions
                                )"
                                :key="option.id"
                                @click="redirect(option.route)"
                            >
                                <span class="flex items-center gap-2 py-2">
                                    <fa
                                        v-if="option.icon"
                                        :icon="option.icon"
                                        class="text-lg"
                                    ></fa>
                                    <span>{{
                                        t(
                                            `admin-buttons-options.${option.button_name}`
                                        )
                                    }}</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Bottom menu section -->
            <div
                class="absolute bottom-0 left-0 right-0 bg-gray-100 p-2 border-t border-gray-200"
            >
                <ChangeLang></ChangeLang>

                <div
                    v-for="btn in filterButtonsDropDownMenuLogged"
                    :key="btn.id"
                >
                    <button
                        @click="
                            btn.dropdown
                                ? toggleDropdownNavbar(btn.id)
                                : redirect(btn.route)
                        "
                        class="w-full flex items-center justify-between p-3 text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-300"
                    >
                        <span class="flex items-center gap-2">
                            <fa
                                v-if="btn.icon"
                                :icon="btn.icon"
                                class="text-lg"
                            ></fa>

                            <span class="text-left">
                                {{ t(`admin-buttons.${btn.button_name}`) }},
                                {{ Utilizador.name }}
                            </span>
                        </span>
                        <fa
                            v-if="btn.dropdown"
                            :icon="
                                isDropdownNavbarOpen(btn.id)
                                    ? 'chevron-up'
                                    : 'chevron-down'
                            "
                            class="text-sm text-gray-400"
                        />
                    </button>

                    <ul
                        v-if="btn.dropdown && isDropdownNavbarOpen(btn.id)"
                        class="ml-4 mt-1 mb-2 space-y-1 border-l border-gray-200 pl-3"
                    >
                        <li
                            class="cursor-pointer text-slate-800 hover:text-blue-600"
                            v-for="option in JSON.parse(btn.dropdownOptions)"
                            :key="option.id"
                            @click="redirect(option.route)"
                        >
                            <span class="flex items-center gap-2 py-2">
                                <fa
                                    v-if="option.icon"
                                    :icon="option.icon"
                                    class="text-lg"
                                ></fa>
                                <span>{{
                                    t(
                                        `admin-buttons-options.${option.button_name}`
                                    )
                                }}</span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from "vue-i18n";
import ChangeLang from "../../../Components/Inputs/language/changeLang.vue";

export default {
    components: {
        ChangeLang,
    },
    data() {
        return {
            dropdownNavbarStates: {},
            isMobileMenuOpen: false,
            isMobile: false,
        };
    },
    props: {
        adminBtn: {
            type: Array,
            required: true,
        },
        Utilizador: {
            type: Object,
            required: true,
        },
    },
    computed: {
        filterButtonsNotDropDown() {
            const DropdownButtons = ["hi-admin", "logout"];
            return this.adminBtn.filter(
                (btn) => !DropdownButtons.includes(btn.button_name)
            );
        },
        filterButtonsDropDownMenuLogged() {
            const DropdownButtons = ["hi-admin", "logout"];
            return this.adminBtn.filter((btn) =>
                DropdownButtons.includes(btn.button_name)
            );
        },
    },
    methods: {
        toggleDropdownNavbar(btnId) {
            this.dropdownNavbarStates[btnId] =
                !this.dropdownNavbarStates[btnId];
        },
        isDropdownNavbarOpen(btnId) {
            return this.dropdownNavbarStates[btnId] === true;
        },
        redirect(route) {
            this.$inertia.visit(route);
            if (this.isMobile) {
                this.isMobileMenuOpen = false;
            }
        },
        toggleMobileMenu() {
            this.isMobileMenuOpen = !this.isMobileMenuOpen;
            // Prevent scrolling when menu is open
            if (this.isMobileMenuOpen) {
                document.body.style.overflow = "hidden";
            } else {
                document.body.style.overflow = "";
            }
        },
        checkScreenSize() {
            this.isMobile = window.innerWidth < 1024;
            if (!this.isMobile) {
                this.isMobileMenuOpen = false;
                document.body.style.overflow = "";
            }
        },
    },
    setup() {
        const { t } = useI18n();
        return { t };
    },
    mounted() {
        this.checkScreenSize();
        window.addEventListener("resize", this.checkScreenSize);
    },
    beforeUnmount() {
        window.removeEventListener("resize", this.checkScreenSize);
        document.body.style.overflow = "";
    },
};
</script>
