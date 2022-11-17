<template>
    <v-app-bar app color="white" flat>
        <v-container class="py-0 fill-height">
            <v-row>
                <v-col cols="2" class="d-flex justify-center align-center pa-0">
                    <v-avatar rounded width="60%" class="overflow-hidden">
                        <v-img src="./img/logo.png"></v-img>
                    </v-avatar>
                </v-col>
                <v-col>
                    <v-btn v-for="link in links" :key="link[0]" @click="toProductsPage" text>
                        {{ link[0] }}
                    </v-btn>
                </v-col>
                <v-col cols="2" class="d-flex">
                    <v-btn class="ml-auto" text>
                        <v-icon>mdi-cart-outline</v-icon>
                    </v-btn>
                    <v-btn v-if="!is_login" to="/login" color="primary">登入</v-btn>
                    <v-btn v-else to="/" color="grey darken-1">登出</v-btn>
                </v-col>
            </v-row>
        </v-container>
    </v-app-bar>
</template>

<script>
export default {
    props:['is_login'],
    data: () => ({
        links: [['Products','/#/products']],
    }),
    methods:{
        toProductsPage(){
            location.href = '/#/products';
        }
    }
};
</script>