<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import UpdateUserInfoForm from './Partials/UpdateUserInfoForm.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';

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
            <div class="w-full">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <UpdateUserInfoForm class="max-w-xl" />
                    </div>
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <DeleteUserForm class="max-w-xl" />
                    </div>
                </div>
            </div>
    </AdminLayout>
</template>