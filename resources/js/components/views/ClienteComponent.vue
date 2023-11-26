<template>

    <div v-if="ver">
        <div class="card-header d-flex justify-content-between align-items-center text-white" style="background: rgb(255, 132, 0)">
            <h5 class="card-title mb-0">Clientes</h5>
            <div class="btn-group  btn-group-sm">
                <button class="btn btn-secondary" style="margin-left: 2px;" title="Refrescar" v-on:click="refresh()"><i class="fa-solid fa-rotate-left" style="color: white"></i></button>
                <!-- <button class="btn btn-info" style="margin-left: 2px;" title="Filtro" v-on:click="OpenFilter('Filtro Tipo De Prestamos')"><i class="fa-solid fa-magnifying-glass" style="color: white"></i></button> -->
                <button class="btn btn-success" style="margin-left: 2px" title="Nuevo" v-if="nuevo" v-on:click="OpenModal('Agregar nuevo cliente')"><i class="fa-solid fa-plus" style="color: white"></i></button>
                <button class="btn btn-primary" style="margin-left: 2px" title="Editar" v-if="editar" v-on:click="EditarModal('Actualizar cliente')"><i class="fa-solid fa-pen-to-square" style="color: white"></i></button>
                <button class="btn btn-warning" style="margin-left: 2px" title="Detalles" v-if="detalle"><i class="fa-solid fa-circle-info" style="color: white"></i></button>
            </div>
        </div>

        <div class="card-body">
            <table-component :name = " 'Lista de clientes' " :colums ="colums" :data="datos" @row="obtenerRow($event)"></table-component>
             <modal-component v-if="modal === true" :condicion = "modal" :accione="accion" @close-modal="closeModal($event)">
                <ClienteFormComponentVue :extraData = "data_selecion" @Creando = "CreadoRegistro($event)"></ClienteFormComponentVue>
            </modal-component>

            <!-- <filter-component v-if="filter === true" :condicion = "filter" :accione="accion" @close-modal="closeModalFilter($event)">
                <filterTipoPrestamoComponent @busqueda = "obtenerDatos($event)"></filterTipoPrestamoComponent>
            </filter-component>  -->


        </div>
    </div>

</template>

<script>
    import ClienteFormComponentVue from '../forms/ClienteFormComponent.vue';
    // import filterTipoPrestamoComponent from '../forms/filterTipoPrestamoComponent.vue';
    import axios from 'axios';
    import { useToast } from "vue-toastification";
    const toast = useToast();
    export default {
        props:[
            "colums",
            "permisos"
        ],
        components:{
            "ClienteFormComponentVue":ClienteFormComponentVue,
            // "filterTipoPrestamoComponent":filterTipoPrestamoComponent
        },
        data(){
            return{
                modal:false,
                accion:"",
                filter:false,
                data_selecion:null,
                datos:[],
                permissions:[],
                //acciones
                ver:false,
                nuevo:false,
                editar:false,
                detalle:false
            }
        },
        created() {
            this.getDatos();
            this.permissions = this.permisos[0].permisos;

            console.log(this.permissions)

            const permisos = this.permissions.map(item => item.permiso.siglas);
            this.ver = permisos.some(sigla=>sigla === 'administracion.usuarios.nuevo');
            this.nuevo = permisos.some(sigla => sigla === 'administracion.usuarios.nuevo');
            this.editar = permisos.some(sigla => sigla === 'administracion.clientes.editar');
            this.detalle = permisos.some(sigla => sigla === 'administracion.clientes.detalle');

            console.log('tipo_prestamos.')
        },
        methods:{
            getDatos(){
                const url = '/listclientes';
                axios.get(url).then(response=>{
                    this.datos = response.data;
                   // console.log(this.datos);
                }, error=>{
                    console.log(error);
                });
            },
            obtenerRow(data){
               if(data){
                    this.data_selecion = data;
               }else{
                    this.data_selecion = null;
               }
            },
            OpenModal(accion){
                //console.log(accion)
                this.accion  = accion;
                this.modal = true;
                this.data_selecion = null;
            },
            EditarModal(accion){
                if(this.data_selecion !== null){
                    //enviar extraData
                    this.accion  = accion;
                    this.modal = true;
                }else{
                    this.accion = "";
                    this.modal = false;
                    toast.warning("Seleccione un registro!", {
                        timeout: 1000
                    });
                }
            },
            closeModal(event){
                if(event === false){
                    this.modal = event;
                    //this.data_selecion = null;
                    //console.log(this.modal)
                }
            },
            CreadoRegistro(event){
                //console.log(event)
                if(event){
                    this.getDatos();
                    this.modal = false;
                }
            },
            OpenFilter(accion){
                this.accion  = accion;
                this.filter = true;
                this.getDatos();
            },
            closeModalFilter(event){
                this.accion = "";
                this.filter = event;
            },
            obtenerDatos(event){
                // console.log(event)
                if(event !== null){
                    this.accion = ""
                    this.filter = false;
                    let filtro;

                    if(event.monto !== 0){
                        // filtro = this.datos.filter(tipo_prestamo =>
                        //     tipo_prestamo.monto === event.monto && tipo_prestamo.tiene_garantia === event.tiene_garantia && tipo_prestamo.id_categoria_prestamo === event.id_categoria_prestamo
                        // );
                        filtro = this.datos.filter(tipo_prestamo =>
                            tipo_prestamo.monto === event.monto
                        );
                    }
                    if(event.tiene_garantia !== ""){
                        filtro = this.datos.filter(tipo_prestamo =>
                            tipo_prestamo.tiene_garantia === event.tiene_garantia
                        );
                    }
                    if(event.id_categoria_prestamo !== 0){
                        filtro = this.datos.filter(tipo_prestamo =>
                            tipo_prestamo.id_categoria_prestamo === event.id_categoria_prestamo
                        );
                    }

                    if(event.monto !== 0 && event.tiene_garantia !== "" && event.id_categoria_prestamo !== 0){
                        filtro = this.datos.filter(tipo_prestamo =>
                            tipo_prestamo.monto === event.monto && tipo_prestamo.tiene_garantia === event.tiene_garantia && tipo_prestamo.id_categoria_prestamo === event.id_categoria_prestamo
                        );
                    }

                    if(event.monto === 0 && event.tiene_garantia === "" && event.id_categoria_prestamo ===0){
                        //nada
                        filtro = this.datos;
                    }

                    this.datos = filtro;
                }
            },
            refresh(){
                this.getDatos();
                toast.success("Informacion actualizada", {
                        timeout: 1000
                });
            }
        }
    }
</script>
