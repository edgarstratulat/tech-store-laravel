<template>
    <div class="hidden md:block mt-3">
        <div class="relative">
            <input
                type="text"
                name="search"
                placeholder="Pesquisar produtos..."
                class="w-64 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
            />
            <button
                type="submit"
                class="absolute inset-y-0 right-0 pr-3 flex items-center"
            >
                <svg
                    class="w-5 h-5 text-gray-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                    />
                </svg>
            </button>
        </div>
    </div>
</template>

<script>
export default {};
</script>
