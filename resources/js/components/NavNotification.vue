<script setup>
import {computed} from 'vue';
import {Link} from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition  duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
);

</script>

<template>
    <Link :href="href" :class="classes">
        <div v-if="notifications !== 0"
            class="absolute inline-block mt-4 top-0 right-0 bottom-auto left-auto translate-x-2/4 -translate-y-1/2 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 py-1 px-2.5 text-xs leading-none text-center whitespace-nowrap align-baseline font-bold bg-indigo-700 text-white rounded-full z-10">
            {{notifications}}
        </div>
        <slot/>
    </Link>
</template>

<script>
export default {
    data() {
        return {
            notifications: 0
        }
    },
     created() {
        axios.post('/notifications').then(res => {
            this.notifications = res.data.notifications
        })
    }
}
</script>
