<template lang="html">
  <v-toolbar class="green accent-2">
    <v-toolbar-title>
        <router-link to="/" class="dark">Microstack</router-link>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <app-notification v-if="loggedIn"></app-notification>
    <div class="hidden-sm-and-down">
      <router-link v-for="item in items" :key="item.title" :to="item.to" v-if="item.show">
        <v-btn flat>{{ item.title }}</v-btn>
      </router-link>
    </div>
  </v-toolbar>
</template>

<script>
import AppNotification from './AppNotification.vue'

export default {
    components:{
        AppNotification
    },

    data() {
        return {
            loggedIn: User.loggedIn(),
            
            items: [{
                    title: 'forum',
                    to: '/forum',
                    show: true
                },
                {
                    title: 'Ask Question',
                    to: '/ask',
                    show: User.loggedIn()
                },
                {
                    title: 'Category',
                    to: '/category',
                    show: User.admin()
                },
                {
                    title: 'Login',
                    to: '/login',
                    show: !User.loggedIn()
                },
                {
                    title: 'Logout',
                    to: '/logout',
                    show: User.loggedIn()
                },

            ]
        }
    },
    created() {
        EventBus.$on('logout', () => {
            User.logout()
        })
    }
}
</script>

<style lang="css" scoped>
</style>
