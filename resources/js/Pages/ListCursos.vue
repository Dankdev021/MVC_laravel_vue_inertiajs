<template>
    <div class="min-h-screen bg-gray-100 p-8">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">List of Courses</h1>

            <!-- Listagem de cursos -->
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 text-left">Course Name</th>
                    <th class="py-2 px-4 text-left">Description</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="course in courses" :key="course.id" class="border-t">
                    <td class="py-2 px-4">{{ course.name }}</td>
                    <td class="py-2 px-4">{{ course.description }}</td>
                    <td class="py-2 px-4">
                        <a
                            v-if="course.path_curso"
                            :href="`/course/show/pdf/${course.id}`"
                            target="_blank"
                            class="text-blue-500 hover:underline"
                        >
                            View PDF
                        </a>
                        <span v-else class="text-gray-500">No PDF available</span>
                    </td>
                    <td class="py-2 px-4">
                        <!-- Use Inertia's Link component to navigate -->
                        <inertia-link
                            :href="`/course-update/${course.id}`"
                            class="text-blue-500 hover:underline"
                        >
                            Edit Course
                        </inertia-link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { Link as InertiaLink } from '@inertiajs/inertia-vue3'; // Import Inertia Link

export default {
    props: {
        courses: Array, // Recebe a lista de cursos do backend via Inertia
    },
    components: {
        InertiaLink, // Register the component
    },
};
</script>

<style scoped>
/* Estilos adicionais */
table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

a {
    display: inline-block; /* Garantir que o link tenha área clicável */
}
</style>
