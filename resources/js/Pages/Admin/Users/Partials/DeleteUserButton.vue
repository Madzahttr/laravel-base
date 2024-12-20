<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const confirmingUserDeletion = ref(false);

const form = useForm({});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;
};

const deleteUser = () => {
    form.delete(route('admin.users.destroy', usePage().props.user.id), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;
};
</script>

<template>
    <section>
        <DangerButton @click="confirmUserDeletion">Delete User</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Are you sure you want to delete this User?
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Once this user is deleted, all of its resources and data will be permanently deleted. Please 
                    confirm you would like to permanently delete this User.
                </p>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Account
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
