<template>
    <div>
        <DataTable  :value="data" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]" tableStyle="min-width: 50rem" v-model:selection="selectedRow" selectionMode="single" :metaKeySelection="metaKey" dataKey="id">
            <Column v-for="(column, index) in columns" :key="index" :field="column.field" :header="column.header" ></Column>
        </DataTable>
        <!-- :style="column.style" -->
    </div>
</template>

<script>
    import DataTable from 'primevue/datatable';
    import Column from 'primevue/column';
    export default {
        props:[
            "name"
        ],
        components:{
            "DataTable":DataTable,
            "Column":Column
        },
        data(){
            return{
                name_table:"",
                data: [
                     { name: 'John Doe', country: { name: 'USA' }, company: 'ABC Inc', representative: { name: 'Jane Smith' } },
                ],
                columns: [
                    { field: "name", header: "Name", style: "width: 25%" },
                    { field: "country.name", header: "Country", style: "width: 25%" },
                    { field: "company", header: "Company", style: "width: 25%" },
                    { field: "representative.name", header: "Representative", style: "width: 25%" },
                ],
                selectedRow:[],
            }
        },
        mounted() {
            this.name_table = this.name;

            console.log('Component table.')
        },

    }
</script>
