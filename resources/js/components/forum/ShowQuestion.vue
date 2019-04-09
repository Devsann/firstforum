<template>
    <div>
        <v-card>
            <v-container fluid>    
                <v-card-title>
                    <div>
                        <div class="headline">
                            <h4>{{ showQestiondata.title }}</h4>
                            
                        </div>
                        <span class="grey--text">
                            {{ showQestiondata.user }} said {{ showQestiondata.created_at }}
                        </span>
                    </div>
                    <v-spacer></v-spacer>
                    <v-btn color="info">5 Replies</v-btn> 
                </v-card-title>

                <v-card-text v-html="body"></v-card-text>
  
                <v-card-actions v-if="own">
                    <v-btn icon small color="orange" @click="edit">
                        <v-icon>edit</v-icon>
                    </v-btn>
                    <v-btn icon small color="red" @click="destroy">
                        <v-icon class="white--text">delete</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-container>
        </v-card>
    </div>
</template>

<script>
export default {
    props:['showQestiondata'],
    data(){
        return{
            
        }
    },
    computed:{
    own(){
        return User.own(this.showQestiondata.user_id )
    },
    body(){
        return md.parse(this.showQestiondata.body)
    }
        
    },
    methods:{
        destroy(){
            if (confirm(" Are You Sure Delete this ?")) {
                axios.delete(`/api/question/${this.showQestiondata.queSlug}`)
                .then(res => this.$router.push('/forum'))
                .catch(error => console.log(error.response.data))
            }
        },
        edit(){
            EventBus.$emit('startEdit')
        }
    }
}
</script>

<style>

</style>
