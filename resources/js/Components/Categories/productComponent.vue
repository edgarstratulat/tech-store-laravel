<template>
    <div class="mt-8 flex justify-center items-center ml-5">
        <div class="w-full max-w-6xl max-h-6xl mx-auto">
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <li
                    v-for="promo in products"
                    :key="promo.id"
                    class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col p-6"
                >
                    <!-- Product Image -->
                    <div class="mb-4">
                        <a
                            :href="`/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`"
                        >
                            <div>
                                <div
                                    v-if="promo.reconditioned == true"
                                    class="z-10 text-sm font-bold text-purple-500 m-0"
                                >
                                    <h1>{{ t("product-reconditioned") }}</h1>
                                </div>
                                <img
                                    :src="`/storage/${promo.image_path}`"
                                    :alt="promo.name"
                                    class="w-full h-56 object-contain rounded-lg transition delay-50 hover:scale-105"
                                />
                            </div>
                        </a>
                        <div
                            v-if="promo.sale_price > 0"
                            class="text-right text-sm font-semibold text-red-500 lg:text-lg"
                        >
                            -{{ promo.sale_price }}%
                        </div>

                        <div v-else class="invisible">
                            {{ promo.sale_price }}
                        </div>
                    </div>

                    <div class="flex-grow">
                        <h2 class="text-[0.70rem] mb-2 text-gray-400">
                            {{ showCategories(promo.category_id) }}

                            <a
                                :href="`/${promo.category.slug}/${promo.subcategory.slug}`"
                                class="cursor-pointer hover:text-gray-500"
                            >
                                {{ showSubcategories(promo.subcategory_id) }}</a
                            >
                        </h2>
                    </div>

                    <!-- Product Details -->
                    <div class="flex-grow">
                        <a
                            :href="`/${promo.category.slug}/${promo.subcategory.slug}/${promo.slug}`"
                        >
                            <h2
                                class="line-clamp-2 text-sm font-semibold mb-2 hover:text-blue-600"
                            >
                                {{ promo.name }}
                            </h2>
                        </a>
                    </div>

                    <div class="flex-grow">
                        <h2
                            class="line-clamp-2 text-xs max-w-100 text-neutral-500"
                        >
                            {{ promo.description }}
                        </h2>
                    </div>

                    <!-- Price and Button -->
                    <div class="mt-4 flex gap-5 items-center">
                        <span
                            class="text-2xl mb-1 font-bold text-blue-600"
                            v-if="promo.sale_price <= 0"
                        >
                            {{ promo.price }}€
                        </span>
                        <span
                            class="text-2xl mb-1 font-bold text-red-600"
                            v-else
                        >
                            {{ Desconto(promo) }}€
                            <span
                                class="text-sm mb-1 text-neutral-400 line-through"
                            >
                                {{ promo.price }}€
                            </span>
                        </span>
                    </div>
                    <div class="flex gap-4 items-center">
                        <span
                            class="text-md mb-1 font-bold text-red-600"
                            v-if="promo.stock <= 0"
                        >
                            <p>
                                <fa
                                    icon="fa-solid fa-xmark"
                                    class="text-red-600 mr-1"
                                ></fa>
                                {{ t("product-nostock") }}
                            </p>
                        </span>
                        <span
                            class="text-md mb-1 font-bold text-yellow-600"
                            v-else-if="promo.stock <= 10"
                        >
                            <p>
                                <fa
                                    icon="fa-solid fa-check"
                                    class="text-yellow-600 mr-1"
                                ></fa>
                                {{ t("product-few-units") }}
                            </p>
                        </span>
                        <span
                            class="text-md mb-1 font-bold text-emerald-400"
                            v-else
                        >
                            <p>
                                <fa
                                    icon="fa-solid fa-check"
                                    class="text-emerald-400 mr-1"
                                ></fa>
                                {{ t("product-stock") }}
                            </p>
                        </span>
                    </div>

                    <div class="flex items-center gap-2">
                        <button
                            class="bg-neutral-800 text-white px-4 py-2 hover:bg-blue-600 transition-colors duration-300 w-5/6"
                        >
                            {{ t("product-add") }}
                        </button>
                        <button
                            class="bg-neutral-400 text-white px-4 py-2 hover:bg-blue-700 transition-colors duration-300"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                class="w-6 h-6"
                                fill="white"
                            >
                                <path
                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
                                />
                            </svg>
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { useI18n } from "vue-i18n";

export default {
    props: {
        products: {
            type: Array,
            required: true,
        },
        category: {
            type: Array,
            required: true,
        },
        subcategory: {
            type: Array,
            required: true,
        },
        manufacturer: {
            type: Array,
            required: true,
        },
    },
    methods: {
        Desconto(promo) {
            const Discount = promo.price * (promo.sale_price / 100);

            const FinalDiscount = promo.price - Discount;

            return FinalDiscount.toFixed(2);
        },
        showCategories(category_id) {
            const category = this.category.find(
                (cate) => cate.id === category_id
            );

            return this.t(`category.${category.name}`);
        },

        showSubcategories(subcategory_id) {
            const subcategory = this.subcategory.find(
                (subcate) => subcate.id === subcategory_id
            );

            return this.t(`subcategory.${subcategory.name}`);
        },
    },
    setup() {
        const { t } = useI18n();
        return { t };
    },
};
</script>
