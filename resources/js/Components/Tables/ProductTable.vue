<template>
    <div>
        <!-- Products Table -->
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-white uppercase bg-blue-500">
                <tr>
                    <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
                        {{ t("view-products-table-name") }}
                    </th>
                    <th
                        scope="col"
                        class="px-4 py-3 sm:px-6 sm:py-3 sm:table-cell"
                    >
                        {{ t("view-products-table-price") }}
                    </th>
                    <th
                        scope="col"
                        class="px-4 py-3 sm:px-6 sm:py-3 hidden md:table-cell"
                    >
                        {{ t("view-products-table-description") }}
                    </th>
                    <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
                        {{ t("view-products-table-category") }}
                    </th>
                    <th
                        scope="col"
                        class="px-4 py-3 sm:px-6 sm:py-3 hidden lg:table-cell"
                    >
                        {{ t("view-products-table-subcategory") }}
                    </th>
                    <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
                        {{ t("view-products-table-stock") }}
                    </th>
                    <th scope="col" class="px-4 py-3 sm:px-6 sm:py-3">
                        {{ t("view-products-table-actions") }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="product in products.data"
                    :key="product.id"
                    class="bg-white border-b hover:bg-gray-50"
                >
                    <td
                        class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap"
                    >
                        {{ product.name }}
                    </td>
                    <td class="px-4 py-4 sm:table-cell">
                        {{ product.price }}€
                    </td>
                    <td
                        class="px-4 py-4 hidden md:table-cell truncate max-w-[150px]"
                    >
                        {{ product.description }}
                    </td>
                    <td class="px-4 py-4">
                        {{ showCategories(product.category_id) }}
                    </td>
                    <td class="px-4 py-4 hidden lg:table-cell">
                        {{ showSubcategories(product.subcategory_id) }}
                    </td>
                    <td
                        v-if="product.stock <= 0"
                        class="px-4 py-4 text-red-600"
                    >
                        {{ product.stock }}
                    </td>
                    <td
                        v-else-if="product.stock <= 10"
                        class="px-4 py-4 text-yellow-400"
                    >
                        {{ product.stock }}
                    </td>
                    <td v-else class="px-4 py-4 text-emerald-500">
                        {{ product.stock }}
                    </td>
                    <td class="px-4 py-4 space-x-2 whitespace-nowrap">
                        <button
                            @click="openUpdateModal(product)"
                            class="bg-emerald-500 hover:bg-emerald-600 text-white p-2 rounded-lg text-sm"
                        >
                            <span class="hidden sm:inline">{{
                                t("view-products-table-update")
                            }}</span>
                            <svg
                                class="w-5 h-5 sm:hidden"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                />
                            </svg>
                        </button>
                        <button
                            @click="openDeleteModal(product)"
                            class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg text-sm"
                        >
                            <span class="hidden sm:inline">{{
                                t("view-products-table-delete")
                            }}</span>
                            <svg
                                class="w-5 h-5 sm:hidden"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                />
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div
            v-if="isModalOpen"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
        >
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ t("update-product") }}
                        </h3>
                        <button
                            @click="closeModal"
                            class="text-gray-500 hover:text-gray-700"
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
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>

                    <form @submit.prevent="updateProduct" class="space-y-4">
                        <input type="hidden" v-model="selectedProduct.id" />

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                {{ t("update-name") }}
                            </label>
                            <input
                                v-model="selectedProduct.name"
                                type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            />
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                {{ t("update-price") }}
                            </label>
                            <input
                                v-model="selectedProduct.price"
                                type="number"
                                step="0.01"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            />
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                {{ t("update-description") }}
                            </label>
                            <textarea
                                v-model="selectedProduct.description"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                rows="3"
                            ></textarea>
                        </div>

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                {{ t("update-stock") }}
                            </label>
                            <input
                                v-model="selectedProduct.stock"
                                type="number"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required
                            />
                        </div>

                        <div class="flex justify-end space-x-3 pt-4">
                            <button
                                type="button"
                                @click="closeModal"
                                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50"
                            >
                                {{ t("update-cancel") }}
                            </button>
                            <button
                                type="submit"
                                class="px-4 py-2 bg-blue-600 rounded-md text-sm font-medium text-white hover:bg-blue-700"
                            >
                                {{ t("update-update") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div
            v-if="isDeleteOpen"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
        >
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ t("delete-product") }}
                        </h3>
                        <button
                            @click="closeDeleteModal"
                            class="text-gray-500 hover:text-gray-700"
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
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>

                    <form @submit.prevent="deleteProduct" class="space-y-4">
                        <input type="hidden" v-model="selectedProduct.id" />

                        <div>
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                {{ t("update-name") }}
                            </label>
                            <input
                                v-model="selectedProduct.name"
                                type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                disabled
                            />
                        </div>

                        <div class="flex justify-end space-x-3 pt-4">
                            <button
                                type="button"
                                @click="closeDeleteModal"
                                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50"
                            >
                                {{ t("update-cancel") }}
                            </button>
                            <button
                                type="submit"
                                class="px-4 py-2 bg-blue-600 rounded-md text-sm font-medium text-white hover:bg-blue-700"
                            >
                                {{ t("delete-delete") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useI18n } from "vue-i18n";
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

export default {
    props: {
        products: {
            type: [Array, Object],
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
    },
    setup(props) {
        const { t } = useI18n();

        const isModalOpen = ref(false);
        const isDeleteOpen = ref(false);

        const selectedProduct = ref({
            id: null,
            name: "",
            price: "",
            description: "",
            stock: "",
        });

        const openUpdateModal = (product) => {
            selectedProduct.value = { ...product };
            isModalOpen.value = true;
        };

        const openDeleteModal = (product) => {
            selectedProduct.value = { ...product };
            isDeleteOpen.value = true;
        };

        const closeDeleteModal = () => {
            isDeleteOpen.value = false;
        };

        const closeModal = () => {
            isModalOpen.value = false;
        };

        const updateProduct = () => {
            router.put(`/dashboard/produtos/atualizar`, selectedProduct.value);
            closeModal();
        };

        const deleteProduct = () => {
            router.delete(
                `/dashboard/produtos/eliminar/${selectedProduct.value.id}`
            );
            closeDeleteModal();
        };

        const showCategories = (category_id) => {
            const category = props.category.find(
                (cate) => cate.id === category_id
            );
            return category?.name || "";
        };

        const showSubcategories = (subcategory_id) => {
            const subcategory = props.subcategory.find(
                (subcate) => subcate.id === subcategory_id
            );
            return subcategory?.name || "";
        };

        return {
            t,
            isModalOpen,
            isDeleteOpen,
            selectedProduct,
            openUpdateModal,
            openDeleteModal,
            closeDeleteModal,
            closeModal,
            updateProduct,
            deleteProduct,
            showCategories,
            showSubcategories,
        };
    },
};
</script>
