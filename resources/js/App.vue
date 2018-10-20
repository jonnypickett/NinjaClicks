<template>
    <v-app>
        <div class="container">
            <navigation></navigation>
            <div class="col-sm-12">
                <router-view></router-view>
            </div>
        </div>
    </v-app>
</template>

<script>
    import Navigation from './components/Navigation.vue'

    export default {
        components: {
            Navigation
        }
    }
</script>
