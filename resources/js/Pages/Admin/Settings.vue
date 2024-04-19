<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
            <div class="w-full">
                <div class="bg-white dark:bg-gray-800 overflow-hidden">
                    <div class="p-6 text-gray-900 dark:text-gray-100">Settings</div>
                </div>
            </div>
    </AdminLayout>
</template>