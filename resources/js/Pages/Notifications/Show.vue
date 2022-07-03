<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';

</script>

<template>
    <Head title="Notifications"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notifications
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <ul>
                            <li v-for="(note, i) in notifications" :key="i">
                                <Link href="#">{{note.user_id}}</Link>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>

import Button from '@/components/Button'
import { Link } from '@inertiajs/inertia-vue3';

export default {
    props: ['notifications'],
    name: "Dashboard",

    data() {
        return {}
    }
};
</script>

