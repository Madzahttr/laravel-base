<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import UpdateRoleInfoForm from './Partials/UpdateRoleInfoForm.vue';
import DeleteRoleButton from './Partials/DeleteRoleButton.vue';

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

        <div class="w-full mt-1 px-8">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-t-lg border-t-4 border-blue-600">
                <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                    <span class="mr-3 font-semibold dark:text-white text-lg">{{ role.name }}</span>
                    
                    <DeleteRoleButton />
                </div>
            </div>
            <div class="w-full flex flex-wrap">
                <UpdateRoleInfoForm />

                <div class="flex-grow lg:basis-1/2 basis-full lg:pl-4 pt-4">
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 border-t-4 border-blue-600">
                        <div class="items-center justify-between p-4">
                            <span class="mr-3 font-semibold dark:text-white text-xl">Permissions</span>
                        </div>
                    </div>
                    <div class="p-6 space-y-6 bg-white dark:bg-gray-800">
                        <div v-for="permission in $props.role.permissions">
                        {{ permission.node }}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>