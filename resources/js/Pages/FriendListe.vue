<template>
  <div class="bg-red-100">
    <Nav />
    <div class="flex">
        <Aside></Aside>
        <div class="w-full mx-12 my-24">
            <!-- Barre de recherche -->
            <div class="relative mb-11">
                <input
                    v-model="search"
                    class="py-3 pl-10 pr-2 rounded-full bg-pink-200 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Search name"
                    type="text"
                />
                <i class="fas fa-search absolute left-3 top-3 text-gray-500"></i>
            </div>

            <!-- Liste des amis avec défilement -->
            <div class="grid grid-cols-3 md:grid-cols-2 lg:grid-cols-3 gap-5" @scroll="handleScroll"
            style="max-height: 800px; overflow-y: auto;">
                <div
                    v-for="friend in displayedFriends"
                    :key="friend.id"
                    class="bg-white rounded-3xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105"
                >
                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 p-5 text-center">
                        <img
                            :src="friend.profilePicture"
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

            <!-- Loader -->
            <div v-if="loading" class="text-center py-4">Loading...</div>
        </div>
    </div>
</div>
</template>

<script setup>
import Nav from "@/Pages/Nav.vue";
import Aside from "@/Pages/Aside.vue";
import { ref, computed, watch } from "vue";

// Liste des amis (à remplacer avec des données réelles ou via une API)
const friends = ref([
  {
        id: 1,
        name: "Tania Whitestone",
        position: "Visualer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/9HMgV3pNyj4DMloLfl6swgfZ7mZSXdLuePg9Rggqnnvt7yhnA.jpg",
        birthday: "1990-05-15"
    },
    {
        id: 2,
        name: "Tanzil Calahan",
        position: "Back-End Programmer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/g0uXlfpEX4RMACM6BEnOLJTu3aJy4VF9YA4ATH4sGel5d5wTA.jpg",
        birthday: "1985-08-23"
    },
    {
        id: 3,
        name: "Teo Smith",
        position: "Front-End Programmer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/kFlSBl4YZFZtApN4P4WgLjIzf6PH99YQJ04Wskh3Vz39uc4JA.jpg",
        birthday: "1992-02-10"
    },
    {
        id: 4,
        name: "Tommas Bay",
        position: "Copy Writer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/LTPhVBVAE6qXDdA4aM0fQpf6Jq4wZroFN7Vfj69yKk7u7yhnA.jpg",
        birthday: "1988-11-04"
    },
    {
        id: 5,
        name: "Tommy Red",
        position: "Project Manager",
        profilePicture: "https://storage.googleapis.com/a1aa/image/ZzZwk90eFy3CHKDkb3NYcxsLxNyx4qfHpm0lFOFzdcR4d5wTA.jpg",
        birthday: "1995-07-19"
    },
    {
        id: 6,
        name: "Trafalgar Law",
        position: "Project Manager",
        profilePicture: "https://storage.googleapis.com/a1aa/image/jcWTRCLMauJLF9nQ0ZrwJjetPCDaTRttNLiIxuLA2VB9uc4JA.jpg",
        birthday: "1990-10-12"
    },
    {
        id: 7,
        name: "Lisa Doe",
        position: "Designer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/9HMgV3pNyj4DMloLfl6swgfZ7mZSXdLuePg9Rggqnnvt7yhnA.jpg",
        birthday: "1993-03-30"
    },
    {
        id: 8,
        name: "John Doe",
        position: "Developer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/JohnDoeProfile.jpg",
        birthday: "1987-01-05"
    },
    {
        id: 9,
        name: "Jane Milligan",
        position: "UX/UI Designer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/JaneMilliganProfile.jpg",
        birthday: "1991-06-17"
    },
    {
        id: 10,
        name: "Carlos Hernandez",
        position: "Data Scientist",
        profilePicture: "https://storage.googleapis.com/a1aa/image/LTPhVBVAE6qXDdA4aM0fQpf6Jq4wZroFN7Vfj69yKk7u7yhnA.jpg",
        birthday: "1984-12-02"
    },
    {
        id: 11,
        name: "Sophie Green",
        position: "Product Manager",
        profilePicture: "https://storage.googleapis.com/a1aa/image/9HMgV3pNyj4DMloLfl6swgfZ7mZSXdLuePg9Rggqnnvt7yhnA.jpg",
        birthday: "1992-09-22"
    },
    {
        id: 12,
        name: "Emily Roberts",
        position: "Digital Marketer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/EmilyRobertsProfile.jpg",
        birthday: "1994-04-16"
    },
    {
        id: 13,
        name: "Mark Wallace",
        position: "SEO Specialist",
        profilePicture: "https://storage.googleapis.com/a1aa/image/MarkWallaceProfile.jpg",
        birthday: "1989-07-03"
    },
    {
        id: 14,
        name: "Olivia Turner",
        position: "Content Writer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/OliviaTurnerProfile.jpg",
        birthday: "1990-08-28"
    },
    {
        id: 15,
        name: "Nina Patel",
        position: "Sales Manager",
        profilePicture: "https://storage.googleapis.com/a1aa/image/LTPhVBVAE6qXDdA4aM0fQpf6Jq4wZroFN7Vfj69yKk7u7yhnA.jpg",
        birthday: "1991-01-12"
    },
    {
        id: 16,
        name: "Liam Stevens",
        position: "Software Engineer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/9HMgV3pNyj4DMloLfl6swgfZ7mZSXdLuePg9Rggqnnvt7yhnA.jpg",
        birthday: "1986-09-07"
    },
    {
        id: 17,
        name: "Olga Wilson",
        position: "Marketing Lead",
        profilePicture: "https://storage.googleapis.com/a1aa/image/OlgaWilsonProfile.jpg",
        birthday: "1993-05-20"
    },
    {
        id: 18,
        name: "George Knight",
        position: "Web Developer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/GeorgeKnightProfile.jpg",
        birthday: "1985-11-30"
    },
    {
        id: 19,
        name: "Chloe Adams",
        position: "HR Specialist",
        profilePicture: "https://storage.googleapis.com/a1aa/image/LTPhVBVAE6qXDdA4aM0fQpf6Jq4wZroFN7Vfj69yKk7u7yhnA.jpg",
        birthday: "1990-02-14"
    },
    {
        id: 20,
        name: "Henry Fox",
        position: "Chief Technology Officer",
        profilePicture: "https://storage.googleapis.com/a1aa/image/9HMgV3pNyj4DMloLfl6swgfZ7mZSXdLuePg9Rggqnnvt7yhnA.jpg",
        birthday: "1988-12-25"
    },
]);

