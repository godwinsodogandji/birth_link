<template>

   
        <Nav />
        
          <Aside></Aside>
    
        
    <div class="flex items-center justify-center min-h-screen p-6 bg-gray-100">
      <!-- Sidebar for Buttons -->
      <div class="space-y-6 mr-20">
        <button
          @click="showCard(1)"
          class="bg-red-500 text-white py-2 px-4 rounded w-full hover:bg-red-600 transition"
        >
          Carte 1
        </button>
      </div>
  
      <!-- Container for Cards -->
      <section class="grid grid-cols-1 gap-4 ml-8">
        <div
          v-if="currentCard === 1"
          class="card bg-gradient-to-r from-red-500 to-red-700 p-6 rounded-lg shadow-md text-center flex items-center justify-center flex-col bg-cover"
          style="min-height: 990px; min-width: 850px;"
        >
          <textarea
            v-model="cardText"
            :readonly="!isEditing"
            class="bg-transparent text-white font-semibold text-xl text-center w-full h-full resize-none focus:outline-none"
            rows="10"
          >
          </textarea>
          <div class="mt-4 space-x-4">
            <button
              @click="editText"
              class="bg-black text-white py-2 px-4 rounded hover:bg-gray-800 transition"
            >
              Personnaliser le texte
            </button>
            <button
              @click="saveText"
              class="bg-black text-white py-2 px-4 rounded hover:bg-gray-800 transition"
            >
              Enregistrer
            </button>
            <button
              @click="sendText"
              class="bg-black text-white py-2 px-4 rounded
               hover:bg-gray-800 transition"
            >
              Envoyer
            </button>
          </div>
        </div>
      </section>
  
      <!-- Modal -->
      <div
        v-if="showModal"
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center"
      >
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
          <h2 class="text-xl font-bold mb-4">Confirmation</h2>
          <p class="mb-4">{{ modalMessage }}</p>
          <button
            @click="closeModal"
            class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition"
          >
            Fermer
          </button>
        </div>
      </div>
    </div>
     
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  // Variables réactives
  const currentCard = ref(1)
  const cardText = ref(
    "Joyeux anniversaire ! Que cette année t'apporte bonheur et succès. Que tous tes rêves deviennent réalité et que chaque jour soit rempli de joie et de rires. Profite de cette journée spéciale et de toutes les belles choses qu'elle t'apporte. Bon anniversaire !"
  )
  const isEditing = ref(false)
  const showModal = ref(false)
  const modalMessage = ref("")
  
  // Méthodes
  function showCard(cardNumber) {
    currentCard.value = cardNumber
  }
  
  function editText() {
    isEditing.value = true
  }
  
  function saveText() {
    isEditing.value = false
    modalMessage.value = "Texte enregistré avec succès!"
    showModal.value = true
  }
  
  function sendText() {
    modalMessage.value = "Message envoyé avec succès!"
    showModal.value = true
  }
  
  function closeModal() {
    showModal.value = false
  }
  </script>
  
  <style scoped>
  .card {
    max-width: 250px;
  }
  </style>
  