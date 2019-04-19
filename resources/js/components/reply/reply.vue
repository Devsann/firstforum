<template>
    <div class="mt-3">
        <v-card >
            <v-card-title>
                <div class="headline">{{ data.user }}</div>
                <div class="ml-3">said {{ data.created_at }}</div>
            </v-card-title>
            <v-divider></v-divider>
            
            <edit-reply v-if="editing"
            :reply=data>

            </edit-reply>
            <v-card-text v-else>{{ data.reply }}</v-card-text>

            <v-divider></v-divider>

            <div v-if="!editing">
                <v-card-actions v-if="own">
                    <v-btn icon small color="orange" @click="edit">
                        <v-icon>edit</v-icon>
                    </v-btn>
                    <v-btn icon small color="red" @click="destroy">
                        <v-icon class="white--text">delete</v-icon>
                    </v-btn>
                </v-card-actions>
            </div>

        </v-card>
    </div>
</template>

<script>
import EditReply from './EditReply.vue' 

export default {
    components:{
        EditReply
    },

    props:['data','index'],

    data(){
        return{
            editing:false
        }
    },

    created(){
        this.listen();
    },

    methods:{
        destroy(){
            if (confirm("Are U Sure Delete This ? ")) {
                EventBus.$emit('deleteReply',this.index)
            }
        },

        edit(){
            this.editing=true;
        },

        listen(){
            EventBus.$on('cancelEditing',() => {
                this.editing=false
            })
        }
    },

    computed:{
        own(){
            return User.own(this.data.user_id)
        }
    }
}
</script>

<style>

</style>
