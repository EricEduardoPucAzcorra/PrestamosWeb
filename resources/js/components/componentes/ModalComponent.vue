<template>
    <div>
        <Dialog v-model:visible="visible" modal header="Header" :style="{ width: '50rem'}" :breakpoints="{ '1199px': '75vw', '575px': '90vw' }" :closable="false">
            <template #header>
                <div class="inline-flex align-items-center justify-content-center gap-2 d-flex">
                    <span class="font-bold white-space-nowrap" style="font-weight: bold;">{{ accion }}</span>
                    <button type="button" class="btn btn-default" v-on:click="onCloseButtonClick()" style="margin-left: 510px;"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </template>
            <slot></slot>

            <!-- <template #footer>
                <button type="button" class="btn btn-default" v-on:click="onCloseButtonClick()">Cerrar</button>
            </template> -->
        </Dialog>
    </div>
</template>

<script>
    import Dialog from 'primevue/dialog';
    import Button from 'primevue/button';
    import InputGroup from 'primevue/inputgroup';
    import InputGroupAddon from 'primevue/inputgroupaddon';
    export default {
        props:['condicion','accione'],
        components:{
            "Dialog":Dialog,
            "Button":Button,
            "InputGroup":InputGroup,
            "InputGroupAddon":InputGroupAddon
        },
        data(){
            return{
                visible:false,
                accion:""
            }
        },
        mounted() {
            this.visible = this.condicion;
            this.accion = this.accione;
            console.log('modal componente.')
        },
        methods:{
            onCloseButtonClick(){
                this.visible = false;
                //console.log(this.visible)
                this.$emit('close-modal', this.visible);
            }
        }
    }
</script>
