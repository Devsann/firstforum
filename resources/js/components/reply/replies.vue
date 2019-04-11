<template>
    <div>
        <reply v-for="reply in content" 
        :key='reply.id' 
        :data="reply"></reply>
    </div>
</template>

<script>
import reply from './reply.vue'

export default {
    components:{
        reply
    },
    
    props:['replies'],

    data(){
        return{
            content:this.replies,
        }
    },

    created(){
        this.listen()
    },

    methods:{
        listen(){
            EventBus.$on('newReply',(reply) => {
                this.content.unshift(reply)
                
            })
        }
    }
}
</script>

<style>

</style>
