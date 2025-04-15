<template>
    <div class="locale-changer">
        <select
            v-model="$i18n.locale"
            class="p-2 rounded-md border border-gray-300 bg-white text-gray-700 shadow-sm hover:bg-gray-50 cursor-pointer"
        >
            <option
                v-for="locale in $i18n.availableLocales"
                :key="`locale-${locale}`"
                :value="locale"
            >
                {{ locale }}
            </option>
        </select>
    </div>
</template>
