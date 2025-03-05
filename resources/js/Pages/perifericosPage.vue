<template>
    <div class="bg-zinc-100">
        <Navbar />
        <Perifericos :Perifericos="Perifericos" />
    </div>
</template>

<script>
import Navbar from "../Components/navbar.vue";
import Perifericos from "../Components/Categories/perifericosComponent.vue";

export default {
    components: {
        Navbar,
        Perifericos,
    },
    props: {
        Perifericos: {
            type: Array,
            required: true,
        },
    },
};
</script>
