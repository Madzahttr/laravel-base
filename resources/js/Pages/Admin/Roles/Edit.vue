<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import UpdateRoleInfoForm from './Partials/UpdateRoleInfoForm.vue';
import DeleteRoleForm from './Partials/DeleteRoleForm.vue';

defineProps({
    role: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
        <template #title>Edit role</template>
        <template #subtitle>Edit role information and permissions</template>
        <template #path>Admin > Roles > Edit</template>

        <div class="w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <UpdateRoleInfoForm class="max-w-xl" />
                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div v-for="permission in $props.role.permissions">
                        {{ permission.node }}
                    </div>
                </div>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <DeleteRoleForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </AdminLayout>
</template>