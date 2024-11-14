<html>
 <head>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <script src="https://registry.npmmirror.com/vue/3.3.11/files/dist/vue.global.js">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
  <style>
 
    body {
      font-family: 'Inter', sans-serif;
    }
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
 </head>
 <body class="bg-red-100">
  <div class="flex" id="app">
   <aside class="w-64 bg-white p-4 shadow-lg">
    <button class="bg-red-500 text-white py-2 px-4 rounded mb-6 hover:bg-red-600 transition duration-300">
     Créer Nouveau
    </button>
    <nav>
     <ul>
      <li class="mb-4">
       <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
        <i class="fas fa-birthday-cake mr-2">
        </i>
        Anniversaires
       </a>
       <ul class="ml-6 mt-2">
        <li class="mb-2">
         <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
          Prochains
         </a>
        </li>
        <li class="mb-2">
         <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
          Passés
         </a>
        </li>
       </ul>
      </li>
      <li class="mb-4">
       <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
        <i class="fas fa-users mr-2">
        </i>
        Amis
       </a>
       <ul class="ml-6 mt-2">
        <li class="mb-2">
         <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
          Liste d'Amis
         </a>
        </li>
        <li class="mb-2">
         <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
          Invitations
         </a>
        </li>
       </ul>
      </li>
      <li class="mb-4">
       <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
        <i class="fas fa-palette mr-2">
        </i>
        Thèmes
       </a>
       <ul class="ml-6 mt-2">
        <li class="mb-2">
         <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
          Thèmes Populaires
         </a>
        </li>
        <li class="mb-2">
         <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
          Personnalisés
         </a>
        </li>
       </ul>
      </li>
      <li class="mb-4">
       <a class="flex items-center text-gray-700 hover:text-red-500 transition duration-300" href="#">
        <i class="fas fa-envelope mr-2">
        </i>
        Vœux
       </a>
       <ul class="ml-6 mt-2">
        <li class="mb-2">
         <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
          Envoyés
         </a>
        </li>
        <li class="mb-2">
         <a class="text-gray-500 hover:text-red-500 transition duration-300" href="#">
          Reçus
         </a>
        </li>
       </ul>
      </li>
     </ul>
    </nav>
   </aside>
   <main class="flex-1 p-6">
    <section class="mb-6">
