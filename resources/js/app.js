import "./bootstrap";
import "maz-ui/css/main.css";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp, router } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import { i18nVue } from "laravel-vue-i18n";
import PrimeVue from "primevue/config";
import "primevue/resources/themes/aura-light-green/theme.css";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(PrimeVue)
            .use(i18nVue, {
                lang: "pt",
                resolve: (lang) => {
                    const langs = import.meta.glob("../../lang/*.json", {
                        eager: true,
                    });
                    return langs[`../../lang/${lang}.json`].default;
                },
            });

        app.mount(el);

        router.on("before", (event) => {
            const currentLang = localStorage.getItem("currentLang") || "en";
            event.detail.visit.headers["Accept-Language"] = currentLang;
        });
    },

    progress: {
        color: "#4B5563",
    },
});
