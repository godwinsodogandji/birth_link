<template>
  <div class="flex" id="app">
    <aside class="w-64 bg-white p-4 shadow-lg">
      <button class="bg-red-500 text-white py-2 px-4 rounded mb-6 hover:bg-red-600 transition duration-300">
        Créer Nouveau
      </button>
      <nav>
        <ul>
          <li class="mb-4">
            <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
              <i class="fas fa-birthday-cake mr-2"></i>
              Anniversaires
            </a>
            <ul class="ml-6 mt-2">
              <li class="mb-2">
                <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">Prochains</a>
              </li>
              <li class="mb-2">
                <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">Passés</a>
              </li>
            </ul>
          </li>
          <li class="mb-4">
            <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
              <i class="fas fa-users mr-2"></i>
              Amis
            </a>
            <ul class="ml-6 mt-2">
              <li class="mb-2">
                <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">Liste d'Amis</a>
              </li>
              <li class="mb-2">
                <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">Invitations</a>
              </li>
            </ul>
          </li>
          <!-- Add more sections here if needed -->
        </ul>
      </nav>
    </aside>

    <main class="flex-1 p-6">
      <section class="mb-6">
        <div class="flex items-center justify-center">
          <div class="bg-white p-8 rounded-lg shadow-lg text-center animate-bounce-slow">
            <h1 class="text-4xl font-bold text-red-500 mb-4">
              Joyeux Anniversaire!
            </h1>
            <p class="text-gray-700 mb-4">
              Nous vous souhaitons une journée remplie de joie et de bonheur.
            </p>
            <img alt="Image d'anniversaire" class="mx-auto mb-4" height="200" src="https://storage.googleapis.com/a1aa/image/Xfft1a2Whyvl0UqS8WYqTL02ogoo3pmuJM7xu4KXreoN5yhnA.jpg" width="200"/>
            <button class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300">
              Merci!
            </button>
          </div>
        </div>
      </section>

      <section class="mb-6">
        <h2 class="text-2xl font-semibold mb-4 text-red-700">Accès Rapide</h2>
        <div class="grid grid-cols-3 gap-4">
          <div class="bg-red-100 p-4 rounded flex items-center shadow-md">
            <i class="fas fa-birthday-cake text-red-500 text-2xl mr-4"></i>
            <div>
              <p class="text-red-500 font-semibold">Anniversaires</p>
              <p class="text-gray-500">8 événements</p>
            </div>
          </div>
          <div class="bg-white p-4 rounded flex items-center shadow-md">
            <i class="fas fa-users text-blue-500 text-2xl mr-4"></i>
            <div>
              <p class="text-gray-700 font-semibold">Amis</p>
              <p class="text-gray-500">12 amis</p>
            </div>
          </div>
          <div class="bg-white p-4 rounded flex items-center shadow-md">
            <i class="fas fa-envelope text-green-500 text-2xl mr-4"></i>
            <div>
              <p class="text-gray-700 font-semibold">Vœux</p>
              <p class="text-gray-500">237 vœux</p>
            </div>
          </div>
        </div>
      </section>

      <section class="mb-6">
        <h2 class="text-2xl font-semibold mb-4 text-red-700">Dossiers</h2>
        <div class="grid grid-cols-4 gap-4">
          <div class="bg-white p-4 rounded flex items-center shadow-md">
            <i class="fas fa-birthday-cake text-red-500 text-2xl mr-4"></i>
            <div>
              <p class="text-gray-700 font-semibold">Anniversaires</p>
              <p class="text-gray-500">3 événements</p>
            </div>
          </div>
          <div class="bg-white p-4 rounded flex items-center shadow-md">
            <i class="fas fa-users text-red-500 text-2xl mr-4"></i>
            <div>
              <p class="text-gray-700 font-semibold">Amis</p>
              <p class="text-gray-500">84 amis</p>
            </div>
          </div>
        </div>
      </section>

      <section>
        <h2 class="text-2xl font-semibold mb-4 text-red-700">Anniversaires Récents</h2>
        <div class="bg-white p-4 rounded shadow-md">
          <div class="flex items-center mb-4">
            <i class="fas fa-birthday-cake text-red-500 text-2xl mr-4"></i>
            <div class="flex-1">
              <p class="text-gray-700 font-semibold">Anniversaire de Jean</p>
              <p class="text-gray-500">Nov 11, 2021 | 12:54</p>
            </div>
            <p class="text-gray-500">Seulement vous</p>
          </div>
          <!-- Add more recent birthdays here if needed -->
        </div>
      </section>
    </main>
  </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
      // Here you can add any data properties if needed
    };
  },
  methods: {
    // Add any methods if necessary
  },
};
</script>

<style scoped>
.animate-bounce-slow {
  animation: bounce 2s infinite;
}

@keyframes bounce {
  0%, 100% {
    transform: translateY(-25%);
    animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
  }
  50% {
    transform: translateY(0);
    animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
  }
}
</style>
