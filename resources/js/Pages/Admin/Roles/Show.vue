<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    roles: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
        <template #title>Roles</template>
        <template #subtitle>List of site roles</template>
        <template #path>Admin > Roles</template>

        <div class="w-full mt-1 px-8">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-t-lg border-t-4 border-blue-600">
                <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                    <div>
                        <h5 class="mr-3 font-semibold dark:text-white">Role List</h5>
                        <p class="text-gray-500 dark:text-gray-400">Manage all your existing roles or add a new one</p>
                    </div>
                    <a :href="route('admin.roles.show')" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-600 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        Add new role
                    </a>
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-80">ID</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3 w-32 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="role in roles">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ role.id }}</th>
                            <td class="px-6 py-4">{{ role.name }}</td>
                            <td class="px-6 py-4 text-center"><a :href="route('admin.roles.edit', role.id)" class="font-medium text-blue-600 hover:underline">Edit Role</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>