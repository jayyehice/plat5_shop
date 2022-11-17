<template>
    <v-app>
        <header-navigate :is_login="is_login"></header-navigate>
        <v-main class="grey lighten-3">
            <keep-alive>
                <router-view></router-view>
            </keep-alive>
        </v-main>
    </v-app>
</template>

<script>
import axios from 'axios';
import headerNavigate from './HeaderNavigate.vue';

export default {
    components: { headerNavigate },
    data: () => ({
        is_login: false,
    }),
    watch: {
        $route: function () {
            axios.get('api/user/loginStatus').then((response) => {
                // this.is_login = response.data;
                console.log(response.data);
            });
        },
    },
    mounted() {
        axios.get('api/user/loginStatus').then((response) => {
            // this.is_login = response.data;
            console.log(response.data);
        });
    },
};
</script>