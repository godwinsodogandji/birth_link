<template>
  <Nav />

  <!-- Sidebar avec bouton pour ajouter une carte -->
  <div class="flex items-center justify-center min-h-screen p-6 bg-red-100">
    <div class="space-y-6 mr-20">
      <button @click="openModal" class="bg-green-500 text-white py-2 px-4 rounded mt-6 mx-auto block hover:bg-green-600 transition">
        Cliquer pour ajouter une carte
      </button>
    </div>
  </div>

  <!-- Modal d'envoi d'image dans la DB -->
  <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-10">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/2">
      <h3 class="text-center font-semibold text-xl mb-4">Upload Image</h3>
      <input type="file" @change="handleFileChange" class="w-full mb-4" />
      <textarea v-model="description" placeholder="Entrez une description..." class="w-full mb-4 p-2 border rounded"></textarea>
      <button @click="uploadImage" class="bg-blue-500 text-white py-2 px-4 rounded w-full">Envoyer l'image</button>
      <button @click="closeModal" class="bg-gray-500 text-white py-2 px-4 rounded mt-4 w-full">Fermer</button>
    </div>
  </div>

  <!-- Conteneur pour les cartes -->
  <section class="grid grid-cols-1 gap-4 ml-8">
    <!-- Boucle sur les cartes -->
    <div v-for="card in cards" :key="card.id">
      <div class="flex justify-between items-center">
        <!-- Bouton pour afficher chaque carte -->
        <button @click="showCard(card.id)" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
          Afficher la carte
        </button>
      </div>
      <!-- Afficher la carte si elle est sélectionnée -->
      <div v-if="activeCard === card.id" :key="card.id" class="card mt-6 p-6 rounded-lg shadow-md text-center flex items-center justify-center flex-col bg-cover bg-no-repeat bg-center relative" :style="{ backgroundImage: 'url(' + card.image_url + ')' }" style="width: 700px; max-width: 100%; height: 500px;">
        <!-- Contenu spécifique de chaque carte -->
        <div v-if="card.id === 1" class="shadow-lg p-6 rounded-full mt-20" style="background-color:#FEBFD2;">
          <p class="text-black font-semibold text-xl">Joyeux anniversaire !</p>
          <p class="text-black font-semibold text-xl">Que cette année t'apporte</p>
          <p class="text-black font-semibold text-xl">bonheur et succès.</p>
        </div>

        <div v-if="card.id === 3" class="shadow-lg p-6 rounded-full mt-20 bg-white">
          <p class="text-black font-semibold text-xl">Que ton anniversaire</p>
          <p class="text-black font-semibold text-xl">soit rempli de rires</p>
          <p class="text-black font-semibold text-xl">et de moments précieux.</p>
          <p class="text-black font-semibold text-xl">Heureux jour!!</p>
        </div>

        <div v-if="card.id === 4" class="p-6 mt-40">
          <p class="text-black font-semibold text-xl">Bon anniversaire !</p>
          <p class="text-black font-semibold text-xl">Que la joie et la réussite</p>
          <p class="text-black font-semibold text-xl">t'accompagnent tout au long</p>
          <p class="text-black font-semibold text-xl">de l'année à venir.</p>
        </div>

        <div v-if="card.id === 5" class="p-6 mb-15">
          <p class="text-black font-semibold text-2xl">Tous mes vœux de bonheur</p>
          <p class="text-black font-semibold text-2xl">pour cette journée spéciale.</p>
          <p class="text-black font-semibold text-2xl">Que l'amour et la chance</p>
          <p class="text-black font-semibold text-2xl">soient avec toi !</p>
        </div>

        <div v-if="card.id === 6" class="bg-white w-60 h-60 rounded-full items-center justify-center text-black">
          <p class="text-black mt-14 font-semibold text-xl">Joyeux anniversaire!</p>
          <p class="text-black font-semibold text-xl">Que cette nouvelle</p>
          <p class="text-black font-semibold text-xl">année soit encore</p>
          <p class="text-black font-semibold text-xl">meilleure que la précédente.</p>
        </div>

        <!-- Bouton d'envoi -->
        <button style="background-color: #e0115f;" class="absolute bottom-4 right-4 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Envoyer</button>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import Aside from '@/Pages/Aside.vue';
import Nav from '@/Pages/Nav.vue';

const activeCard = ref(null);
const showModal = ref(false);
const selectedFile = ref(null);
const description = ref('');
const cards = ref([]);

// Fonction pour récupérer les cartes
const fetchCards = async () => {
  try {
    const response = await axios.get('/themes-populaires');
    console.log(response.data); // Ajoutez cette ligne pour voir la réponse dans la console

    cards.value = response.data.cards;
    
  } catch (error) {
    console.error("Erreur lors de la récupération des cartes:", error);
  }
};

// Appeler la fonction pour récupérer les cartes au montage
onMounted(() => {
  fetchCards();
});

// Fonction pour ouvrir le modal
const openModal = () => {
  showModal.value = true;
};

// Fonction pour fermer le modal
const closeModal = () => {
  showModal.value = false;
  selectedFile.value = null;
  description.value = '';
};

// Fonction pour gérer le changement de fichier
const handleFileChange = (event) => {
  selectedFile.value = event.target.files[0];
};

// Fonction pour envoyer l'image et la description
const uploadImage = async () => {
  if (!selectedFile.value || !description.value) {
    alert("Veuillez remplir tous les champs.");
    return;
  }

  const formData = new FormData();
  formData.append('image', selectedFile.value);
  formData.append('description', description.value);

  try {
    const response = await axios.post('/theme-poulaires', formData, {
      headers: { 'Content-Type': 'multipart/form-data' },
    });
    fetchCards(); // Recharger les cartes
    closeModal(); // Fermer le modal
  } catch (error) {
    console.error("Erreur lors de l'upload de l'image:", error);
  }
};
const cardId = cards.id;
if (cardId) {
  axios.get(`http://127.0.0.1:8000/themes-populaires/${cardId}`);
} else {
  console.error('ID de la carte est manquant');
}

// Fonction pour afficher la carte spécifique
const showCard = (cardId) => {
  activeCard.value = cardId;
};
</script>

<style scoped>
.card {
  max-width: 250px;
}
</style>
