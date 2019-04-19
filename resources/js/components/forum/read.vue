<template lang="html">
    <div v-if="question">
        
            <editquestion v-if="editing" :showQestiondata=question></editquestion>
        
        
            <show-question v-else :showQestiondata=question></show-question>

            <v-container>
                <replies :question="question"></replies>

                <new-reply :questionSlug="question.queSlug"></new-reply>
                
            </v-container>

        
    </div>
</template>

<script>
import ShowQuestion from './ShowQuestion.vue'
import editquestion from './editquestion.vue'
import replies from '../reply/replies.vue'
import NewReply from '../reply/NewReply.vue'

export default {
    components:{
        ShowQuestion,
        editquestion,
        replies,
        NewReply
    },

    data() {
        return {
            question: null,
            editing:false,
        }
    },

    created() {
        this.listen();
        this.getQuestion()
    },

    methods:{
        listen(){
            EventBus.$on('startEdit', () =>{
                this.editing=true
            }),
            EventBus.$on('cancelEditing',()=>{
                this.editing=false
            })
        },
        getQuestion(){
            axios.get(`/api/question/${this.$route.params.slug}`)
            .then(res => this.question = res.data.data)
        }
    }
}
</script>

<style lang="css" scoped>
</style>
