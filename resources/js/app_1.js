import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.js'; 

import '../../public/assets/js/perfect-scrollbar.jquery.min.js';
import '../../public/assets/js/waves.js';
import '../../public/assets/js/sidebarmenu.js';
import '../../public/assets/js/custom.min.js';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
