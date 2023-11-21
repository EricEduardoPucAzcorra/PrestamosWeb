<template>
    <div>
        <Button icon="pi pi-external-link" label="Export" />
    </div>
</template>

<script>
    import Button from "primevue/button"
    export default {
        components:{
            "Button":Button,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
