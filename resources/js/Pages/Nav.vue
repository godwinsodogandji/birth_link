<template>
    <her class="bg-white shadow-md p-4 flex justify-between items-center">

        <div class="flex items-center">
            <i class="fas fa-birthday-cake text-red-500 text-3xl mr-2"></i>
            <h1 class="text-2xl font-bold text-red-700">Anniversaire Dashboard</h1>
        </div>

        <nav class="flex items-center space-x-4">
            <div class="relative group">
                <button
                    class="flex items-center text-gray-700 hover:text-red-500 transition duration-300 focus:outline-none"
                    @click="toggleNotifications">
                    <i class="fas fa-bell text-2xl mr-2"></i>
                </button>
                <div v-if="showNotifications" class="absolute right-0 mt-2 w-64 bg-white border rounded shadow-lg">
                    <div class="p-4">
                        <p class="text-gray-700 font-semibold">Notifications</p>
                        <ul>
                            <li v-for="(notification, index) in notifications" :key="index" class="mt-2">
                                <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">{{ notification
                                    }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="relative group">
                <button
                    class="flex items-center text-gray-700 hover:text-red-500 transition duration-300 focus:outline-none"
                    @click="toggleProfileMenu">
                    <i class="fas fa-user-circle text-2xl mr-2"></i>
                    <span>Mon Compte</span>
                    <i class="fas fa-chevron-down ml-1"></i>
                </button>
                <div v-if="showProfileMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg">
                    <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">Profil</a>
                    <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">Paramètres</a>
                    <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">Déconnexion</a>
                </div>
            </div>
        </nav>

    </her>
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
const toggleNotifications = () => {
  showNotifications.value = !showNotifications.value;
};
const toggleProfileMenu = () => {
  showProfileMenu.value = !showProfileMenu.value;
};
</script>

<style scoped></style>