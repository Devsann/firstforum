<template lang="html">
    <div v-if="question">
        
            <editquestion v-if="editing" :showQestiondata=question></editquestion>
        
        
            <show-question v-else :showQestiondata=question></show-question>
        
    </div>
</template>

<script>
import ShowQuestion from './ShowQuestion.vue'
import editquestion from './editquestion.vue'

export default {
    components:{
        ShowQuestion,
        editquestion
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
