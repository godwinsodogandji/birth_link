<template>
        <Nav />
        <Aside />
        <div class="bg-red-100 " style="margin-left: 250px;">
            <div class="flex flex-col items-center">
                <!-- Barre de recherche -->
                <div class="relative mt-5 mb-4">
                    <input
                        v-model="search"
                        class="rounded-full bg-pink-200 pl-10 pr-5 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Search name"
                        type="text"
                        style="width: 300px; height: 50px;"
                    />
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>
    
                <!-- Liste des amis avec défilement -->
                <div class="friends-list-container overflow-y-auto" @scroll="handleScroll">
                    <div class="friends-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                        <div
                            v-for="friend in displayedFriends"
                            :key="friend.id"
                            class="bg-white rounded-3xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105"
                        >
                            <div class="bg-gradient-to-r from-pink-500 to-purple-500 p-5 text-center">
                                <img
                                    :src="friend.profile_picture"
                                    alt="Profile picture"
                                    class="w-24 h-24 rounded-full mx-auto border-4 border-white"
                                />
                            </div>
                            <div class="p-6 text-center">
                                <h2 class="text-xl font-bold">{{ friend.name }}</h2>
                                <p class="text-gray-500">{{ friend.position }}</p>
                                <p class="text-gray-500">{{ friend.birthday }}</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Loader -->
                <div v-if="loading" class="text-center py-4">Loading...</div>
            </div>
        </div>
    
    
    
</template>

<script setup>
import Nav from "@/Pages/Nav.vue";
import Aside from "@/Pages/Aside.vue";
import { ref, computed, watch, onMounted } from "vue";
import axios from "axios";

// Définir les props pour récupérer les amis depuis Laravel/Inertia
const props = defineProps({
  friends: {
    type: Object,
    required: true,
  },
});

// Initialiser les variables
const search = ref('');
const friends = ref(props.friends.data); // Liste complète des amis reçus
const displayedFriends = ref(friends.value); // Liste des amis affichés
const loading = ref(false);
const currentPage = ref(1); // Page actuelle du défilement
const itemsPerPage = 3; // Nombre d'amis à afficher par page

// Fonction pour charger des amis supplémentaires
const loadFriends = async () => {
    if (loading.value) return; // Si un chargement est déjà en cours, ne pas en lancer un autre
    loading.value = true;

    try {
        const response = await axios.get('/friends', {
            params: { page: currentPage.value + 1 }, // Demander la page suivante
        });

        // Ajouter les nouveaux amis à la liste affichée
        displayedFriends.value.push(...response.data.data);
        currentPage.value++; // Passer à la page suivante
    } catch (error) {
        console.error("Erreur lors du chargement des amis :", error);
    } finally {
        loading.value = false;
    }
};

// Fonction pour gérer le défilement infini
const handleScroll = (event) => {
    const scrollContainer = event.target;
    if (
        scrollContainer.scrollTop + scrollContainer.clientHeight >=
        scrollContainer.scrollHeight - 6
    ) {
        loadFriends(); // Charger plus d'amis si l'utilisateur arrive en bas
    }
};

// Computed property pour filtrer les amis selon la recherche
const filteredFriendsList = computed(() => {
    return friends.value.filter((friend) =>
        friend.name.toLowerCase().includes(search.value.toLowerCase())
    );
});

// Watcher pour réinitialiser la pagination lors de la recherche
watch(search, () => {
    currentPage.value = 1;
    displayedFriends.value = []; // Réinitialiser la liste affichée
    loadFriends(); // Recharger les amis après modification du filtre
});

// Charger initialement les amis au montage du composant
onMounted(() => {
    loadFriends();
});
</script>

<style scoped>
body {
    font-family: "Roboto", sans-serif;
}
</style>
