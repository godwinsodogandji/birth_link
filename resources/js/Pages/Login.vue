<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-50 bg-login">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg transition-transform transform hover:scale-105">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Se connecter</h1>
            <form @submit.prevent="submit" class="space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Pseudo</label>
                    <input
                        v-model="form.username"
                        type="text"
                        id="username"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-red-400 focus:border-red-500 transition duration-150 ease-in-out"
                        required
                    />
                    <span v-if="errors.username" class="text-red-500 text-sm">{{ errors.username }}</span>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input
                        v-model="form.password"
                        type="password"
                        id="password"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-red-400 focus:border-red-500 transition duration-150 ease-in-out"
                        required
                    />
                    <span v-if="errors.password" class="text-red-500 text-sm">{{ errors.password }}</span>
                </div>

                <button
                    type="submit"
                    class="w-full bg-red-400 text-white py-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-150 ease-in-out"
                >
                    Se connecter
                </button>
            </form>
            <p class="text-center mt-4 text-gray-600">
                Vous n'avez pas de compte ? <a href="/register" class="text-red-500 hover:underline">Inscrivez-vous</a>
            </p>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const form = ref({
    username: '',
    password: '',
});

const errors = ref({});

const submit = () => {
    console.log('Formulaire soumis:', form.value);
    Inertia.post('/login', form.value, {
        onError: (error) => {
            // Vérifiez si l'erreur contient un message d'authentification
            if (error.username) {
                errors.value.username = error.username;
            } else {
                errors.value = error; 
            }
        },
        onSuccess: () => {
            console.log('Connexion réussie, redirection vers le dashboard');
        },
    });
};
</script>

<style scoped>
.bg-login {
    background-image: url('/animations/image.jfif');
    background-size: cover;
    background-position: center;
}
</style>
