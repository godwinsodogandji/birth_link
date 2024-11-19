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
        <button @click="closeUploadModal" class="bg-gray-500 text-white py-2 px-4 rounded mt-4 w-full">Fermer</button>
      </div>
    </div>

    <div class="space-y-6 mr-20">
    
    </div>

    <!-- Conteneur pour les cartes -->
    <section id="sessioncard" class="grid grid-cols-4 gap-8 mt-6">
      <div v-for="card in paginatedCards" :key="card.id" class="card-container">
        <img
          :src="`http://127.0.0.1:8000/${card.image_path}`"
          alt="Image de la carte"
          class="rounded shadow-md w-full h-60 object-cover cursor-pointer"
          @click="openCardModal(card)"
        />
        <p class="text-black text-center mt-4">{{ card.description }}</p>
      </div>
      <!-- Pagination -->
    <div class="flex justify-center items-center space-x-4 mt-6">
      <button @click="changePage('prev')" :disabled="currentPage === 1" class="bg-[#a35d71] text-white py-2 px-3 rounded disabled:opacity-50">
        Précédent
      </button>
      <span class="text-lg font-semibold">{{ currentPage }} / {{ totalPages }}</span>
      <button @click="changePage('next')" :disabled="currentPage === totalPages" class="bg-[#a35d71] text-white py-2 px-3 rounded disabled:opacity-50">
        Suivant
      </button>
      <button @click="openUploadModal" class="bg-[#a35d71] text-white py-2 px-3 rounded disabled:opacity-50">
       ajouter
      </button>
    </div>
    </section>

    

    <!-- Modale dynamique de la carte -->
    <div v-if="activeCard" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-10">
      <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 relative">
        <!-- Bouton de fermeture -->
        <button
          @click="closeCardModal"
          class="absolute top-4 right-4 h-12 w-12 bg-red-500 text-white text-2xl rounded-full flex items-center justify-center"
        >
          &times;
        </button>

        <!-- Contenu de la modale -->
        <div class="card-container flex flex-col items-center justify-center space-y-4">
          <img
            :src="`http://127.0.0.1:8000/${activeCard.image_path}`"
            alt="Image"
            class="rounded w-full h-60 object-cover mb-4"
          />
          <p class="text-center text-lg font-semibold">{{ activeCard.description }}</p>
        </div>

        <!-- Bouton d'envoi -->
        <button
          @click="sendCard(activeCard)"
          class="bg-[#a35d71] flex justify-center items-center text-white py-2 px-4 rounded hover:bg-[#a35d71] ml-[150px] w-40 m-auto"
        >
          Envoyer
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import Nav from '@/Pages/Nav.vue';
import Aside from '@/Pages/Aside.vue';
import axios from 'axios';
import { ref, computed, onMounted } from 'vue';

const cards = ref([]);
const currentPage = ref(1);
const cardsPerPage = 8;
const activeCard = ref(null);
const showModal = ref(false);
const description = ref("");
const file = ref(null);

// Fonction pour récupérer les cartes
const fetchCards = async () => {
  try {
    const response = await axios.get(route('themes-populaires'));
    if (response.data && response.data.cards) {
      cards.value = response.data.cards;
    } else {
      console.error('Structure de réponse inattendue :', response.data);
    }
  } catch (error) {
    console.error('Erreur lors de la récupération des cartes :', error);
  }
};

onMounted(() => {
  fetchCards();
});

// Pagination
const paginatedCards = computed(() => {
  const startIndex = (currentPage.value - 1) * cardsPerPage;
  const endIndex = startIndex + cardsPerPage;
  return cards.value.slice(startIndex, endIndex);
});

const totalPages = computed(() => {
  return Math.ceil(cards.value.length / cardsPerPage);
});

const changePage = (direction) => {
  if (direction === 'next' && currentPage.value < totalPages.value) {
    currentPage.value++;
  } else if (direction === 'prev' && currentPage.value > 1) {
    currentPage.value--;
  }
};

// Gestion de la modale pour l'upload
const openUploadModal = () => {
  showModal.value = true;
};

const closeUploadModal = () => {
  showModal.value = false;
  description.value = "";
  file.value = null;
};

const handleFileChange = (event) => {
  const selectedFile = event.target.files[0];
  if (selectedFile) {
    file.value = selectedFile;
  }
};

const uploadImage = async () => {
  try {
    const formData = new FormData();
    formData.append('image', file.value);
    formData.append('description', description.value);

    const response = await axios.post(route('store-theme'), formData);
    console.log(response.data); 
  } catch (error) {
    console.error('Erreur lors du téléchargement de l\'image', error);
  }
};


// Gestion de la modale pour la carte
const openCardModal = (card) => {
  activeCard.value = card;
};

const closeCardModal = () => {
  activeCard.value = null;
};

const sendCard = async (card) => {
  try {
    const response = await axios.post(route('send-card'), { card });
    console.log('Réponse après envoi:', response.data);
    closeCardModal(); // Ferme la modale après l'envoi
  } catch (error) {
    console.error('Erreur lors de l\'envoi de la carte :', error);
  }
};
</script>

<style scoped>
.card-container {
  max-width: 450px;
}
.card-container img {
  width: 1000px;
  height: 300px;
  object-fit: cover;
}
#sessioncard {
  margin-left: 250px;
}
button:focus {
  outline: none;
}

button.absolute.top-4.right-4 {
  width: 48px;
  height: 48px;
  font-size: 1.5rem;
}

.card-container.flex {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}
</style>
