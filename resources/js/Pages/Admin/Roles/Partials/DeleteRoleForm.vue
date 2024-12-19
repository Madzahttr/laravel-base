<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const confirmingRoleDeletion = ref(false);

const form = useForm({});

const confirmRoleDeletion = () => {
    confirmingRoleDeletion.value = true;
};

const deleteRole = () => {
    form.delete(route('admin.roles.destroy', usePage().props.role.id), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingRoleDeletion.value = false;
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Delete Role</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Once this role is deleted, all of its resources and data will be permanently deleted.
            </p>
        </header>

        <DangerButton @click="confirmUserDeletion">Delete Account</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Are you sure you want to delete this Role?
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Once this role is deleted, all of its resources and data will be permanently deleted.
                </p>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteRole"
                    >
                        Delete Role
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
