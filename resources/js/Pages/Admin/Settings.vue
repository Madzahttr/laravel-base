<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
        <template #title>Settings</template>
        <template #subtitle>Adjust site settings</template>
        <template #path>Admin > Settings</template>
        
        <div class="w-full mt-1 px-8">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-t-lg border-t-4 border-blue-600">
                <div class="items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                    <div>
                        <span class="mr-3 font-semibold dark:text-white text-lg">General</span>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>