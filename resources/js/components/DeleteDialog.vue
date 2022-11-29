<template>
    <v-dialog v-model="delete_dialog" max-width="500px">
        <v-card>
            <v-card-title class="text-h5">您是否確認要刪除此商品?</v-card-title>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="$emit('close-delete')">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="$emit('comfirm')">OK</v-btn>
                <v-spacer></v-spacer>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    props: {
        delete_dialog: Boolean,
    }
}
</script>