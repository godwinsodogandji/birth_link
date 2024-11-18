<template>
  
  <div class="flex items-center justify-center min-h-screen p-6 bg-red-100">
    <!-- Sidebar pour les boutons -->
    <div class="space-y-6 mr-20">
      <button @click="showCard(1)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150 transition block border border-black">Carte de voeux n°1</button>
      <button @click="showCard(2)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150 transition block">Carte de voeux n°2</button>
      <button @click="showCard(3)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150 transition block">Carte de voeux n°3</button>
      <button @click="showCard(4)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150 transition block">Carte de voeux n°4</button>
      <button @click="showCard(5)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150 transition block">Carte de voeux n°5</button>
      <button @click="showCard(6)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150 transition block">Carte de voeux n°6</button>
      <button @click="openModal" class="bg-green-500 text-white py-2 px-4 rounded mt-6 mx-auto block hover:bg-green-600 transition">
 Cliquer pour ajouter une carte
</button>
    </div>
  </div>

    <!-- Modal d'envoi  d'image dans la db-->
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
    <div v-for="cardId in [1, 2, 3, 4, 5, 6]" :key="cardId" 
      :id="'card-' + cardId"
      :class="['card', { 'hidden': activeCard !== cardId }]"
      :style="{ display: activeCard === cardId ? 'block' : 'none' }" 
      class="p-6 rounded-lg shadow-md text-center flex items-center justify-center flex-col bg-cover bg-no-repeat bg-center relative">
      
      <!-- Carte dynamique -->
      <div :style="{ backgroundImage: 'url(' + cardImage[cardId] + ')' }"
        class="card p-6 mt-25 rounded-lg shadow-md text-center flex items-center justify-center flex-col bg-cover bg-no-repeat bg-center relative"
        style="width: 700px; max-width: 100%; height: 500px;">
        
        <!-- Contenu spécifique de chaque carte -->
        <div v-if="cardId === 1" class="shadow-lg p-6 rounded-full mt-20 " style="background-color:#FEBFD2;">
          <p class="text-black font-semibold text-xl">Joyeux anniversaire !</p>
          <p class="text-black font-semibold text-xl">Que cette année t'apporte</p>
          <p class="text-black font-semibold text-xl">bonheur et succès.</p>
        </div>

     
        <!-- <p v-if="cardId === 2" class="text-black font-bold text-lg">Joyeux anniversaire!</p>
        <p v-if="cardId === 2" class="text-black font-semibold text-xl">Félicitations pour cette nouvelle année de vie.</p>
        <p v-if="cardId === 2" class="text-black font-normal text-base">Que tous tes rêves deviennent réalité !</p> -->

        <div v-if="cardId === 3" class="shadow-lg p-6 rounded-full mt-20 bg-white">
          <p class="text-black font-semibold text-xl">Que ton anniversaire</p>
          <p class="text-black font-semibold text-xl">soit rempli de rires</p>
          <p class="text-black font-semibold text-xl">et de moments précieux.</p>
          <p class="text-black font-semibold text-xl">Heureux jour!!</p>
        </div>

        <div v-if="cardId === 4" class="p-6 mt-40">
          <p class="text-black font-semibold text-xl">Bon anniversaire !</p>
          <p class="text-black font-semibold text-xl">Que la joie et la réussite</p>
          <p class="text-black font-semibold text-xl">t'accompagnent tout au long</p>
          <p class="text-black font-semibold text-xl">de l'année à venir.</p>
        </div>

        <div v-if="cardId === 5" class="p-6 mb-15">
          <p class="text-black font-semibold text-2xl">Tous mes vœux de bonheur</p>
          <p class="text-black font-semibold text-2xl">pour cette journée spéciale.</p>
          <p class="text-black font-semibold text-2xl">Que l'amour et la chance</p>
          <p class="text-black font-semibold text-2xl">soient avec toi !</p>
        </div>

        <div v-if="cardId === 6" class="bg-white w-60 h-60 rounded-full items-center justify-center text-black">
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
import { ref } from 'vue';

const activeCard = ref(null);
const showModal = ref(false);
const selectedFile = ref(null);
const description = ref('');
const cardImage = {
  1: '/images/carte1copie.jpg',
  2: '/images/carte2copie.png',
  3: '/images/carte3copie.png',
  4: '/images/carte4copie.png',
  5: '/images/carte5copie.png',
  6: '/images/carte6copie.png',
  7: '/images/carte7copie.png',
  8: '/images/carte8copie.png'
};

function showCard(cardId) {
  activeCard.value = cardId;
}

// Ouvrir le modal
function openModal() {
  showModal.value = true;
}

// Fermer le modal
function closeModal() {
  showModal.value = false;
}


// Gérer le changement de fichier
function handleFileChange(event) {
  const file = event.target.files[0];
  if (file) {
    selectedFile.value = file;
  }
}


// Envoi de l'image avec la description vers le backend Laravel
function uploadImage() {
  if (selectedFile.value && description.value) {
    const formData = new FormData();
    formData.append('image', selectedFile.value);
    formData.append('description', description.value);

    axios.post(route('store-theme'), formData)
      .then(response => {
        console.log('Image envoyée avec succès', response);
        closeModal();  // Fermer le modal après l'envoi
      })
      .catch(error => {
        console.error('Erreur lors de l\'envoi de l\'image', error);
      });
  } else {
    alert('Veuillez sélectionner une image et entrer une description.');
  }
}
</script>

<style scoped>
.card {
  max-width: 250px;
}
</style>
