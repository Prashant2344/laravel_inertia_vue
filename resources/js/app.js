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
    const pages = import.meta.glob('./modules/**/*.vue', { eager: true })
    return pages[`./modules/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})

// createInertiaApp({
//   resolve: name => {
//     // Import from multiple directories
//     const modules = import.meta.glob('./modules/**/*.vue', { eager: true });
//     const layouts = import.meta.glob('./layouts/**/*.vue', { eager: true });
    
//     // Combine results into a single object
//     const pages = { ...modules, ...layouts };
    
//     // Resolve the component based on the name
//     return pages[`./modules/${name}.vue`] || pages[`./layouts/${name}.vue`];
//   },
//   setup({ el, App, props, plugin }) {
//     createApp({ render: () => h(App, props) })
//       .use(plugin)
//       .mount(el);
//   },
// });
