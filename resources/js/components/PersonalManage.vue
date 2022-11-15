<template>
    <v-container>
        <v-card class="pa-4" min-height="80vh">
            <v-card-title>
                <span class="headline">商品管理</span>
            </v-card-title>
            <v-card-title>
                <v-spacer></v-spacer>
                <v-btn color="primary" class="lighten-1"> 新增商品 </v-btn>
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
    mounted() {
        axios.get('getAllProducts').then((response) => {
            this.products = response.data.products;
        });
    },
};
</script>