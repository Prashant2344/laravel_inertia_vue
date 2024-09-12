import './bootstrap';
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';
import 'admin-lte/dist/js/adminlte.min.js';
// import 'bootstrap/dist/js/bootstrap.bundle.js'; 
// import 'bootstrap/dist/css/bootstrap.min.css';
// import '../../public/assets/js/perfect-scrollbar.jquery.min.js';
// import '../../public/assets/js/waves.js';
// import '../../public/assets/js/sidebarmenu.js';
// import '../../public/assets/js/custom.min.js';
// import '../../public/assets/js/dashboard1.js';
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
