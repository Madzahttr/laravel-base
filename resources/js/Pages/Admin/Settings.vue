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
        
        <div class="w-full">
            
        </div>
    </AdminLayout>
</template>