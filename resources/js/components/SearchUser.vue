<template>
    <div class="flex">
        <div class="bg-white rounded-lg border border-gray-200 w-96 text-gray-900">
            <BreezeInput id="username" @change="search" type="text" class="border-none block w-full" v-model="username"
                         required autofocus autocomplete="name"/>
            <a v-for="(user, index) in users" :key="index"
              @click="selected(user)"
               class="

        block
        px-6
        py-2
        border-b border-gray-200
        w-full
        hover:bg-gray-100 hover:text-gray-500
        focus:outline-none focus:ring-0 focus:bg-gray-200 focus:text-gray-600
        transition
        duration-500
        cursor-pointer
      "
            >
                @{{ user.username }}
            </a>

        </div>
    </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue';

import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import axios from "axios"

export default {
    name: "SearchUser",
    components: {
        BreezeLabel,
        BreezeInput,
        BreezeButton
    },
    data() {
        return {
            username: '',
            searching: false,
            users: []
        }
    },
    methods: {
        search(){
            axios.get('/find', {
                params: {
                    username : this.username
                }
            }).then(res =>  {
                let users = res.data
                if (users){
                    this.users = users
                }
            })
        },
        selected(user){
            this.$emit('selected', user)
            this.username = ''
            this.users = []
            return false
        }
    },
    watch: {
        username(next, prev){
           this.search()
        }
    }
}
</script>

<style scoped>

</style>
