<template>
    <div class="">
        <form class="row g-3" >
            <div class="col-md-6">
                <label for="monto" class="form-label">Monto</label>
                <input type="number" class="form-control" id="monto" placeholder="Monto del prestamo 0.0" v-model="monto">
            </div>
            <div class="col-md-6">
                <label for="tiene_garantia" class="form-label">¿Tiene garantía?</label>
                <select id="tiene_garantia" class="form-select" v-model="tiene_garantia">
                    <option value="" selected>Seleciona una opción</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="id_categoria" class="form-label">Categoria</label>
                <select id="id_categoria" class="form-select" v-model="id_categoria_prestamo">
                    <option value="0" selected>Seleciona una opción</option>
                    <option v-bind:value="categoria.id_categoria_prestamo" v-for="categoria in categoria_prestamos" :key="categoria.id_categoria_prestamo" v-text="categoria.nombre"></option>
                </select>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="button" class="btn btn-success" v-on:click="buscar()">Aplicar</button>

            </div>
        </form>
    </div>
</template>

<script>
    import Button from "primevue/button"
    import axios from 'axios';
    export default {
        components:{
            "Button":Button,
        },
        data(){
            return{
                categoria_prestamos:[],
                monto:0.0,
                tiene_garantia:"",
                id_categoria_prestamo: 0
            }
        },
        mounted() {
            this.getCategoriaPrestamos();
            console.log('Filter component.')
        },
        methods:{
            getCategoriaPrestamos(){
               const url = '/categorias_prestamos';

               axios.get(url).then(response=>{
                   this.categoria_prestamos = response.data;
               }, error=>{
                    console.log(error);
               });
            },
            buscar(){
                const datos = {
                    monto: this.monto,
                    tiene_garantia:this.tiene_garantia,
                    id_categoria_prestamo: this.id_categoria_prestamo
                };

                this.$emit("busqueda", datos);

            }
        }
    }
</script>
