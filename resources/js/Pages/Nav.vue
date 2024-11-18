<template>
  <div>
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
      <div class="flex items-center">
        <i class="fas fa-birthday-cake text-red-500 text-3xl mr-2"></i>
        <h1 class="text-2xl font-bold text-red-700">Anniversaire Dashboard</h1>
      </div>

      <nav class="flex items-center space-x-4">
        <div class="relative group">
          <button
            class="flex items-center text-gray-700 hover:text-red-500 transition duration-300 focus:outline-none"
            @click="toggleNotifications"
          >
            <i class="fas fa-bell text-2xl mr-2"></i>
          </button>
          <div v-if="showNotifications" class="absolute right-0 mt-2 w-64 bg-white border rounded shadow-lg">
            <div class="p-4">
              <p class="text-gray-700 font-semibold">Notifications</p>
              <ul>
                <li v-for="(notification, index) in notifications" :key="index" class="mt-2 border border-red">
                  <a 
                    href="#" 
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-100"
                    @click.prevent="showNotification(notification)"
                  >
                    {{ notification }}
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="relative group">
          <button
            class="flex items-center text-gray-700 hover:text-red-500 transition duration-300 focus:outline-none"
            @click="toggleProfileMenu"
          >
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

    <div class="main-content">
      <div class="notification-container" v-if="currentNotification">
        <notification-component 
          @close="currentNotification = null" 
          :is-visible="currentNotification !== null"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import NotificationComponent from './BirthdayReminber.vue';

const showNotifications = ref(false);
const showProfileMenu = ref(false);
const currentNotification = ref(null);

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

const showNotification = (notification) => {
  currentNotification.value = notification;
};
</script>

<style scoped>
.main-content {
  position: relative;
  padding: 20px;
}

.notification-container {
  position: absolute;
  top: 60px; /* Ajustez en fonction de votre header */
  right: 20px; /* Positionne le composant à droite */
  width: 300px; /* Largeur du composant de notification */
  z-index: 1000; /* S'assurer qu'il est au-dessus d'autres éléments */
}
</style>