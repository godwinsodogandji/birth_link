<template>
    <div class="bg-red-100 min-h-screen">

        <Nav />

        <div class="flex flex-grow ">
            <Aside></Aside>

            <div class="flex  flex-col items-center mt-5 mb-5  justify-center w-full ml-40">
                <form class="max-w-md mx-auto w-full mb-4">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input v-model="searchQuery" type="search" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                            placeholder="Rechercher un utilisateur..." required />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Search</button>
                    </div>
                </form>

                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Connaissez-vous peut-être :</h2>

                <div class="grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-4  ml-40 mb-20 gap-10 max-w mx-auto notification-page"
                    @scroll="handleScroll" ref="notificationContainer">

                    <div v-for="(user, index) in users" :key="index"
                        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-screen md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                            :src="user.image" alt="User image">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ user.name }}</h5>
                            <span class="mb-4 text-sm text-gray-500 dark:text-gray-400">{{ user.role }}</span>
                            <span class="mb-4 text-sm text-gray-500 dark:text-gray-400">{{ user.promo }}</span>
                            <a href="#" class="text-sm text-gray-500 dark:text-gray-400">{{ user.amiEnCommun }}</a>
                        </div>

                        <div class="flex justify-end mt-0 pt-0 mb-20 relative">
                            <button @click="toggleDropdown(index)"
                                class=" dropdown-menu inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                                type="button">
                                <span class="sr-only">Open dropdown</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div v-if="user.isDropdownOpen"
                                class="absolute right-0 z-10 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2" aria-labelledby="dropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Ajouter</a>
                                    </li>

                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Supprimer</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Nav from '@/Pages/Nav.vue'
import Aside from '@/Pages/Aside.vue';
import { ref, computed, reactive, onMounted, onBeforeUnmount } from 'vue';

// État pour le dropdown
const isDropdownOpen = ref(false);

// Fonction pour basculer l'état du dropdown
// const toggleDropdown = () => {
//     isDropdownOpen.value = !isDropdownOpen.value;
// };

// Fonction pour basculer l'état du dropdown pour un utilisateur spécifique
// Fonction pour basculer l'état du dropdown pour un utilisateur spécifique
const toggleDropdown = (index) => {
    // Si le dropdown de l'utilisateur cliqué est déjà ouvert, on le ferme
    if (users[index].isDropdownOpen) {
        users[index].isDropdownOpen = false;
    } else {
        // Sinon, on ferme tous les autres dropdowns
        users.forEach((user) => {
            user.isDropdownOpen = false;
        });
        // Et on ouvre le dropdown de l'utilisateur cliqué
        users[index].isDropdownOpen = true;
    }
};

// const closeDropdown = (event) => {
//     const dropdown = document.querySelector('.dropdown-menu');
//     if (isDropdownOpen.value && dropdown && !dropdown.contains(event.target)) {
//         isDropdownOpen.value = false;
//     }
// };

// Lifecycle hooks to handle dropdown closing
const closeDropdown = (event) => {
    users.forEach(user => {
        const dropdown = document.querySelector('.dropdown-menu');
        if (user.isDropdownOpen && dropdown && !dropdown.contains(event.target)) {
            user.isDropdownOpen = false;
        }
    });
};

// Add event listener when component is mounted
onMounted(() => {
    document.addEventListener('click', closeDropdown);
});

// Remove event listener when component is unmounted
onBeforeUnmount(() => {
    document.removeEventListener('click', closeDropdown);
});

const users = reactive([
    { name: 'Bonnie Green', role: 'Visual Designer', image: '/images/ninho.jpg', promo: 'Promo1', amiEnCommun: '1 amis(e) en commun' },
    { name: 'John Doe', role: 'Web Developer', image: '/images/ninho.jpg', promo: 'Promo2', amiEnCommun: '2 amis(e) en commun' },
    { name: 'Jane Smith', role: 'Product Manager', image: '/images/ninho.jpg', promo: 'Promo3', amiEnCommun: '3 amis(e) en commun' },
    { name: 'Alice Johnson', role: 'UX Designer', image: '/images/ninho.jpg', promo: 'Promo4', amiEnCommun: '4 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
    { name: 'Charlie Black', role: 'Data Analyst', image: '/images/ninho.jpg', promo: 'Promo6', amiEnCommun: '6 amis(e) en commun' },
    { name: 'Bob Brown', role: 'Marketing Specialist', image: '/images/ninho.jpg', promo: 'Promo5', amiEnCommun: '5 amis(e) en commun' },
]);

const itemsPerPage = 3;
const searchQuery = ref('');

const filteredUsers = computed(() => {
    const lowerCaseQuery = searchQuery.value.toLowerCase();
    return users.value.filter(user => {
        return user.name.toLowerCase().includes(lowerCaseQuery) ||
            user.role.toLowerCase().includes(lowerCaseQuery) ||
            user.promo.toLowerCase().includes(lowerCaseQuery);
    });
});
const visibleNotifications = ref(users.slice(0, 5));
const loading = ref(false);
const notificationContainer = ref(null);

// Fonction pour charger plus de notifications
function loadMoreNotifications() {
    if (loading.value || visibleNotifications.value.length >= users.length) return;
    loading.value = true;

    setTimeout(() => {
        const currentLength = visibleNotifications.value.length;
        const nextNotifications = users.slice(currentLength, currentLength + 5);
        visibleNotifications.value.push(...nextNotifications);
        loading.value = false;
    }, 2000);
}

// Fonction pour gérer le défilement
function handleScroll() {
    const { scrollTop, clientHeight, scrollHeight } = notificationContainer.value;
    if (scrollTop + clientHeight >= scrollHeight - 5) {
        loadMoreNotifications();
    }
}

</script>

<style>
body {
    font-family: 'Inter', sans-serif;
}

body {
    font-family: 'Inter', sans-serif;
}

.notification-page {

    box-shadow: 0 4px 30px rgba(243, 122, 122, 0.1);

    animation: fadeIn 0.5s ease;
    height: 600px;
    overflow-y: scroll;
    scrollbar-width: thin;
    scrollbar-color: transparent transparent;
}


.notification-page::-webkit-scrollbar {
    width: 0px;
    height: 0px;
}

.notification-page::-webkit-scrollbar-track {
    background: transparent;
}

.notification-page::-webkit-scrollbar-thumb {
    background: transparent;
}

.loading {
    text-align: center;
    padding: 10px;
    color: #666;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}
</style>