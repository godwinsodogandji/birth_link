<template>
  <div class="notification-page" @scroll="handleScroll" ref="notificationContainer">
    <header class="flex justify-between items-center mb-4">
      <h1 class="text-xl font-bold">Vos Notifications</h1>
      <button @click="fermerComposant" class="focus:outline-none">
        <i class="fas fa-times text-red-500 text-2xl hover:text-red-700 transition duration-300"></i>
      </button>
    </header>

    <div class="notification-list">
      <div class="notification-item" v-for="notification in visibleNotifications" :key="notification.id">
        <div class="notification-profile">
          <div class="profile-icon" :style="{ backgroundColor: getProfileColor(notification.name) }">
            {{ getInitials(notification.name) }}
          </div>
        </div>
        <div class="notification-details">
          <h3>{{ notification.name }}</h3>
          <p>{{ notification.message }}</p>
          <p class="notification-date">{{ notification.date }}</p>
        </div>
        <button @click="removeNotification(notification.id)" class="close-btn">
          <i class="fas fa-times"></i>
        </button>
      </div>

      <div v-if="loading" class="loading">Chargement... Patientez svp!</div>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref, defineEmits } from 'vue';

// Émettre des événements vers le parent
const emit = defineEmits();

// État de visibilité
const isVisible = ref(true);

// Notifications initiales
const allNotifications = reactive([
  { id: 1, name: 'Henry Paulista', message: "C'est son anniversaire aujourd'hui !", date: "Aujourd'hui" },
  { id: 2, name: 'Evan Jefferson', message: 'Son anniversaire est le 16 novembre.', date: '16 novembre' },
  { id: 3, name: 'Mark Thomson', message: 'Son anniversaire est le 22 décembre.', date: '22 décembre' },
  { id: 4, name: 'Alice McKenzie', message: 'Son anniversaire est le 5 janvier.', date: '5 janvier' },
  { id: 5, name: 'Jack Hu', message: 'Son anniversaire est le 18 février.', date: '18 février' },
  { id: 6, name: 'Anastasia Grette', message: 'Son anniversaire est le 30 mars.', date: '30 mars' },
  { id: 7, name: 'John Doe', message: 'Son anniversaire est le 1 avril.', date: '1 avril' },
  { id: 8, name: 'Jane Smith', message: 'Son anniversaire est le 10 mai.', date: '10 mai' },
  { id: 9, name: 'Sam Brown', message: 'Son anniversaire est le 20 juin.', date: '20 juin' },
  { id: 10, name: 'Lucy Green', message: 'Son anniversaire est le 25 juillet.', date: '25 juillet' },
  { id: 11, name: 'Tom White', message: 'Son anniversaire est le 15 août.', date: '15 août' },
  { id: 12, name: 'Emily Black', message: 'Son anniversaire est le 30 septembre.', date: '30 septembre' },
]);

const visibleNotifications = ref(allNotifications.slice(0, 5));
const loading = ref(false);
const notificationContainer = ref(null);

// Fonction pour charger plus de notifications
function loadMoreNotifications() {
  if (loading.value || visibleNotifications.value.length >= allNotifications.length) return;
  loading.value = true;

  setTimeout(() => {
    const currentLength = visibleNotifications.value.length;
    const nextNotifications = allNotifications.slice(currentLength, currentLength + 5);
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

// Fonction pour récupérer les initiales d'un nom
function getInitials(name) {
  const parts = name.split(' ');
  return parts.map(part => part.charAt(0).toUpperCase()).join('');
}

// Fonction pour générer une couleur de profil
function getProfileColor(name) {
  const colors = ['#6C63FF', '#FF6F61', '#6B5B95', '#88B04B', '#F7CAC9', '#92A8D1'];
  const hash = name.charCodeAt(0) % colors.length;
  return colors[hash];
}

// Fonction pour fermer le composant
function fermerComposant() {
  isVisible.value = false; // Masquer le composant
  emit('close'); // Émettre l'événement pour informer le parent
}

// Fonction pour fermer une notification
function removeNotification(id) {
  const index = visibleNotifications.value.findIndex(notification => notification.id === id);
  if (index !== -1) {
    visibleNotifications.value.splice(index, 1); 
  }
}
</script>

<style scoped>
.notification-page {
  max-width: 500px;
  margin: 80px auto;
  background-color: rgba(255, 105, 180, 0.8); /* Couleur rose avec opacité */
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  padding: 20px;
  border-radius: 10px;
  animation: fadeIn 0.5s ease;
  height: 600px; /* Hauteur fixe pour permettre le défilement */
  overflow-y: scroll; /* Défilement vertical activé */
  scrollbar-width: thin; /* Pour Firefox, barre de défilement mince */
  scrollbar-color: transparent transparent; /* Barre transparente */
}



/* Pour les navigateurs Webkit comme Chrome et Safari */
.notification-page::-webkit-scrollbar {
  width: 0px; /* Masquer la barre de défilement */
  height: 0px; /* Masquer la barre horizontale, si présente */
}

.notification-page::-webkit-scrollbar-track {
  background: transparent; /* Couleur de la piste de la barre de défilement */
}

.notification-page::-webkit-scrollbar-thumb {
  background: transparent; /* Couleur du pouce de la barre de défilement */
}

.notification-list {
  max-height: 100%; /* Limiter la hauteur de la liste */
}

.notification-item {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
  padding: 10px;
  border-radius: 8px;
  background-color: #f9f9f9;
  transition: background-color 0.3s;
  position: relative;
}

.notification-item:hover {
  background-color: #f1f1f1;
}

.notification-profile {
  margin-right: 15px;
}

.profile-icon {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  color: white;
  font-size: 18px;
  font-weight: bold;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.notification-details h3 {
  margin: 0;
  font-size: 16px;
  color: #333;
}

.notification-details p {
  margin: 5px 0 0;
  color: #666;
}

.notification-date {
  font-size: 12px;
  color: #999;
}

.close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  background: none;
  border: none;
  color: #888;
  font-size: 18px;
  cursor: pointer;
}

.close-btn:hover {
  color: #f44336; /* Couleur rouge au survol */
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