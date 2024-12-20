<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import UpdateUserInfoForm from './Partials/UpdateUserInfoForm.vue';
import DeleteUserButton from './Partials/DeleteUserButton.vue';

defineProps({
    user: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
        <template #title>Edit User</template>
        <template #subtitle>Edit user information</template>
        <template #path>Admin > Users > Edit</template>

        <div class="w-full mt-1 px-8">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-t-lg border-t-4 border-blue-600">
                <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                    <span class="mr-3 font-semibold dark:text-white text-lg">{{ user.name }}</span>
                    
                    <DeleteUserButton />
                </div>
            </div>
            <div class="w-full flex flex-wrap">
                <UpdateUserInfoForm />

                <div class="flex-grow basis-full pt-4 mb-4">
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 border-t-4 border-blue-600">
                        <div class="items-center justify-between p-4">
                            <span class="mr-3 font-semibold dark:text-white text-xl">Roles</span>
                        </div>
                    </div>
                    <div class="p-6 space-y-6 bg-white dark:bg-gray-800">
                        <div v-for="role in user.roles">
                            {{ role.name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>