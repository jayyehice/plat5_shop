<template>
    <v-col cols="2">
        <v-sheet class="pa-4" rounded="lg">
            <!-- 篩選條件 -->
            <v-list-group :value="true">
                <template v-slot:activator>
                    <v-list-item-title>{{ title }}</v-list-item-title>
                </template>

                <v-list-group
                    v-for="(types, kind) in options"
                    :key="kind"
                    :value="true"
                    no-action
                    sub-group
                >
                    <template v-slot:activator>
                        <v-list-item-content>
                            <v-list-item-title>{{ kind }}</v-list-item-title>
                        </v-list-item-content>
                    </template>

                    <v-list-item v-for="(type, i) in types" :key="i" link>
                        <v-checkbox v-model="checkboxes[type]" :label="type">
                        </v-checkbox>
                    </v-list-item>
                </v-list-group>
            </v-list-group>
            <!-- 篩選條件End -->
            <v-btn block class="mt-4">篩選</v-btn>
        </v-sheet>
    </v-col>
</template>

<script>
export default {
    props: ['title', 'options', 'checkboxes'],
};
</script>