<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
import DragAndDrop from "@/components/DragAndDrop";

</script>

<template>
    <Head title="Dashboard"/>

    <BreezeAuthenticatedLayout>
        <div class="overflow-x-scroll flex">
          <DragAndDrop />
<!--            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">-->
<!--                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">-->
<!--                    <div class="p-6 bg-white border-b border-gray-200">-->
<!--                        {{JSON.stringify(table)}}-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script>

import Button from '@/components/Button'
import { Link } from '@inertiajs/inertia-vue3';

export default {
    props: ['table'],
    name: "TableShow",
    components: {
        Button,
        Link
    },
    data() {
        return {}
    }
};
</script>

