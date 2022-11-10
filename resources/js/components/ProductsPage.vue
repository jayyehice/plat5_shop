<template>
    <v-container>
        <v-row>
            <products-filter
                title="篩選條件"
                :options="options"
                :checkboxes="checkboxes"
            >
            </products-filter>

            <v-col cols="10">
                <v-sheet
                    min-height="70vh"
                    rounded="lg"
                    class="d-flex flex-wrap pa-2"
                >
                    <v-card
                        v-for="(product, index) in products"
                        :key="index"
                        class="justify-space-between align-self-center ma-2"
                        max-width="344"
                        outlined
                    >
                        <v-list-item three-line>
                            <v-list-item-content>
                                <div class="text-overline mb-4">OVERLINE</div>
                                <v-list-item-title class="text-h5 mb-1">
                                    {{ product.name }}
                                </v-list-item-title>
                                <v-list-item-subtitle>
                                    {{ product.description }}
                                </v-list-item-subtitle>
                                <v-list-item-title class="text-h6 mt-1">
                                    TWD {{ product.price }}
                                </v-list-item-title>
                            </v-list-item-content>

                            <v-list-item-avatar tile size="80" color="grey">
                                <v-img
                                    :src="`./img/${product.name}.jpg`"
                                ></v-img>
                            </v-list-item-avatar>
                        </v-list-item>

                        <v-card-actions>
                            <v-btn outlined rounded text class="ml-auto">
                                Add
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-sheet>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import axios from 'axios';
import productsFilter from './ProductsFilter.vue';

export default {
    components: { productsFilter },
    data: () => ({
        products: [],
        types: [
            { id: 1, name: '紅色', kind: '顏色' },
            { id: 2, name: '黃色', kind: '顏色' },
            { id: 3, name: '甜', kind: '口味' },
            { id: 4, name: '酸', kind: '口味' },
        ], //之後會改用ajax，取得商品分類table的資料
        checkboxes: {},
        options: {},
    }),
    mounted() {
        axios
            .get('getAllProducts')
            .then((response) => (this.products = response.data.products));

        //篩選條件
        let options = {};
        let checkboxes = {};
        this.types.forEach((type) => {
            options[type.kind] = options[type.kind] || [];
            options[type.kind].push(type.name);
            checkboxes[type.name] = true;
        });
        this.options = options;
        this.checkboxes = checkboxes;
    },
};
</script>