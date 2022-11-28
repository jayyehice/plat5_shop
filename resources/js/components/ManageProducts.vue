<template>
    <v-container>
        <v-snackbar v-model="snackbar" :color="snackbar_color" top>
            {{snackbar_text}}
            <template v-slot:action="{ attrs }">
                <v-btn color="white" text v-bind="attrs" @click="snackbar = false">
                    Close
                </v-btn>
            </template>
        </v-snackbar>
        <v-card class="pa-4" min-height="80vh">
            <v-card-title>
                <span class="headline">商品管理</span>
            </v-card-title>
            <v-card-text>
                <v-data-table :headers="headers" :items="products" class="elevation-1">
                    <template v-slot:top>
                        <v-toolbar flat>
                            <v-spacer></v-spacer>
                            <v-dialog v-model="dialog" max-width="500px">
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                                        新增商品
                                    </v-btn>
                                </template>
                                <v-card>
                                    <v-card-title>
                                        新增商品
                                    </v-card-title>
                                    <v-card-text>
                                        <v-form ref="form">
                                            <v-container>
                                                <v-row>
                                                    <v-col cols="12" sm="6" md="4">
                                                        <v-text-field v-model="edited_item.name" label="name" :rules="name_rules" :error-messages="name_error" required>
                                                        </v-text-field>
                                                    </v-col>
                                                    <v-col cols="12" sm="6" md="4">
                                                        <v-text-field v-model="edited_item.description" label="description" :rules="description_rules" :error-messages="description_error" required>
                                                        </v-text-field>
                                                    </v-col>
                                                    <v-col cols="12" sm="6" md="4">
                                                        <v-text-field v-model="edited_item.price" label="price" type="number" :rules="price_rules" :error-messages="price_error" required>
                                                        </v-text-field>
                                                    </v-col>
                                                </v-row>
                                            </v-container>
                                        </v-form>
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn color="blue darken-1" text @click="dialog = false">
                                            Cancel
                                        </v-btn>
                                        <v-btn color="blue darken-1" text @click="save">
                                            Save
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-toolbar>
                    </template>
                </v-data-table>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            dialog: false,
            name_rules: [
                v => !!v || '未填寫商品名稱',
            ],
            description_rules: [
                v => !!v || '未填寫商品敘述',
            ],
            price_rules: [
                v => !!v || '未填寫商品價格',
                v => v > 0 || '商品價格必須大於0',
                v => /^[0-9]*[1-9][0-9]*$/.test(v) || '商品價格必須為整數',
            ],
            name_error: '',
            description_error: '',
            price_error: '',
            edited_item: {
                name: '',
                description: '',
                price: null,
            },
            products: [],
            headers: [
                {
                    text: 'name',
                    value: 'name',
                    width: '30%',
                },
                {
                    text: 'description',
                    value: 'description',
                    width: '30%',
                },
                {
                    text: 'price',
                    value: 'price',
                    width: '30%',
                },
                {
                    text: 'actions',
                    value: 'actions',
                },
            ],
            snackbar: false,
            snackbar_text: '',
            snackbar_color: '',
        };
    },
    methods: {
        close() {
            this.dialog = false;
            this.$nextTick(() => {
                this.edited_item = this.$options.data().edited_item;
                this.$refs.form.resetValidation();
                this.name_error = '';
                this.description_error = '';
                this.price_error = '';
            });
        },
        save() {
            this.$refs.form.validate() && axios.post('manage/addProduct', this.edited_item)
                .then((response) => {
                    this.products.push(response.data.product);
                    this.close();
                    this.snackbar_text = '新增成功';
                    this.snackbar_color = 'primary';
                    this.snackbar = true;
                })
                .catch((error) => {
                    if ('errors' in error.response.data) {
                        this.name_error = error.response.data.errors.name;
                        this.description_error = error.response.data.errors.description;
                        this.price_error = error.response.data.errors.price;
                    } else {
                        this.snackbar_text = '新增失敗 - ' + error;
                        this.snackbar_color = 'error';
                        this.snackbar = true;
                    }
                });
        },
    },
    watch: {
        dialog(value) {
            value || this.close();
        },
    },
    mounted() {
        axios.get('products/getAllProducts')
            .then((response) => {
                this.products = response.data.products;
            });
    },
};
</script>