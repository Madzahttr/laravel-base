<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
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
        <template #title>Users</template>
        <template #subtitle>List of site users</template>
        <template #path>Admin > Users</template>

        <div class="w-full mt-1 px-8">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-t-lg border-t-4 border-blue-600">
                <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                    <div>
                        <h5 class="mr-3 font-semibold dark:text-white">User List</h5>
                        <p class="text-gray-500 dark:text-gray-400">Manage all your existing users or add a new one</p>
                    </div>
                    <button type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-600 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path
                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                        </svg>
                        Add new user
                    </button>
                </div>
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-80">ID</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3 w-32 text-center">Verified</th>
                            <th scope="col" class="px-6 py-3 w-32 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="user in users">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ user.id }}</th>
                            <td class="px-6 py-4">{{ user.name }}</td>
                            <td class="px-6 py-4">{{ user.email }}</td>
                            <td class="px-6 py-4 text-center">
                                <span v-if="user.email_verified_at != null">
                                    <FontAwesomeIcon icon="check" size="xl" class="text-green-600" />
                                </span>
                                <span v-else>
                                    <FontAwesomeIcon icon="xmark" size="xl" class="text-red-700" />
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center"><a :href="route('admin.users.edit', user.id)" class="font-medium text-blue-600 hover:underline">Edit User</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>