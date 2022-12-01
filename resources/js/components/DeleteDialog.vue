<template>
    <v-dialog v-model="dialog" width="500">
        <template v-slot:activator="{ on }">
            <v-icon v-on="on" small>
                mdi-delete
            </v-icon>
        </template>
        <v-card>
            <v-card-title class="text-h5">您是否確認要刪除此商品?</v-card-title>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="dialog = false">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                <v-spacer></v-spacer>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import axios from 'axios';

export default {
    props: ['item'],
    data() {
        return {
            dialog: false,
        }
    },
    methods: {
        deleteItemConfirm() {
            axios.delete('manage/deleteProduct/' + this.item.id)
                .then((response) => {
                    if (response.data.deleted) {
                        this.$emit('delete_result', {
                            'success': true,
                            'item': this.item
                        });
                    }
                })
                .catch((error) => {
                    this.$emit('delete_result', {
                        'success': false,
                        'error': error
                    });
                });
        },
    }
}
</script>