const search = ref("");
const displayedFriends = ref([]); // Amis affichés
const loading = ref(false);
const itemsPerPage = 6; // Nombre d'amis à charger à chaque fois
let currentPage = 0; // Page actuelle

// Fonction pour charger des amis
const loadFriends = () => {
    if (loading.value) return; // Éviter de charger si déjà en cours
    loading.value = true;

    // Simuler un chargement des amis
    setTimeout(() => {
        const filtered = filteredFriends.value.slice(
            currentPage * itemsPerPage,
            (currentPage + 1) * itemsPerPage
        );
        displayedFriends.value.push(...filtered);
        currentPage++;
        loading.value = false;
    }, 1000);
};

// Computed property pour filtrer les amis en fonction de la recherche
const filteredFriends = computed(() => {
    return friends.value.filter((friend) =>
        friend.name.toLowerCase().includes(search.value.toLowerCase())
    );
});

// Charger les amis au démarrage
loadFriends();

// Fonction pour gérer le défilement
const handleScroll = (event) => {
    const scrollContainer = event.target;
    if (
        scrollContainer.scrollTop + scrollContainer.clientHeight >=
        scrollContainer.scrollHeight - 10
    ) {
        loadFriends();
    }
};

// Watcher pour réinitialiser la pagination lors de la recherche
watch(search, () => {
    currentPage = 0;
    displayedFriends.value = [];
    loadFriends();
});
</script>

<style scoped>
body {
    font-family: "Roboto", sans-serif;
}
</style>
