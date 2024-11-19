<template>
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
                v-show="isCardVisible"
                class="card bg-white p-6 rounded-lg shadow-md text-center flex items-center justify-center flex-col bg-cover"
                :style="{
                    minHeight: '990px',
                    minWidth: '850px',
                    backgroundImage: `url(${backgroundImage})`,
                }"
            >
                <div class="bg-white bg-opacity-75 p-4 rounded-lg shadow-lg">
                    <!-- Title with dynamic color -->
                    <h2
                        :style="{ color: titleColor }"
                        class="font-bold text-4xl mb-4"
                    >
                        {{ cardTitle }}
                    </h2>
                    <textarea
                        class="bg-transparent text-gray-700 font-semibold text-xl text-center w-full h-full resize-none focus:outline-none"
                        rows="10"
                        readonly
                    >
              {{ cardText }}
            </textarea
                    >
                </div>
                <div class="mt-4 space-x-4">
                    <button
                        @click="showForm"
                        class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition"
                    >
                        Personnaliser le texte
                    </button>
                    <button
                        @click="sendText"
                        class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition"
                    >
                        Envoyer
                    </button>
                </div>
            </div>
        </section>

        <!-- Modal for Confirmation -->
        <div
            v-show="isConfirmationModalVisible"
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

        <!-- Form Modal for Customization -->
        <div
            v-show="isFormModalVisible"
            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center"
        >
            <div class="bg-white p-6 rounded-lg shadow-lg text-center w-[800px]">
                <h2 class="text-xl font-bold mb-4">Personnaliser la Carte</h2>
                <form @submit.prevent="saveCustomization">
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700"
                            >Titre</label
                        >
                        <input
                            v-model="customTitle"
                            type="text"
                            id="title"
                            name="title"
                            class="w-full p-2 border border-gray-300 rounded"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700"
                            >Message</label
                        >
                        <textarea
                            v-model="customMessage"
                            id="message"
                            name="message"
                            class="w-full p-2 border border-gray-300 rounded"
                            rows="4"
                            required
                        ></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="photo" class="block text-gray-700"
                            >Photo</label
                        >
                        <input
                            type="file"
                            @change="handleImageChange"
                            id="photo"
                            name="photo"
                            class="w-full p-2 border border-gray-300 rounded"
                        />
                    </div>
                    <div class="mb-4">
                        <label for="color" class="block text-gray-700"
                            >Couleur du titre</label
                        >
                        <input
                            v-model="titleColor"
                            type="color"
                            id="color"
                            name="color"
                            class="w-full p-2 border border-gray-300 rounded"
                        />
                    </div>
                    <div class="space-x-4">
                        <button
                            type="submit"
                            class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition"
                        >
                            Enregistrer
                        </button>
                        <button
                            type="button"
                            @click="closeFormModal"
                            class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition"
                        >
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

// Reactive variables for card visibility and customization
const isCardVisible = ref(true);
const cardTitle = ref("Joyeux anniversaire !");
const cardText = ref(
    "Que cette année t'apporte bonheur et succès. Que tous tes rêves deviennent réalité et que chaque jour soit rempli de joie et de rires. Profite de cette journée spéciale et de toutes les belles choses qu'elle t'apporte. Bon anniversaire !"
);
const backgroundImage = ref("");
const modalMessage = ref("Texte enregistré avec succès!");
const isConfirmationModalVisible = ref(false);
const isFormModalVisible = ref(false);

// Reactive variables for customization form
const customTitle = ref(cardTitle.value);
const customMessage = ref(cardText.value);
const customColor = ref("#ffffff");
const titleColor = ref("#000000"); // Default color for the title

// Methods for showing/hiding cards and modals
function showCard(cardNumber) {
    isCardVisible.value = cardNumber === 1;
}

function showForm() {
    isFormModalVisible.value = true;
}

function closeFormModal() {
    isFormModalVisible.value = false;
}

function closeModal() {
    isConfirmationModalVisible.value = false;
}

function saveCustomization() {
    cardTitle.value = customTitle.value;
    cardText.value = customMessage.value;
    backgroundImage.value = backgroundImage.value || "";
    document.querySelector(".card").style.backgroundColor = customColor.value;
    closeFormModal();
    modalMessage.value = "Texte enregistré avec succès!";
    isConfirmationModalVisible.value = true;
}

function sendText() {
    modalMessage.value = "Message envoyé avec succès!";
    isConfirmationModalVisible.value = true;
}

// Method to handle image change and set it as background
function handleImageChange(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            backgroundImage.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
</script>

<style scoped>
.card {
    max-width: 250px;
}
.card.bg-cover {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
</style>
