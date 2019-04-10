<template>
    <v-container>
        <v-card>
            <v-container>
                <v-form @submit.prevent="submit">
                    <v-text-field v-model="form.catName" label="Category Name" required>
                    </v-text-field>
                        
                    <v-btn type="submit" color="green">Create </v-btn>

                </v-form>
                
            </v-container>
            
        </v-card>

        <v-card class="mt-4">
            <v-toolbar color="purple accent-2" dark>
                <v-toolbar-title>Category</v-toolbar-title>
            </v-toolbar>
            <v-list>
                <div v-for="(category,index) in categories" :key="category.id">
                    <v-list-tile>
                        <v-list-tile-action>
                            <v-btn icon color="success" small @click="edit(index)">
                                <v-icon small>edit</v-icon>
                            </v-btn>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>{{ category.catName }}</v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-action>
                            <v-btn icon color="red darken-1" small @click="destroy(category.slug,index)">
                                <v-icon color="white" small>delete</v-icon>
                            </v-btn>
                        </v-list-tile-action>
                    </v-list-tile>
                    <v-divider></v-divider>
                </div>
            </v-list>
        </v-card>
    </v-container>
</template>

<script>
export default {
    data(){
        return{
            form:{
                catName:null
            },
            categories:{},
            
        }
    },
    created(){
        axios.get('/api/category')
        .then(res => this.categories = res.data.data)
    },
    methods:{
        submit(){
            axios.post('/api/category',this.form)
            .then(res => {
                console.log(res.data);
                
                this.categories.unshift(res.data)
                this.form.catName = null;
            })
        },
        destroy(slug, index){
            if (confirm(" Are U Sure Delete It ? ?")) {
                axios.delete(`/api/category/${slug}`)
                .then(res=>this.categories.splice(index,1))
            }
        },
        edit(index){
            this.form.catName = this.categories[index].catName
        }
    }
}
</script>

<style>

</style>
