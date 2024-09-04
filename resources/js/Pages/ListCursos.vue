<template>
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px;">
        <div style="width: 100%; max-width: 1000px; background-color: white; padding: 40px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
            <h1 style="text-align: center; font-size: 28px; font-weight: 600; color: #333333; margin-bottom: 24px;">Nossos cursos</h1>

            <table style="width: 100%; border-collapse: collapse; background-color: white; border: 1px solid #ddd;">
                <thead>
                    <tr style="background-color: #f7f7f7; text-align: left;">
                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">Curso</th>
                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">Descrição</th>
                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">Ações</th>
                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="course in courses" :key="course.id" style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px;">{{ course.name }}</td>
                        <td style="padding: 12px;">{{ course.description }}</td>
                        <td style="padding: 12px;">
                            <a
                                v-if="course.path_curso"
                                :href="`/course/show/pdf/${course.id}`"
                                target="_blank"
                                style="color: #4299e1; text-decoration: underline;"
                            >
                                View PDF
                            </a>
                            <span v-else style="color: #999999;">Nenhum PDF selecionado</span>
                        </td>
                        <td style="padding: 12px;">
                            <inertia-link
                                :href="`/course-update/${course.id}`"
                                style="color: #4299e1; text-decoration: underline;"
                            >
                                Editar
                            </inertia-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { Link as InertiaLink } from '@inertiajs/inertia-vue3';

export default {
    props: {
        courses: Array,
    },
    components: {
        InertiaLink,
    },
};
</script>

<style scoped>

table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

a {
    color: #4299e1;
    text-decoration: underline;
    cursor: pointer;
}

a:hover {
    color: #3182ce;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

thead th {
    background-color: #f7f7f7;
    font-weight: 600;
}
</style>
