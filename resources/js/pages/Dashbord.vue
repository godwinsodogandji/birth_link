<template>
    <div class="flex h-screen bg-gray-100">
      <!-- Sidebar -->
      <div class="bg-white w-64 p-6 flex flex-col">
        <div class="flex items-center mb-6">
          <div class="bg-blue-500 p-2 rounded-full">
            <i class="fas fa-plus text-white"></i>
          </div>
          <span class="ml-3 text-lg font-semibold">Request for</span>
        </div>
        <nav class="flex-1">
          <ul>
            <li class="mb-4">
              <a class="flex items-center text-gray-600 hover:text-blue-500" href="#">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
              </a>
            </li>
            <li class="mb-4">
              <a class="flex items-center text-blue-500" href="#">
                <i class="fas fa-users mr-3"></i>
                People
              </a>
            </li>
            <li class="mb-4">
              <a class="flex items-center text-gray-600 hover:text-blue-500" href="#">
                <i class="fas fa-dollar-sign mr-3"></i>
                Finances
              </a>
            </li>
            <li class="mb-4">
              <a class="flex items-center text-gray-600 hover:text-blue-500" href="#">
                <i class="fas fa-chart-line mr-3"></i>
                Statistics
              </a>
            </li>
            <li class="mb-4">
              <a class="flex items-center text-gray-600 hover:text-blue-500" href="#">
                <i class="fas fa-file-alt mr-3"></i>
                Documents
              </a>
            </li>
            <li class="mb-4">
              <a class="flex items-center text-gray-600 hover:text-blue-500" href="#">
                <i class="fas fa-calendar-alt mr-3"></i>
                Calendar
              </a>
            </li>
          </ul>
        </nav>
        <div class="mt-auto">
          <a class="flex items-center text-gray-600 hover:text-blue-500 mb-4" href="#">
            <i class="fas fa-life-ring mr-3"></i>
            Support
          </a>
          <a class="flex items-center text-gray-600 hover:text-blue-500" href="#">
            <i class="fas fa-power-off mr-3"></i>
            Logout
          </a>
        </div>
      </div>
  
      <!-- Main Content -->
      <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-semibold">People</h1>
          <div class="flex items-center">
            <span class="text-gray-600 mr-4">29 Aug 2019</span>
            <div class="flex items-center">
              <img
                alt="User profile picture"
                class="rounded-full mr-2"
                height="40"
                src="#"
                width="40"
              />
              <span class="text-gray-600">Charles Merl</span>
            </div>
          </div>
        </div>
  
        <div class="flex justify-between items-center mb-6">
          <div class="flex items-center">
            <button class="bg-blue-500 text-white px-4 py-2 rounded mr-4">All</button>
            <button class="text-gray-600 px-4 py-2 rounded">Organization</button>
          </div>
          <div class="flex items-center">
            <input
              class="border border-gray-300 rounded px-4 py-2 mr-4"
              placeholder="Search by name"
              type="text"
            />
            <button class="bg-gray-200 text-gray-600 px-4 py-2 rounded mr-4">Design Team</button>
            <button class="bg-gray-200 text-gray-600 px-4 py-2 rounded mr-4">Position</button>
            <button class="bg-gray-200 text-gray-600 px-4 py-2 rounded mr-4">More</button>
            <button class="bg-gray-200 text-gray-600 px-4 py-2 rounded mr-4">Sort by: All</button>
            <button class="bg-gray-200 text-gray-600 px-4 py-2 rounded">
              <i class="fas fa-th-large"></i>
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
      </div>
      
    </div>
  </template>
  
  <script setup>
 
  </script>
  
  <style>
  body {
    font-family: 'Inter', sans-serif;
  }
  </style>