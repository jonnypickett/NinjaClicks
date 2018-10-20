<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link :to="{ name: home.to }" class="navbar-brand">{{ home.name }}</router-link>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <router-link v-for="link in links" tag="li" :to="{ name: link.to }" class="nav-item" exact :key="link.to">
                    <a  class="nav-link" >{{ link.name }}</a>
                </router-link>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    data () {
        return {
            home: { name: 'NinjaClicks', to: 'home' },
            links: [
                // { name: 'Providers', to: 'providers' },
                { name: 'Clicks', to: 'clicks' },
            ]
        }
    }
}
</script>