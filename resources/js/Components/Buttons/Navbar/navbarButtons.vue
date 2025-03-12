<template>
    <div class="hidden md:flex md:items-center md:space-x-6 ml-8">
        <div v-for="btn in filterButtonsNavBar" :key="btn.id">
            <button
                @click="
                    btn.dropdown
                        ? toggleDropdownNavbar(btn.id)
                        : redirect(btn.route)
                "
                class="text-gray-500 hover:text-blue-600 transition duration-300"
            >
                {{ btn.button_name }}
            </button>

            <ul
                class="absolute p-5 z-10 mt-2 w-52 rounded-lg border border-slate-200 bg-white shadow-lg text-center text-md"
                v-if="btn.dropdown && isDropdownNavbarOpen(btn.id)"
            >
                <li
                    class="cursor-pointer text-slate-800 hover:text-blue-600"
                    v-for="option in JSON.parse(btn.dropdownOptions)"
                    :key="option.id"
                    @click="redirect(option.route)"
                >
                    {{ option.button_name }}
                </li>
            </ul>
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
