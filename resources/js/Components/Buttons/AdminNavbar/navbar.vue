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
                <div v-for="btn in adminBtn" :key="btn.id" class="relative">
                    <button
                        @click="
                            btn.dropdown
                                ? toggleDropdownNavbar(btn.id)
                                : redirect(btn.route)
                        "
                        class="w-full flex items-center justify-between p-3 text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-300"
                    >
                        <span class="flex items-center gap-2">
                            <i
                                v-if="btn.icon"
                                :class="btn.icon"
                                class="text-lg"
                            ></i>
                            <span>{{ btn.button_name }} </span>
                        </span>
                    </button>

                    <ul
                        v-if="btn.dropdown && isDropdownNavbarOpen(btn.id)"
                        class="ml-4 mt-1 space-y-1 border-l border-gray-200 pl-3"
                    >
                        <li
                            v-for="option in JSON.parse(btn.dropdownOptions)"
                            :key="option.id"
                            @click="redirect(option.route)"
                            class="cursor-pointer text-slate-800 hover:text-blue-600"
                        >
                            {{ option.button_name }}
                        </li>
                    </ul>
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
