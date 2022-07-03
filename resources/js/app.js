import './bootstrap';

console.log(window.innerHeight)
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        const myApp = createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
        myApp.config.globalProperties.$window_height = window.innerHeight - 85;
            myApp.mount(el);
        return myApp
    },
});

InertiaProgress.init({ color: '#4B5563' });
