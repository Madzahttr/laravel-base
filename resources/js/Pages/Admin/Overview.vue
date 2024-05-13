<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Admin Dashboard" />

    <AdminLayout>
        <template #title>Overview</template>
        <template #subtitle>A quick glance</template>
        <template #path>Admin > Overview</template>

        <div class="w-full">
            
        </div>
    </AdminLayout>
</template>