import Vue from 'vue'
import Router from 'vue-router'
import Clicks from '../components/Clicks.vue';
import Home from '../components/Home.vue';
import PageNotFound from '../components/PageNotFound.vue';
import Providers from '../components/Providers.vue';
import Register from '../components/Register.vue';
import SignIn from '../components/SignIn.vue';

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                auth: false
            }
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
            meta: {
                auth: false
            }
        },
        {
            path: '/signin',
            name: 'signin',
            component: SignIn,
            meta: {
                auth: false
            }
        },
        {
            path: '/providers',
            name: 'providers',
            component: Providers,
            meta: {
                auth: true
            }
        },
        {
            path: '/clicks',
            name: 'clicks',
            component: Clicks,
            meta: {
                auth: true
            }
        },
        {
            path: '*',
            name: 'Page Not Found',
            component: PageNotFound,
            meta: {
                auth: false
            }
        },
    ]
})
