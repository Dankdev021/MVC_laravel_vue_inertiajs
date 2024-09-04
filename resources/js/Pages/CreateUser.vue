<template>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-400 to-purple-600">
        <div class="w-full max-w-lg bg-white p-10 rounded-lg shadow-lg">
            <h1 class="text-4xl font-semibold text-gray-800 mb-8 text-center">Create User</h1>

            <form @submit.prevent="submit">
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                    <input
                        v-model="form.name"
                        type="text"
                        id="name"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter your name"
                    />
                    <span v-if="errors.name" class="text-red-500 text-sm">{{ errors.name }}</span>
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                    <input
                        v-model="form.email"
                        type="email"
                        id="email"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter your email"
                    />
                    <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</span>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                    <input
                        v-model="form.password"
                        type="password"
                        id="password"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter your password"
                    />
                    <span v-if="errors.password" class="text-red-500 text-sm">{{ errors.password }}</span>
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-4 rounded-lg font-semibold hover:bg-blue-600 transition duration-300"
                >
                    Create User
                </button>

                <div v-if="successMessage" class="mt-4 text-center text-green-600 font-medium">
                    <p>{{ successMessage }}</p>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { ref } from 'vue';

export default {
    setup() {
        const form = ref({
            name: '',
            email: '',
            password: '',
        });
        const errors = ref({});
        const successMessage = ref('');

        const submit = () => {
            Inertia.post('user/create-user', form.value, {
                onError: (error) => {
                    errors.value = error;
                },
                onSuccess: () => {
                    successMessage.value = 'User created successfully!';
                    form.value.name = '';
                    form.value.email = '';
                    form.value.password = '';
                },
            });
        };

        return { form, errors, successMessage, submit };
    },
};
</script>

<style scoped>
/* Custom styles */
.min-h-screen {
    min-height: 100vh;
}

.bg-gradient-to-r {
    background: linear-gradient(to right, #63b3ed, #9f7aea);
}

input:focus {
    border-color: #4299e1;
    box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.5);
}
</style>
