<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import AdminNavLink from '@/Components/AdminNavLink.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(true);
</script>

<template>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <nav class="fixed top-0 z-50 w-full h-16 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button
                            @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="xl:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                        >
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path
                                    :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex': !showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex': showingNavigationDropdown,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                        <Link :href="route('home')" class="flex ms-2 md:me-24">
                            <ApplicationLogo class="block h-10 w-auto fill-current text-gray-800 dark:text-gray-200 pr-3" />
                            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">{{ $page.props.appName }}</span>
                        </Link>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
                                        <button
                                            type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent h-10 text-lg leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                                        >
                                            {{ $page.props.auth.user.name }}

                                            <svg
                                                class="ms-2 -me-0.5 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('home')"> Home </DropdownLink>
                                    <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <aside :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform  bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                <ul class="space-y-2 font-medium">
                    <AdminNavLink :href="route('admin.dashboard')" :active="route().current('admin.dashboard')">
                        <FontAwesomeIcon icon="house" />
                        <span class="ms-3">Dashboard</span>
                    </AdminNavLink>
                    <AdminNavLink :href="route('admin.settings')" :active="route().current('admin.settings')">
                        <FontAwesomeIcon icon="screwdriver-wrench" />
                        <span class="ms-3">Settings</span>
                    </AdminNavLink>
                </ul>
                <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                    <AdminNavLink :href="route('admin.users')" :active="route().current('admin.users')">
                        <FontAwesomeIcon icon="users" />
                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </AdminNavLink>
                    <AdminNavLink :href="route('admin.roles')" :active="route().current('admin.roles')">
                        <FontAwesomeIcon icon="user-shield" />
                        <span class="flex-1 ms-3 whitespace-nowrap">roles</span>
                    </AdminNavLink>
                </ul>
            </div>
        </aside>

        <main class="fixed top-16 xl:left-64 xl:w-[calc(100vw_-_16rem)] left-0 w-full">
            <slot />
        </main>
    </div>
</template>