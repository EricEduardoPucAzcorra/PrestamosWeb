<template>
    <div class="table-responsive">
        <DataTable  @rowSelect="selectRow" :value="data" paginator :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"  :style="{ 'min-width': '60rem' }" v-model:selection="selectedRow" selectionMode="single" :metaKeySelection="false" dataKey="id"
        v-model:filters="filters" :globalFilterFields="columnas.map(column => column.field)" @rowUnselect="onRowUnselect">
            <template #header>
                <input type="text" name="filtro" v-model="filters['global'].value" id="filtro" class="form-control" placeholder="Buscar registros">
            </template>
            <Column  v-for="(column, index) in columnas" :key="index" :field="column.field" :header="column.header" ></Column>
        </DataTable>
    </div>
</template>

<script>

    import DataTable from 'primevue/datatable';
    import Column from 'primevue/column';
    import { FilterMatchMode, FilterOperator } from 'primevue/api';
    import InputText from 'primevue/inputtext';
    export default {
        props:[
            "name",
            "colums",
            "data"
        ],
        components:{
            "DataTable":DataTable,
            "Column":Column,
            "FilterMatchMode":FilterMatchMode,
            "InputText":InputText
        },

        data(){
            return{
                name_table:"",
                columnas: [],
                selectedRow:null,
                filters :
                {
                    global: { value: null, matchMode: FilterMatchMode.CONTAINS }
                }

            }
        },
        created() {
            this.name_table = this.name;
            this.columnas = this.colums;
            this.$emit('row', this.selectedRow);
        },
        methods:{
            selectRow(event){
                //console.log(event.data)
                if(event){
                    this.$emit('row', event.data);
                }
            },
            onRowUnselect(){
                this.$emit('row', null);
            }
        },
        computed:{

        }

    }
</script>
