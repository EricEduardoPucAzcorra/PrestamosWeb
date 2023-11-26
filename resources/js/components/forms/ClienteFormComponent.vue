<template>
    <div>

        <div class="d-flex justify-content-center"  v-if="extraData !== null && progress==true" style="width: 100%; height: 390px;">
            <ProgressSpinner style="width: 50px; height: 50px" strokeWidth="8" fill="var(--surface-ground)"
                animationDuration=".5s" aria-label="Custom ProgressSpinner" />
        </div>

        <form class="row g-3" v-if="progress === false || extraData===null">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" v-model="nombre">
            </div>
            <div class="col-md-6">
                <label for="nombre" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="nombre" placeholder="Apellido paterno" v-model="apellido_p">
            </div>
            <div class="col-md-6">
                <label for="nombre" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="nombre" placeholder="Apellido materno" v-model="apellido_m">
            </div>
            <div class="col-md-6">
                <label for="nombre" class="form-label">Domicilio</label>
                <input type="text" class="form-control" id="nombre" placeholder="Domicilio" v-model="domicilio">
            </div>
            <div class="col-md-6">
                <label for="nombre" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="nombre" placeholder="Telefono" maxlength="10" v-model="telefono">
            </div>
            <div class="col-md-6">
                <label for="nombre" class="form-label">Celular</label>
                <input type="text" class="form-control" id="nombre" placeholder="Celular" maxlength="10" v-model="celular">
            </div>
            <div class="col-md-6">
                <label for="nombre" class="form-label">Referencia</label>
                <input type="text" class="form-control" id="nombre" placeholder="Referencia" v-model="referencia">
            </div>

            <div class="col-md-6">
                <label for="nombre" class="form-label">RFC</label>
                <input type="text" class="form-control" id="nombre" placeholder="RFC" v-model="rfc">
            </div>

            <div class="col-md-6">
                <label for="nombre" class="form-label">Ine</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ine" v-model="ine">
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
                apellido_p:"",
                apellido_m:"",
                rfc:"",
                ine:"",
                domicilio:"",
                telefono:"",
                celular:"",
                referencia:"",
                progress : true
            }
        },
        created(){
            // this.getCategoriaPrestamos();
        },
        mounted() {
            setTimeout(() => {
                this.progress = false;
                if(this.extraData){
                    this.setExtraData(this.extraData);
                }else{
                    this.nombre = ""
                    this.apellido_p=""
                    this.apellido_m =""
                    this.rfc=""
                    this.ine=""
                    this.domicilio=""
                    this.telefono=""
                    this.celular=""
                    this.referencia=""
                    this.id = 0
                }
                console.log('Component mounted.')
            }, 1000);
        },
        methods:{
            setExtraData(extraData){
                if(extraData){
                    this.id = extraData.id;
                    this.nombre = extraData.nombre;
                    this.apellido_p = extraData.apellido_p;
                    this.apellido_m = extraData.apellido_m;
                    this.rfc = extraData.rfc;
                    this.ine = extraData.clave_ine;
                    this.domicilio = extraData.domicilio;
                    this.telefono = extraData.telefono;
                    this.celular = extraData.celular;
                    this.referencia = extraData.referencia;
                    //console.log(extraData)
                }
            },
            // getCategoriaPrestamos(){
            //    const url = '/categorias_prestamos';

            //    axios.get(url).then(response=>{
            //        this.categoria_prestamos = response.data;
            //    }, error=>{
            //         console.log(error);
            //    });
            // },
            store(){
                const url = '/new-persona';

                const datos = {
                    nombre: this.nombre,
                    apellido_p: this.apellido_p,
                    apellido_m: this.apellido_m,
                    rfc: this.rfc,
                    ine: this.ine,
                    domicilio: this.domicilio,
                    telefono : this.telefono,
                    celular: this.celular,
                    referencia: this.referencia
                };

                axios.post(url, datos).then(response=>{
                    console.log('Creado')
                    this.nombre = ""
                    this.apellido_p=""
                    this.apellido_m =""
                    this.rfc=""
                    this.ine=""
                    this.domicilio=""
                    this.telefono=""
                    this.celular=""
                    this.referencia=""
                    this.id = 0
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
                const url = '/update-persona';

                const datos = {
                    id_persona:this.id,
                    nombre: this.nombre,
                    apellido_p: this.apellido_p,
                    apellido_m: this.apellido_m,
                    rfc: this.rfc,
                    ine: this.ine,
                    domicilio: this.domicilio,
                    telefono : this.telefono,
                    celular: this.celular,
                    referencia: this.referencia
                };

                axios.put(url, datos).then(response=>{
                    console.log('Creado')
                    this.nombre = ""
                    this.apellido_p=""
                    this.apellido_m =""
                    this.rfc=""
                    this.ine=""
                    this.domicilio=""
                    this.telefono=""
                    this.celular=""
                    this.referencia=""
                    this.id = 0
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
