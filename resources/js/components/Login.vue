<template>
    <v-container fluid fill-height>
        <v-layout align-center justify-center>
            <v-flex xs12 sm8 md4>
                <v-card class="elevation-12">
                    <v-toolbar dark>
                        <v-toolbar-title>Login</v-toolbar-title>
                    </v-toolbar>
                    <v-card-text>
                        <v-form>
                            <v-text-field v-model="email" label="Account" type="text"></v-text-field>
                            <v-text-field v-model="password" label="Password" type="password"></v-text-field>
                        </v-form>
                    </v-card-text>
                    <v-card-actions class="d-flex flex-wrap">
                        <v-btn @click="login" color="#BDBDBD" block>Login</v-btn>
                        <v-divider class="ma-8"></v-divider>
                        <v-btn block to="/register">register</v-btn>
                    </v-card-actions>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import axios from 'axios';

export default {
    data: () => ({
        email: '',
        password: '',
    }),
    methods: {
        login() {
            axios
                .post(
                    'api/user/login',
                    {
                        email: this.email,
                        password: this.password,
                    },
                    {
                        headers: {
                            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    }
                )
                .then((response) => {
                    // console.log(response.data);
                    if (response.data.success) {
                        location.href = '/#/personalManage';
                    }
                });
        },
    },
};
</script>