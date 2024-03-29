<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import BreezeButton from '@/Components/Button.vue';

import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import SearchUser from "@/components/SearchUser.vue";


// const submit = () => {
//     table.post(route('table.store'), {
//         onFinish: () => table.reset('name'),
//     });
// };
</script>

<template>
    <Head title="Create Table"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Table
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <BreezeValidationErrors class="mb-4"/>

                        <form @submit.prevent="submit">
                            <div>
                                <BreezeLabel for="tablename" value="Name"/>
                                <BreezeInput id="tablename" type="text" class="mt-1 block w-full" v-model="table.name"
                                             required autofocus autocomplete="name"/>
                            </div>

                            <hr class="mt-5 mb-5">

                            <h3 class="mt-5 mb-5">Additional Params</h3>

                            <div>
                                <h4 class="m-2">Select background</h4>
                                <button type="button"
                                        class="rounded border mr-2 button_back"
                                        v-for="(backImg, i) in backgrounds['1']"
                                        :key="i"
                                        :class="{'selected_back_border': backImg.id === table.settings.background_id}"
                                        @click="setBackground(backImg.id)"
                                        :style="{
                                            backgroundImage: `url(/backgrounds/${backImg.id}/small.jpg`,
                                            width: '100px',
                                             height: '80px'
                                        }"
                                >
                                </button>
                                <hr class="m-2">
                                <button type="button"
                                        class="rounded border mr-2 button_back"
                                        v-for="(backColor, i) in backgrounds['2']"
                                        :key="i"
                                        :class="{'selected_back_border': backColor.id === table.settings.background_id}"
                                        @click="setBackground(backColor.id)"
                                        :style="{
                                            backgroundColor: backColor.color,
                                            width: '100px',
                                             height: '80px'
                                        }"
                                >
                                </button>

                            </div>

                            <hr class="mt-5 mb-2">

                            <div>
                                <h4 class="m-2">Add User</h4>
                                <div class="flex">
                                    <SearchUser @selected="userSelected"/>
                                    <div class="ml-2">
                                        <ol>
                                            <li v-for="(user, i) in table.settings.addedUsers" :key="i">
                                                @{{ user.username }}
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">

                                <BreezeButton class="ml-4" :class="{ 'opacity-25': table.processing }"
                                              :disabled="table.processing">
                                    Create
                                </BreezeButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>

import Button from '@/components/Button.vue'
import {Link, useForm} from '@inertiajs/inertia-vue3';

export default {
    props: ['backgrounds'],
    name: "TableCreate",
    components: {
        Button,
        Link
    },
    data() {
        return {
            table: useForm({
                name: '',
                settings: {
                    background_id: 5,
                    addedUsers: []
                },
            })
        }
    },
    methods: {
        setBackground(id) {
            this.table.settings.background_id = id
            // console.log(table.settings)
        },
        submit() {
            this.table.post(route('table.store'), {
                onFinish: () => table.reset('name'),
            });
        },
        userSelected(user) {
            let found = false
            this.table.settings.addedUsers.forEach((addedUser) => {
                if (addedUser.id === user.id) {
                    console.log(user.username + ' has already been added to list')
                    found = !found
                }
            })
            if(!found) {
                this.table.settings.addedUsers.push(user)
            }
        }
    }
};
</script>

<style scoped>
.button_back:hover {
    opacity: 0.75;
}

.selected_back_border {
    border: 2px solid #232222;
    opacity: 0.75;
}
</style>
