<template>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-400 to-purple-600">
        <div class="w-full max-w-lg bg-white p-10 rounded-lg shadow-lg">
            <h1 class="text-4xl font-semibold text-gray-800 mb-8 text-center">Create Course</h1>

            <form @submit.prevent="submit">
                <!-- Course Name -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Course Name:</label>
                    <input
                        v-model="form.name"
                        type="text"
                        id="name"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter course name"
                    />
                    <span v-if="errors.name" class="text-red-500 text-sm">{{ errors.name }}</span>
                </div>

                <!-- Course Description -->
                <div class="mb-6">
                    <label for="description" class="block text-gray-700 font-medium mb-2">Description:</label>
                    <textarea
                        v-model="form.description"
                        id="description"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter course description"
                    ></textarea>
                    <span v-if="errors.description" class="text-red-500 text-sm">{{ errors.description }}</span>
                </div>

                <!-- PDF Upload -->
                <div class="mb-6">
                    <label for="pdf" class="block text-gray-700 font-medium mb-2">Upload PDF:</label>
                    <input
                        type="file"
                        id="pdf"
                        @change="handleFileChange"
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none"
                        accept="application/pdf"
                    />
                    <span v-if="errors.pdf" class="text-red-500 text-sm">{{ errors.pdf }}</span>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-4 rounded-lg font-semibold hover:bg-blue-600 transition duration-300"
                >
                    Create Course
                </button>

                <!-- Success Message -->
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
            description: '',
            pdf: null, // Handle the PDF file
        });

        const errors = ref({});
        const successMessage = ref('');

        const handleFileChange = (event) => {
            form.value.pdf = event.target.files[0]; // Get the uploaded PDF
        };

        const submit = () => {
            const formData = new FormData();
            formData.append('name', form.value.name);
            formData.append('description', form.value.description);
            if (form.value.pdf) {
                formData.append('pdf', form.value.pdf); // Append the PDF if uploaded
            }

            Inertia.post('/course/create-course', formData, {
                forceFormData: true,
                onError: (error) => {
                    errors.value = error;
                },
                onSuccess: () => {
                    successMessage.value = 'Course created successfully!';
                    form.value.name = '';
                    form.value.description = '';
                    form.value.pdf = null;
                },
            });
        };

        return { form, errors, successMessage, submit, handleFileChange };
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

input:focus,
textarea:focus {
    border-color: #4299e1;
    box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.5);
}
</style>
