<template>
    <v-app>
        <header-navigate></header-navigate>

        <v-main class="grey lighten-3">
            <products-page></products-page>
        </v-main>
    </v-app>
</template>

<script>
import headerNavigate from './HeaderNavigate.vue';
import productsPage from './ProductsPage.vue';

export default {
    components: { headerNavigate, productsPage },
};
</script>