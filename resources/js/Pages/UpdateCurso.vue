<template>
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px;">
        <div style="width: 100%; max-width: 1000px; background-color: white; padding: 40px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
            <h1 style="text-align: center; font-size: 28px; font-weight: 600; color: #333333; margin-bottom: 24px;">Atualizar curso</h1>

            <form @submit.prevent="submit" style="display: flex; flex-direction: column; gap: 16px;">
                <div>
                    <label for="name" style="display: block; font-size: 16px; color: #333333; margin-bottom: 8px;">Curso:</label>
                    <input
                        v-model="form.name"
                        type="text"
                        id="name"
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #f7f7f7; box-shadow: none; outline: none; transition: border-color 0.3s ease, box-shadow 0.3s ease;"
                        placeholder="Nome do curso"
                        @focus="handleFocus"
                        @blur="handleBlur"
                    />
                    <span v-if="errors.name" style="color: red; font-size: 12px;">{{ errors.name }}</span>
                </div>
                <div>
                    <label for="description" style="display: block; font-size: 16px; color: #333333; margin-bottom: 8px;">Descrição:</label>
                    <textarea
                        v-model="form.description"
                        id="description"
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #f7f7f7; box-shadow: none; outline: none; transition: border-color 0.3s ease, box-shadow 0.3s ease;"
                        placeholder="Insira a descrição do curso"
                        @focus="handleFocus"
                        @blur="handleBlur"
                    ></textarea>
                    <span v-if="errors.description" style="color: red; font-size: 12px;">{{ errors.description }}</span>
                </div>
                <div>
                    <label for="pdf" style="display: block; font-size: 16px; color: #333333; margin-bottom: 8px;">Atualizar PDF:</label>
                    <input
                        type="file"
                        id="pdf"
                        @change="handleFileChange"
                        style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #f7f7f7; box-shadow: none; outline: none; transition: border-color 0.3s ease;"
                        accept="application/pdf"
                    />
                    <span v-if="errors.pdf" style="color: red; font-size: 12px;">{{ errors.pdf }}</span>
                </div>
                <button
                    type="submit"
                    style="width: 100%; background-color: #4299e1; color: white; padding: 12px; border-radius: 8px; font-weight: 600; border: none; cursor: pointer; transition: background-color 0.3s ease, transform 0.3s ease;"
                    @mouseover="handleHover"
                    @mouseout="handleMouseOut"
                >
                    Atualizar
                </button>
                <div v-if="successMessage" style="margin-top: 16px; text-align: center; color: green; font-weight: 500;">
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
    props: {
        id: Number,
    },
    setup(props) {
        const form = ref({
            name: '',
            description: '',
            pdf: null,
            id: props.id,
        });

        const errors = ref({});
        const successMessage = ref('');

        const handleFileChange = (event) => {
            form.value.pdf = event.target.files[0];
        };

        const submit = () => {
            const formData = new FormData();
            formData.append('name', form.value.name);
            formData.append('description', form.value.description);
            if (form.value.pdf) {
                formData.append('pdf', form.value.pdf);
            }
            formData.append('id', form.value.id);

            Inertia.post('/course/update-course', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
                onError: (error) => {
                    errors.value = error;
                },
                onSuccess: () => {
                    successMessage.value = 'Curso atualizado com sucesso!';
                    form.value.name = '';
                    form.value.description = '';
                    form.value.pdf = null;
                },
                processData: false,
                contentType: false,
            });
        };

        return { form, errors, successMessage, submit, handleFileChange };
    },
};
</script>
