
<template>
    <div class="card flex justify-content-center">
        <h2 class="text-center mb-3 menu-title">Contenido</h2>
        <PanelMenu :model="items" class="w-full md:w-20rem">
        <template #item="{ item }">
            <router-link v-if="item.route" v-slot="{ href, navigate }" :to="item.route" custom>
            <a v-ripple class="list-group-item list-group-item-action d-flex align-items-center cursor-pointer text-color px-3 py-2" :href="href" @click="navigate">
                <span class="icon-container">
                <span :class="item.icon" />
                </span>
                <span class="text-color"> {{ item.label }}</span>
            </a>
            </router-link>
            <a v-else v-ripple class="list-group-item list-group-item-action d-flex align-items-center cursor-pointer text-color px-3 py-2" :href="item.url" :target="item.target">
            <span class="icon-container">
                <span :class="item.icon" />
            </span>
            <span> {{ item.label }}</span>
            <span v-if="item.items" class="pi pi-angle-down text-primary ml-auto" />
            </a>
        </template>
        </PanelMenu>
    </div>
</template>

<script>
    import PanelMenu from 'primevue/panelmenu';
    export default {
        components:{
            "PanelMenu":PanelMenu
        },
        data(){
            return{
                items:[

                            {
                                label: ' Modúlos',
                                icon: 'pi-arrows-v',
                                items: [

                                {
                                label: ' Dashboard',
                                icon: 'pi pi-palette',
                                url:'/dashboard'
                            },

                            {
                                label: ' Prestamos',
                                icon: 'pi pi-list',
                                items: [
                                    {
                                        label: ' Prestamos',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Tipo de prestamos',
                                        icon: 'pi pi-tag',
                                        url: '/tipos-prestamos'
                                    },
                                    {
                                        label: ' Categorias prestamos',
                                        icon: 'pi pi-tag',
                                        url: '/categorias-prestamos'
                                    }
                                ]
                            },
                            {
                                label: ' Pagos',
                                icon: 'pi pi-link ',
                                items: [
                                    {
                                        label: ' Todos los pagos',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Pago de hoy',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Pagos atrasados',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    }
                                ]
                            },
                            {
                                label: ' Clientes',
                                icon: 'pi pi-star',
                                items: [
                                    {
                                        label: ' clientes',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Avales',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    }
                                ]
                            },
                            {
                                label: ' Documentos',
                                icon: 'pi pi-file',
                                items: [
                                    {
                                        label: ' Documentos clientes',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Reportes',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Comporbantes pagos',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Comporbantes garantias',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    }
                                ]
                            },

                            {
                                label: ' Garantias',
                                icon: 'pi pi-car',
                                items: [
                                    {
                                        label: ' Garantias clientes',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Tipos garantias',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    }
                                ]
                            },
                            {
                                label: ' Usuarios',
                                icon: 'pi pi-users',
                                items: [
                                    {
                                        label: ' Usuarios',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Roles',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    }
                                ]
                            },
                            {
                                label: ' Estadisticas',
                                icon: 'pi pi-chart-bar',
                                items: [
                                    {
                                        label: 'Prestamos del mes',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Esquema de pagos',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    },
                                    {
                                        label: ' Ganancias',
                                        icon: 'pi pi-tag',
                                        url: '/#'
                                    }
                                ]
                            },

                        ]
                    },


                    // {
                    //     label: 'Programmatic',
                    //     icon: 'pi pi-link',

                    // },
                ],
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
a{
    text-decoration: none;
    cursor: pointer;
}
.card {
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}

.list-group-item {
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.125);
}

.list-group-item:hover {
  background-color: #f8f9fa;
}
.menu-title {
  font-size: 1.25rem;
  margin-bottom: 1rem;
  color: #007bff; /* Color azul de Bootstrap */
  margin-top: 5px;
  font-weight: bold;
}
.icon-container {
    margin-right: 0.5rem; /* Ajusta el espacio entre el icono y el texto según sea necesario */
}
</style>
