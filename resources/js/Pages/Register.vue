<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg transition-transform transform hover:scale-105">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Créer un compte</h1>
            <form @submit.prevent="submit" class="space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Pseudo</label>
                    <input
                        v-model="form.username"
                        type="text"
                        id="username"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                        required
                    />
                    <span v-if="errors.username" class="text-red-500 text-sm">{{ errors.username }}</span>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        v-model="form.email"
                        type="email"
                        id="email"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                        required
                    />
                    <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</span>
                </div>



                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out"
                >
                    S'inscrire
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const form = ref({
    username: '',
    email: '',
});

const errors = ref({});

const submit = () => {
    console.log(form.value);
    Inertia.post('/register', form.value, {
        onError: (error) => {
            // Gérer les erreurs renvoyées par le serveur
            errors.value = error;
        },
        onSuccess: () => {
            // Gérer le succès de la requête
            console.log('Inscription réussie');


        }

    });
};
</script>

<style scoped>
</style>
