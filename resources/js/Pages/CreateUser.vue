<template>
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div style="width: 100%; max-width: 400px; background-color: #1a1a1a; padding: 80px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
            <h1 style="text-align: center; font-size: 24px; font-weight: 600; color: white; margin-bottom: 24px;">Crie sua conta</h1>

            <form @submit.prevent="submit" style="display: flex; flex-direction: column; gap: 16px;">
                <div>
                    <input
                        v-model="form.name"
                        type="text"
                        id="name"
                        placeholder="Nome"
                        style="width: 90%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #2a2a2a; color: white; box-shadow: none; outline: none; transition: border-color 0.3s ease, box-shadow 0.3s ease;"
                        @focus="handleFocus"
                        @blur="handleBlur"
                    />
                    <span v-if="errors.name" style="color: red; font-size: 12px;">{{ errors.name }}</span>
                </div>

                <div>
                    <input
                        v-model="form.email"
                        type="email"
                        id="email"
                        placeholder="Email"
                        style="width: 90%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #2a2a2a; color: white; box-shadow: none; outline: none; transition: border-color 0.3s ease, box-shadow 0.3s ease;"
                        @focus="handleFocus"
                        @blur="handleBlur"
                    />
                    <span v-if="errors.email" style="color: red; font-size: 12px;">{{ errors.email }}</span>
                </div>

                <div>
                    <input
                        v-model="form.password"
                        type="password"
                        id="password"
                        placeholder="Senha"
                        style="width: 90%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #2a2a2a; color: white; box-shadow: none; outline: none; transition: border-color 0.3s ease, box-shadow 0.3s ease;"
                        @focus="handleFocus"
                        @blur="handleBlur"
                    />
                    <span v-if="errors.password" style="color: red; font-size: 12px;">{{ errors.password }}</span>
                </div>

                <button
                    type="submit"
                    style="width: 97%; background-color: #4299e1; color: white; padding: 12px; border-radius: 8px; font-weight: 600; border: none; cursor: pointer; transition: background-color 0.3s ease, transform 0.3s ease;"
                    @mouseover="handleHover"
                    @mouseout="handleMouseOut"
                >
                    Criar Conta
                </button>

                <div v-if="successMessage" style="margin-top: 16px; text-align: center; color: green; font-weight: 500;">
                    <p>{{ successMessage }}</p>
                </div>
            </form>

            <!-- Botão para ir à tela de login -->
            <div style="margin-top: 24px; text-align: center;">
                <p style="color: white;">Já tem uma conta? <a href="/" style="color: #4299e1; text-decoration: underline;">Login</a></p>
            </div>
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

        const handleFocus = (event) => {
            event.target.style.borderColor = '#4299e1';
            event.target.style.boxShadow = '0 0 5px rgba(66, 153, 225, 0.5)';
        };

        const handleBlur = (event) => {
            event.target.style.borderColor = '#ccc';
            event.target.style.boxShadow = 'none';
        };

        const handleHover = (event) => {
            event.target.style.backgroundColor = '#3182ce';
            event.target.style.transform = 'translateY(-2px)';
        };

        const handleMouseOut = (event) => {
            event.target.style.backgroundColor = '#4299e1';
            event.target.style.transform = 'translateY(0)';
        };

        return { form, errors, successMessage, submit, handleFocus, handleBlur, handleHover, handleMouseOut };
    },
};
</script>

<style scoped>
/* Estilos inline no style dos elementos */
</style>
