<template>
    <v-app>
        <header-navigate></header-navigate>

        <v-main class="grey lighten-3">
            <router-view></router-view>
        </v-main>
    </v-app>
</template>

<script>
import headerNavigate from './HeaderNavigate.vue';

export default {
    components: { headerNavigate },
};
</script>