<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';

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
            <div class="bg-white dark:bg-gray-800 overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">{{ role.name }}</div>
            </div>
        </div>
    </AdminLayout>
</template>