<template>
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div style="width: 100%; max-width: 400px; background-color: white; padding: 80px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
            <h1 style="text-align: center; font-size: 24px; font-weight: 600; color: black; margin-bottom: 24px;">Login</h1>

            <form @submit.prevent="submit" style="display: flex; flex-direction: column; gap: 16px;">
                <div>
                    <input
                        v-model="form.email"
                        type="email"
                        id="email"
                        placeholder="Email"
                        style="width: 90%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #f7f7f7; color: black; box-shadow: none; outline: none; transition: border-color 0.3s ease, box-shadow 0.3s ease;"
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
                        style="width: 90%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #f7f7f7; color: black; box-shadow: none; outline: none; transition: border-color 0.3s ease, box-shadow 0.3s ease;"
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
                    LOGIN
                </button>

                <div v-if="successMessage" style="margin-top: 16px; text-align: center; color: green; font-weight: 500;">
                    <p>{{ successMessage }}</p>
                </div>
            </form>

            <div style="margin-top: 16px; text-align: center;">
                <p style="font-size: 14px; color: gray;">Cadastre-se <a href="/create-user" style="color: #4299e1; text-decoration: underline;">conta</a></p>
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
            email: '',
            password: '',
        });
        const errors = ref({});
        const successMessage = ref('');

        const submit = () => {
            Inertia.post('authentications/login', form.value, {
                onError: (error) => {
                    errors.value = error;
                },
                onSuccess: () => {
                    successMessage.value = 'Login realizado com sucesso!';
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
