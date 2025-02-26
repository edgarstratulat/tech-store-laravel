<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    name: null,
    price: null,
    desc: null,
});

function submit() {
    router.post("/produto/adicionar", form);
}
</script>

<template>
    <form @submit.prevent="submit">
        <label for="name">Nome do produto:</label>
        <input id="first_name" v-model="form.name" />
        <label for="last_name">Preço:</label>
        <input id="last_name" v-model="form.price" />
        <label for="email">Descrição:</label>
        <input id="email" v-model="form.desc" />
        <button type="submit">Submit</button>
    </form>
</template>
