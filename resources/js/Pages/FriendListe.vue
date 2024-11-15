<template>


  <div class="bg-red-100">

    <Nav />



    <div class="flex">
       <Aside></Aside>

    <div class="w-full max-w-md mx-auto my-24">
      <!-- Barre de recherche -->
      <div class="relative mb-8">
        <input 
          v-model="search" 
          class="w-full py-3 pl-10 pr-4 rounded-full bg-pink-200 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" 
          placeholder="Search name" 
          type="text"
        />
        <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
      </div>
  
      <!-- Liste des amis -->
      <div class="grid grid-cols-1 gap-3">
        <div v-for="friend in filteredFriends" :key="friend.id" class="flex items-center p-4 bg-white rounded-lg shadow">
          <img :src="friend.profilePicture" alt="Profile picture" class="w-12 h-12 rounded-full mr-4" />
          <div>
            <div class="text-lg font-medium text-gray-900">{{ friend.name }}</div>
            <div class="text-sm text-gray-500">{{ friend.position }}</div>
          </div>
        </div>
      </div>
    </div>

    </div>




  </div>

  
  </template>
  
  <script setup>
  import Nav from '@/Pages/Nav.vue'
  import Aside from '@/Pages/Aside.vue';
  import { ref, computed } from 'vue';
  
  // Liste des amis (à remplacer avec des données réelles ou via une API)
  const friends = ref([
  { id: 1, name: 'Tania Whitestone', position: 'Visualer', profilePicture: 'https://storage.googleapis.com/a1aa/image/9HMgV3pNyj4DMloLfl6swgfZ7mZSXdLuePg9Rggqnnvt7yhnA.jpg' },
  { id: 2, name: 'Tanzil Calahan', position: 'Back-End Programmer', profilePicture: 'https://storage.googleapis.com/a1aa/image/g0uXlfpEX4RMACM6BEnOLJTu3aJy4VF9YA4ATH4sGel5d5wTA.jpg' },
  { id: 3, name: 'Teo Smith', position: 'Front-End Programmer', profilePicture: 'https://storage.googleapis.com/a1aa/image/kFlSBl4YZFZtApN4P4WgLjIzf6PH99YQJ04Wskh3Vz39uc4JA.jpg' },
  { id: 4, name: 'Tommas Bay', position: 'Copy Writer', profilePicture: 'https://storage.googleapis.com/a1aa/image/LTPhVBVAE6qXDdA4aM0fQpf6Jq4wZroFN7Vfj69yKk7u7yhnA.jpg' },
  { id: 5, name: 'Tommy Red', position: 'Project Manager', profilePicture: 'https://storage.googleapis.com/a1aa/image/ZzZwk90eFy3CHKDkb3NYcxsLxNyx4qfHpm0lFOFzdcR4d5wTA.jpg' },
  { id: 6, name: 'Trafalgar Law', position: 'Project Manager', profilePicture: 'https://storage.googleapis.com/a1aa/image/jcWTRCLMauJLF9nQ0ZrwJjetPCDaTRttNLiIxuLA2VB9uc4JA.jpg' },
  { id: 7, name: 'Lisa Doe', position: 'Designer', profilePicture: 'https://storage.googleapis.com/a1aa/image/LisaDoeProfile.jpg' },
  { id: 8, name: 'John Doe', position: 'Developer', profilePicture: 'https://storage.googleapis.com/a1aa/image/JohnDoeProfile.jpg' },
  { id: 9, name: 'Jane Milligan', position: 'UX/UI Designer', profilePicture: 'https://storage.googleapis.com/a1aa/image/JaneMilliganProfile.jpg' },
  { id: 10, name: 'Carlos Hernandez', position: 'Data Scientist', profilePicture: 'https://storage.googleapis.com/a1aa/image/CarlosHernandezProfile.jpg' },
  { id: 11, name: 'Sophie Green', position: 'Product Manager', profilePicture: 'https://storage.googleapis.com/a1aa/image/SophieGreenProfile.jpg' },
  { id: 12, name: 'Emily Roberts', position: 'Digital Marketer', profilePicture: 'https://storage.googleapis.com/a1aa/image/EmilyRobertsProfile.jpg' },
  { id: 13, name: 'Mark Wallace', position: 'SEO Specialist', profilePicture: 'https://storage.googleapis.com/a1aa/image/MarkWallaceProfile.jpg' },
  { id: 14, name: 'Olivia Turner', position: 'Content Writer', profilePicture: 'https://storage.googleapis.com/a1aa/image/OliviaTurnerProfile.jpg' },
  { id: 15, name: 'Nina Patel', position: 'Sales Manager', profilePicture: 'https://storage.googleapis.com/a1aa/image/NinaPatelProfile.jpg' },
  { id: 16, name: 'Liam Stevens', position: 'Software Engineer', profilePicture: 'https://storage.googleapis.com/a1aa/image/LiamStevensProfile.jpg' },
  { id: 17, name: 'Olga Wilson', position: 'Marketing Lead', profilePicture: 'https://storage.googleapis.com/a1aa/image/OlgaWilsonProfile.jpg' },
  { id: 18, name: 'George Knight', position: 'Web Developer', profilePicture: 'https://storage.googleapis.com/a1aa/image/GeorgeKnightProfile.jpg' },
  { id: 19, name: 'Chloe Adams', position: 'HR Specialist', profilePicture: 'https://storage.googleapis.com/a1aa/image/ChloeAdamsProfile.jpg' },
  { id: 20, name: 'Henry Fox', position: 'Chief Technology Officer', profilePicture: 'https://storage.googleapis.com/a1aa/image/HenryFoxProfile.jpg' }
]);

  
  // Recherche filtrée
  const search = ref('');
  
  // Computed property pour filtrer les amis en fonction de la recherche
  const filteredFriends = computed(() => {
    return friends.value.filter(friend => 
      friend.name.toLowerCase().includes(search.value.toLowerCase())
    );
  });
  </script>
  
  <style scoped>
  body {
    font-family: 'Roboto', sans-serif;
  }
  </style>
  