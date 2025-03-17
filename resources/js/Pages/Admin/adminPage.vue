<template>
    <!-- Navigation Toggle -->
    <div class="lg:hidden py-16 text-center">
        <button
            type="button"
            class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-start bg-gray-800 border border-gray-800 text-white text-sm font-medium rounded-lg shadow-2xs align-middle hover:bg-gray-950 focus:outline-hidden focus:bg-gray-900"
            aria-haspopup="dialog"
            aria-expanded="false"
            aria-controls="hs-sidebar-collapsible-group"
            aria-label="Toggle navigation"
            data-hs-overlay="#hs-sidebar-collapsible-group"
        >
            Open
        </button>
    </div>
    <!-- End Navigation Toggle -->

    <!-- Sidebar -->
    <div
        id="hs-sidebar-collapsible-group"
        class="hs-overlay [--auto-close:lg] lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 w-64 hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform h-full hidden fixed top-0 start-0 bottom-0 z-60 bg-white border-e border-gray-200"
        role="dialog"
        tabindex="-1"
        aria-label="Sidebar"
    >
        <div class="relative flex flex-col h-full max-h-full">
            <!-- Header -->
            <header class="p-4 flex justify-between items-center gap-x-2">
                <a
                    class="flex-none font-semibold text-xl text-blue-600 focus:outline-hidden focus:opacity-80"
                    href="/"
                    aria-label="Brand"
                    >MaRca</a
                >

                <div class="lg:hidden -me-2">
                    <!-- Close Button -->
                    <button
                        type="button"
                        class="flex justify-center items-center gap-x-3 size-6 bg-white border border-gray-200 text-sm text-gray-600 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100"
                        data-hs-overlay="#hs-sidebar-collapsible-group"
                    >
                        <svg
                            class="shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                    <!-- End Close Button -->
                </div>
            </header>
            <!-- End Header -->

            <!-- Body -->
            <nav
                class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300"
            >
                <button
                    v-for="btn in adminBtn"
                    :key="btn.id"
                    @click="redirect(btn.route)"
                    class="text-slate-800 hover:text-blue-600 transition duration-300 ml-2"
                >
                    {{ btn.button_name }}
                </button>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        adminBtn: {
            type: Array,
            required: true,
        },
    },
};
</script>
