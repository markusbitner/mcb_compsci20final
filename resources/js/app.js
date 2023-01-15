import { createApp, getCurrentInstance, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import DefaultLayout from "./Shared/DefaultLayout.vue";

import { ZiggyVue } from "ziggy-vue";
import { Ziggy } from "./ziggy";
import '../css/app.css';

InertiaProgress.init({
    color: 'green',
    showSpinner: true,
}
);

createInertiaApp({
    resolve: (name) => {
        const page = resolvePageComponent(
          `./Pages/${name}.vue`,
          import.meta.glob("./Pages/**/*.vue")
        );
        page.then((module) => {
          module.default.layout = module.default.layout || DefaultLayout;
        });
        return page;
      },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component("Link", Link)
            .component("Head", Head)
            .mixin({ methods: { route } })
            .mount(el);
    },

    title: title => "My App - " + title
});