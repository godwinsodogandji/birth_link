<template>
  <div class="bg-red-100">
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
      <div class="flex items-center">
        <i class="fas fa-birthday-cake text-red-500 text-3xl mr-2"></i>
        <h1 class="text-2xl font-bold text-red-700">Anniversaire Dashboard</h1>
      </div>
      <nav class="flex items-center space-x-4">
        <div class="relative group">
          <button class="flex items-center text-gray-700 hover:text-red-500 transition duration-300 focus:outline-none" @click="toggleNotifications">
            <i class="fas fa-bell text-2xl mr-2"></i>
          </button>
          <div v-if="showNotifications" class="absolute right-0 mt-2 w-64 bg-white border rounded shadow-lg">
            <div class="p-4">
              <p class="text-gray-700 font-semibold">Notifications</p>
              <ul>
                <li v-for="(notification, index) in notifications" :key="index" class="mt-2">
                  <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="#">{{ notification }}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="relative group">
          <button class="flex items-center text-gray-700 hover:text-red-500 transition duration-300 focus:outline-none" @click="toggleProfileMenu">
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
    </header>

    <div class="flex">
      <aside class="w-64 bg-white p-4 shadow-lg">
        <button class="bg-red-500 text-white py-2 px-4 rounded mb-6 hover:bg-red-600 transition duration-300">
          Créer Nouveau
        </button>
        <nav>
          <ul>
            <li class="mb-4" v-for="(menuItem, index) in sidebarItems" :key="index">
              <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
                <i :class="menuItem.iconClass" class="mr-2"></i>
                {{ menuItem.label }}
              </a>
              <ul class="ml-6 mt-2">
                <li v-for="(subItem, subIndex) in menuItem.subItems" :key="subIndex" class="mb-2">
                  <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">{{ subItem }}</a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </aside>

      <main class="flex-1 p-6">
        <section class="mb-6">
          <div class="flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg text-center animate-bounce-slow">
              <h1 class="text-4xl font-bold text-red-500 mb-4">Joyeux Anniversaire!</h1>
              <p class="text-gray-700 mb-4">Nous vous souhaitons une journée remplie de joie et de bonheur.</p>
              <img alt="Image d'anniversaire" class="mx-auto mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/Xfft1a2Whyvl0UqS8WYqTL02ogoo3pmuJM7xu4KXreoN5yhnA.jpg" width="200"/>
              <button class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300">Merci!</button>
            </div>
          </div>
        </section>

        <section class="mb-6">
          <h2 class="text-2xl font-semibold mb-4 text-red-700">Accès Rapide</h2>
          <div class="grid grid-cols-3 gap-4">
            <div v-for="(item, index) in quickAccessItems" :key="index" class="bg-red-100 p-4 rounded flex items-center shadow-md">
              <i :class="item.iconClass" class="text-2xl mr-4"></i>
              <div>
                <p class="text-red-500 font-semibold">{{ item.title }}</p>
                <p class="text-gray-500">{{ item.count }} événements</p>
              </div>
            </div>
          </div>
        </section>

        <section class="mb-6">
          <h2 class="text-2xl font-semibold mb-4 text-red-700">Dossiers</h2>
          <div class="grid grid-cols-4 gap-4">
            <div v-for="(folder, index) in folders" :key="index" class="bg-white p-4 rounded flex items-center shadow-md">
              <i :class="folder.iconClass" class="text-2xl mr-4"></i>
              <div>
                <p class="text-gray-700 font-semibold">{{ folder.title }}</p>
                <p class="text-gray-500">{{ folder.count }} événements</p>
              </div>
            </div>
          </div>
        </section>

        <section>
          <h2 class="text-2xl font-semibold mb-4 text-red-700">Anniversaires Récents</h2>
          <div class="bg-white p-4 rounded shadow-md">
            <div class="flex items-center mb-4">
              <i class="fas fa-birthday-cake text-red-500 text-2xl mr-4"></i>
              <div class="flex-1">
                <p class="text-gray-700 font-semibold">Anniversaire de Jean</p>
                <p class="text-gray-500">Nov 11, 2021 | 12:54</p>
              </div>
              <p class="text-gray-500">Seulement vous</p>
            </div>
          </div>
        </section>
      </main>
    </div>
  </div>
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

const sidebarItems = [
  { label: 'Anniversaires', iconClass: 'fas fa-birthday-cake', subItems: ['Prochains', 'Passés'] },
  { label: 'Amis', iconClass: 'fas fa-users', subItems: ['Liste d\'Amis', 'Invitations'] },
  { label: 'Thèmes', iconClass: 'fas fa-palette', subItems: ['Thèmes Populaires', 'Personnalisés'] },
  { label: 'Vœux', iconClass: 'fas fa-envelope', subItems: ['Envoyés', 'Reçus'] },
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
  0%, 100% {
    transform: translateY(-25%);
    animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
  }
  50% {
    transform: translateY(0);
    animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
  }
}
</style>
