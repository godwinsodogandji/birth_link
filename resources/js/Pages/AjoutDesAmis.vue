<template>
  <div class="bg-red-100 min-h-screen">
    <Nav />
    <div class="flex flex-grow">
      <Aside></Aside>

      <div class="flex flex-col items-center mt-5 mb-5 justify-center w-full ml-40">
        <form class="max-w-md mx-auto w-full mb-4">
          <!-- Formulaire de recherche -->
          <label
            for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
            >Search</label
          >
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg
                class="w-4 h-4 text-gray-500 dark:text-gray-400"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 20 20"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                />
              </svg>
            </div>
            <input
              v-model="searchQuery"
              type="search"
              id="default-search"
              class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
              placeholder="Rechercher un utilisateur..."
              required
            />
            <button
              type="submit"
              class="text-white absolute end-2.5 bottom-2.5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
            >
              Search
            </button>
          </div>
        </form>

        <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Liste des utilisateurs</h1>

        <div
          class="grid grid-cols-3 sm:grid-cols-3 lg:grid-cols-4 ml-40 mb-20 gap-10 max-w mx-auto notification-page"
          @scroll="handleScroll"
          ref="notificationContainer"
        >
          <div
            v-for="(user, index) in users"
            :key="index"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700"
          >
            <img
              class="object-cover w-full rounded-t-lg h-screen md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
              src="#"
              alt="Profile Picture"
            />
            <div class="flex flex-col justify-between p-4 leading-normal">
              <h2 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ user.username }}</h2>
              <span class="mb-4 text-sm text-gray-500 dark:text-gray-400">Email: {{ user.email }}</span>
              <span class="mb-4 text-sm text-gray-500 dark:text-gray-400">Date de naissance: {{ user.date_of_birth }}</span>
              <span class="mb-4 text-sm text-gray-500 dark:text-gray-400">Promo: {{ user.promo }}</span>
            </div>

            <div class="flex justify-end mt-0 pt-0 mb-20 relative">
              <button
                @click="toggleDropdown(index)"
                class="dropdown-menu inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                type="button"
              >
                <span class="sr-only">Open dropdown</span>
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor"
                  viewBox="0 0 16 3"
                >
                  <path
                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"
                  />
                </svg>
              </button>

              <!-- Dropdown menu -->
              <div
                v-if="user.isDropdownOpen"
                class="absolute right-0 z-10 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
              >
                <ul class="py-2" aria-labelledby="dropdownButton">
                  <li>
                    <a
                      href="#"
                      @click.prevent="addFriend(user.id)"
                      class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                      >Ajouter</a
                    >
                  </li>

                  <li>
                    <a
                      href="#"
                      class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-400 dark:hover:text-white"
                      >Supprimer</a
                    >
                  </li>
                </ul>
              </div>
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
  import { ref, computed, reactive, defineProps, onMounted, onBeforeUnmount } from 'vue';
  
  // Définition des props pour recevoir les utilisateurs
  const props = defineProps({
    users: {
      type: Array,
      required: true,
    }
  })
  
  // Méthode pour gérer l'ouverture et la fermeture du dropdown
  const toggleDropdown = (index) => {
    // Ferme tous les autres dropdowns
    props.users.forEach((user, i) => {
      if (i !== index) {
        user.isDropdownOpen = false;
      }
    });
    // Basculer l'état du dropdown de l'utilisateur sélectionné
    props.users[index].isDropdownOpen = !props.users[index].isDropdownOpen;
  };
  
  // Méthode pour fermer le dropdown lorsqu'on clique ailleurs
  const closeDropdown = (event) => {
    // Si le clic est en dehors du dropdown et du bouton, on ferme les dropdowns ouverts
    const dropdowns = document.querySelectorAll('.dropdown-menu');
    const buttons = document.querySelectorAll('button');
    if (![...dropdowns, ...buttons].includes(event.target) && !event.target.closest('.dropdown-menu')) {
      props.users.forEach((user) => {
        user.isDropdownOpen = false;
      });
    }
  };
  
  // Ajout de l'écouteur d'événements lorsque le composant est monté
  onMounted(() => {
    document.addEventListener('click', closeDropdown);
  });
  
  // Suppression de l'écouteur d'événements lorsque le composant est démonté
  onBeforeUnmount(() => {
    document.removeEventListener('click', closeDropdown);
  });

  // Méthode d'ajout d'un ami
const addFriend = (userId) => {
  // Supposons qu'on a une fonction pour envoyer une requête API pour ajouter un ami.
  // Cela pourrait être une requête HTTP, ici on simule simplement le changement de l'état local

  // Exemple : simuler l'ajout en modifiant un état ou faire une requête API
  const user = props.users.find((user) => user.id === userId);
  
  if (user) {
    // Ajouter un ami dans l'état local (simulé ici)
    user.isFriend = true;
    // On pourrait envoyer une requête HTTP pour enregistrer cette relation d'amitié dans la base de données ici.
    
    alert(`Ami ajouté avec succès!`);
  }
};

  </script>
  
  <style scoped>
  /* Ajoutez ici vos styles spécifiques si nécessaire */
  </style>
  