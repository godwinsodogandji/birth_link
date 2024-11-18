<template>
    <div class="bg-red-100 min-h-screen">
        <Nav />
        <div class="flex flex-grow">
            <Aside /> 
            
            <div class="flex flex-col items-center justify-center w-full ">
                <form @submit.prevent="performSearch" class="max-w-md w-full mb-4 ">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input
                            v-model="searchQuery"
                            type="search"
                            id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                            placeholder="Rechercher un utilisateur..."
                            required
                        />
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Search</button>
                    </div>
                </form>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 max-w-screen-xl mx-auto">
                    <div v-for="(user, index) in filteredUsers" :key="index" class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center p-2">
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" :src="user.image" alt="User image" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ user.name }}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ user.role }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ user.promo }}</span>
                            <div class="flex mt-4 md:mt-6">
                                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Ajouter</a>
                                <a href="#" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Supprimer</a>
                            </div>
                        </div>
                    </div>
                  </div>
                  
                <div class="mt-9 flex items-center">
                    <button @click="prevPage" :disabled="currentPage === 1" class="px-4 py-2 bg-red-600 text-white rounded-l">Previous</button>
                    <span class="px-4 py-2">Page {{ currentPage }} of {{ totalPages }}</span>
                    <button @click="nextPage" :disabled="currentPage === totalPages" class="px-4 py-2 bg-red-600 text-white rounded-r">Next</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import Aside from '@/Pages/Aside.vue';
import Nav from '@/Pages/Nav.vue';
import { computed, ref } from 'vue';

// Exemple de données utilisateurs
const users = ref([
    { name: 'Bonnie Green', role: 'Visual Designer', image: '/images/ninho.jpg', promo: 'Promo1' },
    { name: 'John Doe', role: 'Web Developer', image: '/images/ninho.jpg', promo: 'Promo2' },
    { name: 'Jane Smith', role: 'Product Manager', image: '/images/ninho.jpg', promo: 'Promo3' },
    { name: 'Alice Johnson', role: 'UX Designer', image: '/images/ninho.jpg', promo: 'Promo4' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6' },
    // Ajoutez plus d'utilisateurs si nécessaire
]);

const itemsPerPage = 3;
const currentPage = ref(1);
const dropdownIndex = ref(-1);

const searchQuery = ref('');


const filteredUsers = computed(() => {
    const lowerCaseQuery = searchQuery.value.toLowerCase();
    return users.value.filter(user => {
        return user.name.toLowerCase().includes(lowerCaseQuery) ||
            user.role.toLowerCase().includes(lowerCaseQuery) ||
            user.promo.toLowerCase().includes(lowerCaseQuery);
    });
});

const totalPages = computed(() => Math.ceil(users.value.length / itemsPerPage));

const paginatedUsers = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    return users.value.slice(start, start + itemsPerPage);
});

const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
};

const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};


</script>

<style>
body {
    font-family: 'Inter', sans-serif;
}
</style>