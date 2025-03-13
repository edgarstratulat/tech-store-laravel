<template>
    <div>
        <label
            for="product"
            class="block mb-2 text-sm font-medium text-gray-700"
            >Qual é o Componente?</label
        >
        <select
            v-model="form.id"
            class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
        >
            <option disabled value="">Selecione o Componente</option>
            <option
                v-for="item in ComponentePC"
                :key="item.id"
                :value="item.id"
            >
                {{ item.name }}
            </option>
        </select>

        <div v-if="form.id" class="mt-5">
            <label
                for="price"
                class="block mb-2 text-sm font-medium text-gray-700"
            >
                Novo Preço:
            </label>
            <input
                id="price"
                v-model="form.price"
                type="number"
                step="0.01"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
            />
        </div>
        <div v-if="form.id" class="mt-5">
            <label
                for="stock"
                class="block mb-2 text-sm font-medium text-gray-700"
            >
                Qual é o stock neste momento?
            </label>
            <input
                id="stock"
                type="number"
                v-model="form.stock"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
            />
        </div>

        <button
            type="submit"
            v-if="form.id && form.price && form.stock"
            class="mt-5 w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
        >
            Atualizar Componente
        </button>
    </div>
</template>

<script>
export default {
    props: {
        form: {
            type: Object,
        },
        ComponentePC: {
            type: Array,
            default: () => [],
        },
    },
};
</script>
