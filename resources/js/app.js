
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueRouter from 'vue-router';
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import App from './App.vue';
import router from './router'
import ApolloClient from "apollo-boost"
import VueApollo from "vue-apollo"

const apolloProvider = new VueApollo({
  defaultClient: new ApolloClient({
    uri: "http://127.0.0.1:8000/api/graphql"
  })
})

Vue.use(require('vue-moment'));

Vue.use(VueApollo)
Vue.use(Vuetify)
Vue.use(VueRouter)

new Vue({
  router,
  apolloProvider,
  render: h => h(App),
}).$mount('#app');
