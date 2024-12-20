<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';

const role = usePage().props.role;

const form = useForm({
    name: role.name,
});
</script>

<template>
    <section class="flex-grow lg:basis-1/2 basis-full lg:pr-4 pt-4">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 border-t-4 border-blue-600">
            <div class="items-center justify-between p-4">
                <span class="mr-3 font-semibold dark:text-white text-xl">Information</span>
            </div>
        </div>
        <form @submit.prevent="form.patch(route('admin.roles.update', $page.props.role.id))" class="p-6 space-y-6 bg-white dark:bg-gray-800">
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
        </form>
    </section>
</template>
