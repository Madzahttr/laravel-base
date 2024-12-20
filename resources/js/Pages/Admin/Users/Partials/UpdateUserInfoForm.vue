<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';

const user = usePage().props.user;

const form = useForm({
    name: user.name,
    email: user.email,
    password: null,
});
</script>

<template>
        <form @submit.prevent="form.patch(route('admin.users.update', $page.props.user.id))" class="flex flex-wrap w-full">
            <div class="flex-grow lg:basis-1/2 basis-full lg:pr-4 pt-4">
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 border-t-4 border-blue-600">
                    <div class="items-center justify-between p-4">
                        <span class="mr-3 font-semibold dark:text-white text-xl">Information</span>
                    </div>
                </div>
                <div class="p-6 space-y-6 bg-white dark:bg-gray-800">
                    <div>
                        <InputLabel for="name" value="Name" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div>
                        <InputLabel for="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="flex items-center gap-4">
                        <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                            <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                        </Transition>
                    </div>
                </div>
            </div>
            <div class="flex-grow lg:basis-1/2 basis-full lg:pl-4 pt-4">
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 border-t-4 border-blue-600">
                    <div class="items-center justify-between p-4">
                        <span class="mr-3 font-semibold dark:text-white text-xl">Password</span>
                    </div>
                </div>
                <div class="p-6 space-y-6 bg-white dark:bg-gray-800">
                    <div>
                        <InputLabel for="password" value="Password" />

                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            autocomplete="new-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>
                </div>
            </div>
        </form>
</template>
