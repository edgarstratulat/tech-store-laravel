import "./bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { createI18n } from "vue-i18n";

import pt from "../js/lang/pt.json";
import en from "../js/lang/en.json";

const i18n = createI18n({
    legacy: false,
    locale: "pt",
    fallbackLocale: "pt",
    messages: {
        pt,
        en,
    },
});

library.add(fas);

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        app.component("fa", FontAwesomeIcon);

        app.use(plugin).use(i18n).mount(el);
    },
});
