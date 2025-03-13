<template>
    <div>
        <label
            for="product"
            class="block mb-2 text-sm font-medium text-gray-700"
            >Qual é o Periferico?</label
        >
        <select
            v-model="form.id"
            class="w-full bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
        >
            <option disabled value="">Selecione o Periferico</option>
            <option v-for="item in Periferico" :key="item.id" :value="item.id">
                {{ item.name }}
            </option>
        </select>

        <label
            v-if="form.id"
            class="block mt-2 text-lg text-center font-medium text-emerald-400"
        >
            Preço atual:
            {{ Periferico.find((item) => item.id === form.id).price }}€
        </label>

        <label
            v-if="form.id"
            class="block text-lg text-center mt-2 text-md font-medium text-red-400"
            >Stock atual:
            {{ Periferico.find((item) => item.id === form.id).stock }}
            Unidades</label
        >

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
                Adicionar Stock
            </label>
            <input
                id="stock"
                type="number"
                v-model="form.stock"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition"
            />
        </div>

        <div v-if="form.price">
            <label
                for="price"
                class="block mt-2 text-lg text-center font-medium text-emerald-400"
            >
                Preço final: {{ form.price }}€
            </label>
        </div>

        <div v-if="form.stock">
            <label
                for="price"
                class="block mt-2 text-lg text-center font-medium text-red-400"
            >
                Stock final: {{ form.stock }} unidades
            </label>
        </div>

        <button
            type="submit"
            v-if="form.id && form.price && form.stock"
            class="mt-5 w-full bg-gray-700 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out"
        >
            Atualizar Periférico
        </button>
    </div>
</template>

<script>
export default {
    props: {
        form: {
            type: Object,
        },
        Periferico: {
            type: Array,
            default: () => [],
        },
    },
};
</script>
