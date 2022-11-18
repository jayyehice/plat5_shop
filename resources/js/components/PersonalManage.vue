<template>
    <v-container>
        <v-card class="pa-4" min-height="80vh">
            <v-card-title>
                <span class="headline">商品管理</span>
            </v-card-title>
            <v-data-table :headers="headers" :items="products" :server-items-length="total" class="elevation-1">
            </v-data-table>
        </v-card>
    </v-container>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            products: [],
            options: {},
            headers: [
                {
                    align: 'left',
                    text: 'name',
                    value: 'name',
                },
                {
                    text: 'description',
                    value: 'description',
                },
                {
                    text: 'Price',
                    value: 'price',
                },
            ],
        };
    },
    computed: {
        total() {
            return this.products.length;
        },
    },
    created() {
        axios.get('user/loginStatus').then((response) => {
            !response.data.status && (location.href = "/");
        });
    },
    mounted() {
        axios.get('products/getAllProducts').then((response) => {
            this.products = response.data.products;
        });
    },
};
</script>