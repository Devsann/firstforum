<template lang="html">
  <v-card>
    <v-card-title primary-title>
      <div>
        <h3 class="headline md-8">
          <router-link :to="data.path">
            {{ data.title }}
          </router-link>
        </h3>
        <div class="grey--text">{{ data.user }} said is {{ data.created_at }}</div>
      </div>
    </v-card-title>
    <v-card-text>
      {{ data.body }}
    </v-card-text>
  </v-card>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    props: ['data']
}
</script>

<style lang="css" scoped>
</style>
