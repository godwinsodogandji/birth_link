import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';


createInertiaApp({
  resolve: name => import(`./Pages/${name}`), // Chargement des pages via import dynamique
  setup({ el, App, props }) {
    createApp({ render: () => h(App, props) }).mount(el);
  },
});
