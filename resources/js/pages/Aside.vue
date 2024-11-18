<template>
    <aside class="w-64 bg-white   shadow-lg fixed top-25 left-0 z-40  h-screen transition-transform -translate-x-full sm:translate-x-0">
        <button class="bg-red-500 text-white py-2 px-4 rounded mb-6 hover:bg-red-600 transition duration-300">
            Créer Nouveau
        </button>
        <nav>
            <ul>
                <li class="mb-4">
                    <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
                        <i class="fas fa-birthday-cake mr-2">
                        </i>
                        Anniversaires
                    </a>
                    <ul class="ml-6 mt-2">
                        <li class="mb-2">
                            <a class="text-gray-500 hover:text-red-500 transition duration-300" src="" href="anniversaire-avenir">
                                Prochains
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="text-gray-500 hover:text-red-500 transition duration-300" src="" href="anniversaire-passe">
                                Passés
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
                        <i class="fas fa-users mr-2">
                        </i>
                        Amis
                    </a>
                    <ul class="ml-6 mt-2">
                        <li class="mb-2">
                            <a class="text-gray-500 hover:text-red-500 transition duration-300" href="/friends">
                                Liste d'Amis
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="text-gray-500 hover:text-red-500 transition duration-300" href="/ajoutdesamis">
                               Ajout des amis
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="text-gray-500 hover:text-red-500 transition duration-300"
                                href="/suggestion-des-amis">
                                Suggestion d'amis
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="text-gray-500 hover:text-red-500 transition duration-300"
                                href="/confirmation-des-amis">
                                Invitations
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
                        <i class="fas fa-palette mr-2">
                        </i>
                        Thèmes
                    </a>
                    <ul class="ml-6 mt-2">
                        <li class="mb-2">
                            <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
                                Thèmes Populaires
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
                                Personnalisés
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
                        <i class="fas fa-envelope mr-2">
                        </i>
                        Vœux
                    </a>
                    <ul class="ml-6 mt-2">
                        <li class="mb-2">
                            <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
                                Envoyés
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
                                Reçus
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
</template>

<script setup>
import { ref } from 'vue';
const showNotifications = ref(false);
const showProfileMenu = ref(false);

const notifications = [
    'Nouvelle invitation d\'anniversaire',
    'Rappel: Anniversaire de Jean demain',
    'Nouveau thème ajouté',
];


const quickAccessItems = [
    { title: 'Anniversaires', count: 8, iconClass: 'fas fa-birthday-cake text-red-500' },
    { title: 'Amis', count: 12, iconClass: 'fas fa-users text-blue-500' },
    { title: 'Vœux', count: 237, iconClass: 'fas fa-envelope text-green-500' },
];

const folders = [
    { title: 'Anniversaires', count: 3, iconClass: 'fas fa-birthday-cake text-red-500' },
    { title: 'Amis', count: 84, iconClass: 'fas fa-users text-red-500' },
];

const toggleNotifications = () => {
    showNotifications.value = !showNotifications.value;
};

const toggleProfileMenu = () => {
    showProfileMenu.value = !showProfileMenu.value;
};
</script>

<style scoped>
body {
    font-family: 'Inter', sans-serif;
}

.animate-bounce-slow {
    animation: bounce 2s infinite;
}

@keyframes bounce {

    0%,
    100% {
        transform: translateY(-25%);
        animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
    }

    50% {
        transform: translateY(0);
        animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
    }
}
</style>