//
<div class="flex items-center justify-center  " id="app">
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

     <h2 class="text-2xl font-semibold mb-4 text-red-700">
      Accès Rapide
     </h2>
     <div class="grid grid-cols-3 gap-4">
      <div class="bg-red-100 p-4 rounded flex items-center shadow-md">
       <i class="fas fa-birthday-cake text-red-500 text-2xl mr-4">
       </i>
       <div>
        <p class="text-red-500 font-semibold">
         Anniversaires
        </p>
        <p class="text-gray-500">
         8 événements
        </p>
       </div>
       <div class="ml-auto flex -space-x-2">
           </div>
      </div>
      <div class="bg-white p-4 rounded flex items-center shadow-md">
       <i class="fas fa-users text-blue-500 text-2xl mr-4">
       </i>
       <div>
        <p class="text-gray-700 font-semibold">
         Amis
        </p>
        <p class="text-gray-500">
         12 amis
        </p>
       </div>
       <div class="ml-auto flex -space-x-2">
        <img alt="User 1" class="w-6 h-6 rounded-full border-2 border-white" height="24" src="https://storage.googleapis.com/a1aa/image/NznU6n3gBLqgFJnnBMKkJ6d5q27b1UAwwzEiTVXdYiflob4JA.jpg" width="24"/>
        <img alt="User 2" class="w-6 h-6 rounded-full border-2 border-white" height="24" src="https://storage.googleapis.com/a1aa/image/4bsMSvIgfkwyFyxGX8eOZ2AzPtvAhiesJ0XUDZZOt8PUiuhnA.jpg" width="24"/>
       </div>
      </div>
      <div class="bg-white p-4 rounded flex items-center shadow-md">
       <i class="fas fa-envelope text-green-500 text-2xl mr-4">
       </i>
       <div>
        <p class="text-gray-700 font-semibold">
         Vœux
        </p>
        <p class="text-gray-500">
         237 vœux
        </p>
       </div>
       <div class="ml-auto flex -space-x-2">
        <img alt="User 1" class="w-6 h-6 rounded-full border-2 border-white" height="24" src="https://storage.googleapis.com/a1aa/image/NznU6n3gBLqgFJnnBMKkJ6d5q27b1UAwwzEiTVXdYiflob4JA.jpg" width="24"/>
       </div>
      </div>
     </div>
    </section>
    <section class="mb-6">
     <h2 class="text-2xl font-semibold mb-4 text-red-700">
      Dossiers
     </h2>
     <div class="grid grid-cols-4 gap-4">
      <div class="bg-white p-4 rounded flex items-center shadow-md">
       <i class="fas fa-birthday-cake text-red-500 text-2xl mr-4">
       </i>
       <div>
        <p class="text-gray-700 font-semibold">
         Anniversaires
        </p>
        <p class="text-gray-500">
         3 événements
        </p>
      
        </p>
       </div>
      </div>
      <div class="bg-white p-4 rounded flex items-center shadow-md">
       <i class="fas fa-users text-red-500 text-2xl mr-4">
       </i>
       <div>
        <p class="text-gray-700 font-semibold">
         Amis
        </p>
        <p class="text-gray-500">
         84 amis
        </p>
       
        </p>
       </div>
      </div>
      <div class="bg-white p-4 rounded flex items-center shadow-md">
       <i class="fas fa-palette text-red-500 text-2xl mr-4">
       </i>
       <div>
        <p class="text-gray-700 font-semibold">
         Thèmes
        </p>
        <p class="text-gray-500">
         287 thèmes
        </p>
       
       </div>
      </div>
      <div class="bg-white p-4 rounded flex items-center shadow-md">
       <i class="fas fa-envelope text-red-500 text-2xl mr-4">
       </i>
       <div>
        <p class="text-gray-700 font-semibold">
         Vœux
        </p>
        <p class="text-gray-500">
         56 vœux
        </p>
      
       </div>
      </div>
     </div>
    </section>
    <section>
     <h2 class="text-2xl font-semibold mb-4 text-red-700">
      Anniversaires Récents
     </h2>
     <div class="bg-white p-4 rounded shadow-md">
      <div class="flex items-center mb-4">
       <i class="fas fa-birthday-cake text-red-500 text-2xl mr-4">
       </i>
       <div class="flex-1">
        <p class="text-gray-700 font-semibold">
         Anniversaire de Jean
        </p>
        <p class="text-gray-500">
         Nov 11, 2021 | 12:54
        </p>
       </div>
       <p class="text-gray-500">
        Seulement vous
       </p>
      </div>
     <div class="flex items-center mb-4">
       <i class="fas fa-birthday-cake text-red-500 text-2xl mr-4">
       </i>
         <div class="flex-1">
        <p class="text-gray-700 font-semibold">
         Anniversaire de Jean
        </p>
        <p class="text-gray-500">
         Nov 10, 2021 | 11:15
        </p>
       </div>
       <p class="text-gray-500">
        10 membres
       </p>
      </div>
     <div class="flex items-center mb-4">
       <i class="fas fa-birthday-cake text-red-500 text-2xl mr-4">
       </i>
        <div class="flex-1">
        <p class="text-gray-700 font-semibold">
         Anniversaire de Jean
        </p>
        <p class="text-gray-500">
         Nov 10, 2021 | 10:26
        </p>
       </div>
       <p class="text-gray-500">
        6 membres
       </p>
      </div>
      <div class="flex items-center mb-4">
       <i class="fas fa-birthday-cake text-red-500 text-2xl mr-4">
       </i>
        <div class="flex-1">
        <p class="text-gray-700 font-semibold">
         Anniversaire de Jean
        </p>
        <p class="text-gray-500">
         Nov 9, 2021 | 09:37
        </p>
       </div>
       <p class="text-gray-500">
        3 membres
       </p>
      </div>
     </div>
    </section>
   </main>
  </div>
  <script>
   const { createApp } = Vue;
    createApp({}).mount('#app');
  </script>
 </body>
</html>
