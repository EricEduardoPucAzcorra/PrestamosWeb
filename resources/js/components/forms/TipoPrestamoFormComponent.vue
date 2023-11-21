<template>
    <div>

        <div class="d-flex justify-content-center"  v-if="extraData !== null && progress==true" style="width: 100%; height: 390px;">
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration=".5s" aria-label="Custom ProgressSpinner" />
        </div>


        <form class="row g-3" v-if="progress === false || extraData===null">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre del prestamo" v-model="nombre">
            </div>
            <div class="col-md-6">
                <label for="monto" class="form-label">Monto</label>
                <input type="number" class="form-control" id="monto" placeholder="Monto del prestamo 0.0" v-model="monto">
            </div>
            <div class="col-4">
                <label for="plazo" class="form-label">Plazo</label>
                <input type="number" class="form-control" id="plazo" placeholder="Plazo de prestamo" v-model="plazo">
            </div>
            <div class="col-md-4">
                <label for="tiene_garantia" class="form-label">¿Tiene garantía?</label>
                <select id="tiene_garantia" class="form-select" v-model="tiene_garantia">
                    <option value="" selected>Seleciona una opción</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="id_categoria" class="form-label">Categoria</label>
                <select id="id_categoria" class="form-select" v-model="id_categoria">
                    <option value="0" selected>Seleciona una opción</option>
                    <option v-bind:value="categoria.id_categoria_prestamo" v-for="categoria in categoria_prestamos" :key="categoria.id_categoria_prestamo" v-text="categoria.nombre"></option>
                </select>
            </div>
            <!-- <div class="col-12">
                <label for="inputAddress2" class="form-label">Descripción</label>

                <textarea v-model="descripcion" name="descripcion" id="descripcion" cols="30" rows="2" class="form-control" placeholder="Escriba sus observaciones..">

                </textarea>
            </div> -->

            <div class="col-12">
                <label for="inputAddress2" class="form-label">Observaciones</label>

                <textarea v-model="observaciones" name="observaciones" id="observaciones" cols="30" rows="3" class="form-control" placeholder="Escriba sus observaciones..">

                </textarea>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button type="button" class="btn btn-success" v-if="extraData === null" v-on:click="store()">Guardar</button>
                <button type="button" class="btn btn-primary" v-if="extraData !== null" v-on:click="update()">Actualizar</button>
            </div>

        </form>



    </div>
</template>

<script>
    import Button from "primevue/button"
    import axios from 'axios';
    import ProgressSpinner from 'primevue/progressspinner';
    import { useToast } from "vue-toastification";
    const toast = useToast();
    export default {
        props:['extraData'],
        components:{
            "Button":Button,
            "ProgressSpinner":ProgressSpinner
        },
        data(){
            return{
                id:0,
                nombre:"",
                descripcion:"",
                monto:0.0,
                plazo:0,
                tiene_garantia:"",
                id_categoria:0,
                observaciones:"",
                categoria_prestamos:[],
                progress : true
            }
        },
        created(){
            this.getCategoriaPrestamos();
        },
        mounted() {
            setTimeout(() => {
                this.progress = false;
                if(this.extraData){
                    this.setExtraData(this.extraData);
                }else{
                    this.nombre = ""
                    this.monto=0;
                    this.plazo = 0
                    this.tiene_garantia = ""
                    this.observaciones = ""
                }
                console.log('Component mounted.')
            }, 1000);
        },
        methods:{
            setExtraData(extraData){
                if(this.extraData){
                    this.id = extraData.id;
                    this.nombre = extraData.nombre;
                    this.descripcion = extraData.descripcion;
                    this.monto = extraData.monto;
                    this.plazo = extraData.plazo;
                    this.tiene_garantia = extraData.tiene_garantia;
                    this.id_categoria = extraData.id_categoria_prestamo;
                    this.observaciones = extraData.observaciones;
                }
            },
            getCategoriaPrestamos(){
               const url = '/categorias_prestamos';

               axios.get(url).then(response=>{
                   this.categoria_prestamos = response.data;
               }, error=>{
                    console.log(error);
               });
            },
            store(){
                const url = '/new-tipo-prestamo';

                const datos = {
                    nombre: this.nombre,
                    descripcion: this.descripcion,
                    monto: this.monto,
                    plazo: this.plazo,
                    tiene_garantia: this.tiene_garantia,
                    id_categoria_prestamo: this.id_categoria,
                    observaciones : this.observaciones
                };

                axios.post(url, datos).then(response=>{
                    console.log('Creado')
                    this.nombre = "";
                    this.descripcion = "";
                    this.monto = 0;
                    this.plazo = 0;
                    this.tiene_garantia ="";
                    this.id_categoria = 0;
                    this.observaciones = "";
                    //events cerrar modal y refrescar tabla

                    this.$emit('Creando', true);

                    toast.success("Se creó exitosamente", {
                        timeout: 1000
                    });

                }, error=>{
                    console.log(error);
                });

                //console.log(datos);
            },
            update(){
                const url = '/update-tipo-prestamo';

                const datos = {
                    id_tipo_prestamo:this.id,
                    nombre: this.nombre,
                    descripcion: this.descripcion,
                    monto: this.monto,
                    plazo: this.plazo,
                    tiene_garantia: this.tiene_garantia,
                    id_categoria_prestamo: this.id_categoria,
                    observaciones : this.observaciones
                };

                axios.put(url, datos).then(response=>{
                    console.log('Creado')
                    this.nombre = "";
                    this.descripcion = "";
                    this.monto = 0;
                    this.plazo = 0;
                    this.tiene_garantia ="";
                    this.id_categoria = 0;
                    this.id=0;
                    this.observaciones = "";
                    //events cerrar modal y refrescar tabla
                    this.$emit('Creando', true);

                    toast.success("Actualizacion exitosa", {
                        timeout: 1000
                    });

                }, error=>{
                    console.log(error);
                });

                //console.log(datos)
            }

        }
    }
</script>
