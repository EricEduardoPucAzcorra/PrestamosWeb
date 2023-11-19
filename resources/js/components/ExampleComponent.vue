<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">

                        <Button label="Submit" />

                    </div>
                </div>
            </div>
        </div>
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
