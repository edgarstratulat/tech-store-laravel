<template>
    <div
        class="hs-overlay [--auto-close:lg] lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 w-64 hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform h-full hidden fixed top-0 start-0 bottom-0 z-60 bg-white shadow-lg border-e border-gray-200"
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
            <nav
                class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300"
            >
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

                            <span>{{ btn.button_name }} </span>
                        </span>
                    </button>

                    <ul
                        v-if="btn.dropdown && isDropdownNavbarOpen(btn.id)"
                        class="ml-4 mt-1 space-y-1 border-l border-gray-200 pl-3"
                    >
                        <li
                            class="cursor-pointer text-slate-800 hover:text-blue-600"
                            v-for="option in JSON.parse(btn.dropdownOptions)"
                            :key="option.id"
                            @click="redirect(option.route)"
                        >
                            <span class="flex items-center gap-2">
                                <fa
                                    v-if="option.icon"
                                    :icon="option.icon"
                                    class="text-lg"
                                ></fa>
                                <span>{{ option.button_name }} </span>
                            </span>
                        </li>
                    </ul>
                </div>

                <div
                    class="absolute bottom-0 left-0 my-10 w-full bg-gray-100 p-2 shadow-sm"
                >
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

                                <span
                                    >{{ btn.button_name }},
                                    {{ Utilizador.name }}
                                </span>
                            </span>
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
                                <span class="flex items-center gap-2">
                                    <fa
                                        v-if="option.icon"
                                        :icon="option.icon"
                                        class="text-lg"
                                    ></fa>
                                    <span>{{ option.button_name }} </span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
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
        Utilizador: {
            type: Object,
            required: true,
        },
    },
    computed: {
        filterButtonsNotDropDown() {
            const DropdownButtons = ["Olá", "Terminar Sessão"];
            return this.adminBtn.filter(
                (btn) => !DropdownButtons.includes(btn.button_name)
            );
        },
        filterButtonsDropDownMenuLogged() {
            const DropdownButtons = ["Olá", "Terminar Sessão"];
            return this.adminBtn.filter((btn) =>
                DropdownButtons.includes(btn.button_name)
            );
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
