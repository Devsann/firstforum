<template lang="html">
  <div>
    <v-container fluid grid-list-md>
      <v-layout row wrap>
        <v-flex xs8>
          <question v-for="question in questions" :key="question.path" :data=question >
          </question>
        </v-flex>
        sidebar
      </v-layout>
    </v-container>
  </div>
</template>

<script>
import Question from './question.vue'
export default {
    components: {
        Question
    },
    data() {
        return {
            questions: {}
        }
    },

    created() {
        axios.get('/api/question')
            .then(res => this.questions = res.data.data)
            .catch(error => console.log(error.response.data))
    }

}
</script>

<style lang="css" scoped>
</style>
