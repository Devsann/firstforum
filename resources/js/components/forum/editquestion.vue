<template>
    <v-container>
        <v-form @submit.prevent="update">
        <v-text-field v-model="form.title" label="Title" type="text" required>
        </v-text-field>

        <v-autocomplete
            :items="categories"
            item-text="name"
            item-value="id"
            v-model="form.category_id"
            label="Category"
            ></v-autocomplete>

            <markdown-editor v-model="form.body" ></markdown-editor>

            
        <v-card-actions>
            <v-btn icon smal type="submit">
                <v-icon color="teal">save</v-icon>
            </v-btn>
            <v-btn icon smal @click="cancel">
                <v-icon>cancel</v-icon>
            </v-btn>
        </v-card-actions>

    </v-form>
    </v-container>
</template>

<script>
export default {
    props:['showQestiondata'],
    data(){
        return{
            form:{
                title:null,
                body:null,
                category_id:null
            },
            categories:{},
        }
    },
    created(){
        axios.get('/api/category')
        .then(res => this.categories = res.data.data)
    },

    methods:{
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/question/${this.form.queSlug}`,this.form)
            .then(res => this.cancel())
        }
    },
    mounted(){
        this.form = this.showQestiondata;
    },
}
</script>

<style>

</style>
