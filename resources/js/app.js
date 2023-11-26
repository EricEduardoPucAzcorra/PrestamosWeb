import './bootstrap';
import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/lara-light-teal/theme.css'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import 'primeicons/primeicons.css'

//componentes primevue

const app = createApp({});

app.use(PrimeVue);

const options = {
    // You can set your default options here
};

app.use(Toast, options);

//componentes
import ExampleComponent from './components/ExampleComponent.vue';
import TableComponent from './components/componentes/TableComponent.vue'
import Button from './components/componentes/ButtonComponente.vue';
import ModalComponent from './components/componentes/ModalComponent.vue';
import ModalFilterComponent from './components/componentes/ModalFilterComponent.vue';
import DetailsModalComponent from './components/componentes/DetailsModalComponent.vue';
import MenuComponent from './components/componentes/MenuComponent.vue';
import MenuSuperiorComponent from './components/componentes/MenuSuperiorComponent.vue'
//views
import TipoPrestamoComponent from './components/views/TipoPrestamoComponent.vue';
import ClienteComponent from './components/views/ClienteComponent.vue';
//componentes
app.component('example-component', ExampleComponent);
app.component('table-component', TableComponent);
app.component('button-component', Button);
app.component('modal-component',ModalComponent);
app.component('filter-component', ModalFilterComponent);
app.component('details-component', DetailsModalComponent);
app.component('menu-component', MenuComponent);
app.component('menu-superior-component', MenuSuperiorComponent)

//views
app.component('tipo-prestamos', TipoPrestamoComponent);
app.component('clientes',ClienteComponent);

app.mount('#app');
