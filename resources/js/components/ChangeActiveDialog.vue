<template>
    <v-dialog v-model="dialog" width="500" @click:outside="active = !active">
        <template v-slot:activator="{ on }">
            <v-switch v-model="active" v-on="on" readonly></v-switch>
        </template>
        <v-card>
            <v-card-title class="text-h5">
                您是否確認要{{active ? '下' : '上'}}架此商品?
            </v-card-title>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="dialog = false">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="changeActiveConfirm">OK</v-btn>
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
        };
    },
    methods: {
        changeActiveConfirm() {
            axios.patch('manage/updateActive/' + this.item.id, { 'active': !this.active })
                .then((response) => {
                    if (response.data.updated) {
                        this.$emit('active_result', {
                            'success': true,
                            'item': this.item,
                            'hint': (this.active ? '下' : '上') + '架成功',
                        });
                        this.dialog = false;
                    }
                })
                .catch((error) => {
                    this.$emit('active_result', {
                        'success': false,
                        'hint': (this.acitve ? '上' : '下') + '架失敗 - ' + error,
                    });
                });
        }
    },
    computed: {
        active() {
            return this.item.active;
        }
    }
};
</script>