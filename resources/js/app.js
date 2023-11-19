import './bootstrap';
import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/lara-light-teal/theme.css'
//componentes primevue

const app = createApp({});

app.use(PrimeVue);

import ExampleComponent from './components/ExampleComponent.vue';
import TableComponent from './components/componentes/TableComponent.vue'
app.component('example-component', ExampleComponent);
app.component('table-component', TableComponent);


app.mount('#app');
