<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    users: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
            <div class="w-full">
                <div class="bg-white dark:bg-gray-800 overflow-hidden">
                    <div class="p-6 text-gray-900 dark:text-gray-100">Users</div>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="user in users">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><a :href="route('admin.users.edit', user.id)">{{ user.id }}</a></th>
                                <td class="px-6 py-4">{{ user.name }}</td>
                                <td class="px-6 py-4">{{ user.email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </AdminLayout>
</template>