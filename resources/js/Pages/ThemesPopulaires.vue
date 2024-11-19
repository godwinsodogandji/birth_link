<template>
  <Nav />
  <Aside /> 
 
  <div class="flex items-center justify-center min-h-screen p-6 bg-red-100">
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
    <section id="sessioncard" class="grid grid-cols-4 gap-8  mt-6">
      
      <!-- Boucle sur les cartes -->
      <div v-for="card in paginatedCards" :key="card.id" class="card-container">
        <!-- Affiche l'image -->
        <img :src="`http://127.0.0.1:8000/${card.image_path}`"
        alt="Image de la carte" class="rounded shadow-md w-full h-60 object-cover" />
        <!-- Affiche la description -->
        <p class="text-black text-center mt-4">{{ card.description }}</p>
      </div>
      <div class="flex justify-center space-x-4 mt-6">
      <button
        @click="changePage('prev')"
        :disabled="currentPage === 1"
        class="bg-blue-500 text-white flex items-center justify-center py-2 px-4 rounded disabled:opacity-50"
      >
        Précédent
      </button>
      <span class="text-lg font-semibold">{{ currentPage }} / {{ totalPages }}</span>
      <button
        @click="changePage('next')"
        :disabled="currentPage === totalPages"
        class="bg-blue-500 text-white py-2 px-4 rounded disabled:opacity-50"
      >
        Suivant
      </button>
    </div>
    </section>

    <!-- Pagination -->
   
  </div>
</template>

<script setup>
import Nav from '@/Pages/Nav.vue';
import Aside from '@/Pages/Aside.vue';

import axios from 'axios';
import { onMounted, ref, computed } from 'vue';

const activeCard = ref(null);
const showModal = ref(false);
const selectedFile = ref(null);
const description = ref('');
const cards = ref([]);
const currentPage = ref(1);
const cardsPerPage = 8;

// Fonction pour récupérer les cartes
const fetchCards = async () => {
  try {
    const response = await axios.get(route('themes-populaires'));
    if (response.data && response.data.cards) {
      cards.value = response.data.cards;
    } else {
      console.error("Structure de réponse inattendue :", response.data);
    }
  } catch (error) {
    console.error("Erreur lors de la récupération des cartes :", error);
  }
};

onMounted(() => {
  fetchCards();
});

// Fonction pour changer de page
const changePage = (direction) => {
  if (direction === 'next' && currentPage.value < totalPages.value) {
    currentPage.value++;
  } else if (direction === 'prev' && currentPage.value > 1) {
    currentPage.value--;
  }
};

// Calcul des cartes paginées
const paginatedCards = computed(() => {
  const startIndex = (currentPage.value - 1) * cardsPerPage;
  const endIndex = startIndex + cardsPerPage;
  return cards.value.slice(startIndex, endIndex);
});

// Calcul du nombre total de pages
const totalPages = computed(() => {
  return Math.ceil(cards.value.length / cardsPerPage);
});

// Modal functions
const openModal = () => {
  showModal.value = true;
};

const closeModal = () => {
  showModal.value = false;
  selectedFile.value = null;
  description.value = '';
};

const handleFileChange = (event) => {
  selectedFile.value = event.target.files[0];
};

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
    closeModal(); // Fermer le modal
  } catch (error) {
    console.error("Erreur lors de l'upload de l'image:", error);
  }
};
</script>

<style scoped>
.card-container {
  max-width: 300px;
}
.card-container img {
  width: 2000px;
  height: 300px;
  object-fit: cover;
}
#sessioncard{
  margin-left: 250px;
}
</style>
