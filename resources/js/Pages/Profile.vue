<template>
    <div
        v-if="user"
        class="bg-gray-100 flex items-center justify-center h-screen"
    >
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
            <h2 class="text-2xl font-semibold mb-6">Edit Profile</h2>
            <div class="flex justify-center mb-6">
                <div class="relative">
                    <img
                        alt="Profile picture"
                        class="w-24 h-24 rounded-full"
                        :src="
                            form.profile_picture
                                ? URL.createObjectURL(form.profile_picture)
                                : user.profile_picture
                                ? `/storage/${user.profile_picture}`
                                : 'https://via.placeholder.com/100'
                        "
                    />
                    <button
                        class="absolute bottom-0 right-0 bg-blue-500 text-white rounded-full p-1"
                    >
                        <i class="fas fa-pen"></i>
                    </button>
                </div>
            </div>
            <form @submit.prevent="updateProfile">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700"
                        >Username</label
                    >
                    <input
                        v-model="form.username"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                        type="text"
                        required
                    />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700"
                        >Email</label
                    >
                    <input
                        v-model="form.email"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                        type="email"
                        required
                    />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700"
                        >Date of Birth</label
                    >
                    <input
                        v-model="form.date_of_birth"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                        type="date"
                    />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700"
                        >Promo</label
                    >
                    <input
                        v-model="form.promo"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                        type="text"
                    />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700"
                        >Profile Picture</label
                    >
                    <input
                        @change="handleFileUpload"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                        type="file"
                    />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700"
                        >Password</label
                    >
                    <div class="relative">
                        <input
                            v-model="form.password"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                            type="password"
                            placeholder="********"
                        />
                        <button
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500"
                            type="button"
                        >
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        type="submit"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Message de chargement si l'utilisateur n'est pas encore disponible -->
    <div v-else class="flex items-center justify-center h-screen">
        <p>Loading...</p>
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";

const { props } = usePage();
const user = props.user || {};
console.log("user", user);

const form = ref({
    username: user.username || "",
    email: user.email || "",
    date_of_birth: user.date_of_birth || "",
    promo: user.promo || "",
    password: "",
    profile_picture: null,
});

// Gérer le téléchargement de l'image
const handleFileUpload = (event) => {
    form.value.profile_picture = event.target.files[0];
};

// Mettre à jour le profil
const updateProfile = () => {
    const formData = new FormData();
    Object.entries(form.value).forEach(([key, value]) => {
        formData.append(key, value);
    });

    Inertia.put("/profile", formData);
};
</script>

<style scoped></style>
