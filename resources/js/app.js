import '../css/app.css';
import './bootstrap';
import '@fortawesome/fontawesome-free/css/all.css';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import lottie from 'lottie-web';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { InertiaProgress } from '@inertiajs/progress';
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

document.addEventListener("DOMContentLoaded", function () {
    // Initialisation de l'animation Lottie
    lottie.loadAnimation({
        container: document.getElementById('lottieAnimation'),
        path: '/animations/Animation - 1731172579189.json',
        renderer: 'svg',
        loop: true,
        autoplay: true,
    });
});

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
InertiaProgress.init();
