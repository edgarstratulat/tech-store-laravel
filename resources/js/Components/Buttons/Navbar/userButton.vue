<template>
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
                v-if="!Utilizador"
                class="cursor-pointer text-slate-800 hover:text-blue-600"
            >
                <button
                    v-for="btn in filterButtonsDropDownMenuNotLogged"
                    :key="btn.id"
                    @click="redirect(btn.route)"
                    class="text-slate-800 hover:text-blue-600 transition duration-300 ml-2"
                >
                    {{ btn.button_name }}
                </button>
            </li>
            <li
                v-if="Utilizador && !isAdmin"
                class="cursor-pointer text-slate-800 p-3 hover:text-blue-600"
            >
                <a>
                    <li
                        class="cursor-pointer text-slate-800 px-2 pt-2 font-bold"
                    >
                        <span class="text-center"
                            >Olá, {{ Utilizador.name }}</span
                        >
                        <hr class="my-2 border-slate-200" />
                    </li>
                </a>
                <button
                    v-for="btn in filterButtonsDropDownMenuLogged"
                    :key="btn.id"
                    @click="redirect(btn.route)"
                    class="text-slate-800 hover:text-blue-600 transition duration-300 ml-2"
                >
                    {{ btn.button_name }}
                </button>
            </li>
            <li v-if="isAdmin">
                <a>
                    <li
                        class="cursor-pointer text-slate-800 px-2 pt-2 font-bold"
                    >
                        <span class="text-center"
                            >Olá, {{ Utilizador.name }}</span
                        >
                        <hr class="my-2 border-slate-200" />
                    </li>
                </a>
                <button
                    v-for="btn in filterButtonsDropDownMenuAdmin"
                    :key="btn.id"
                    @click="redirect(btn.route)"
                    class="text-slate-800 hover:text-blue-600 transition duration-300 ml-2"
                >
                    {{ btn.button_name }}
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isDropdownOpen: false,
        };
    },
    computed: {
        filterButtonsDropDownMenuNotLogged() {
            const DropdownButtons = ["Iniciar Sessão", "Criar Conta"];
            return this.Buttons.filter((btn) =>
                DropdownButtons.includes(btn.button_name)
            );
        },
        filterButtonsDropDownMenuLogged() {
            const DropdownButtons = ["Definições da Conta", "Terminar Sessão"];
            return this.Buttons.filter((btn) =>
                DropdownButtons.includes(btn.button_name)
            );
        },
        filterButtonsDropDownMenuAdmin() {
            const DropdownButtons = [
                "Painel Administrativo",
                "Terminar Sessão",
            ];
            return this.Buttons.filter((btn) =>
                DropdownButtons.includes(btn.button_name)
            );
        },
    },
    methods: {
        toggleDropdown() {
            this.isDropdownOpen = !this.isDropdownOpen;
        },
        redirect(route) {
            this.$inertia.visit(route);
        },
    },
    props: {
        Utilizador: {
            type: Object,
        },
        Buttons: {
            type: Array,
        },
        isAdmin: {
            type: Boolean,
        },
    },
};
</script>
