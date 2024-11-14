<template>
    <div class="flex h-screen bg-gray-100">
      <!-- Sidebar -->
      <!-- <div class="bg-white w-64 p-6 flex flex-col">
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
      </div> -->
  
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
  
        <div class="grid grid-cols-3 gap-6">
          <PersonCard
            name="Henry Paulista"
            email="henry.paul@mail.com"
            profilePic="https://storage.googleapis.com/a1aa/image/qN69hcumeEUWa6n7ZdOSuLQE9f4CzPOzHIOsOmhZfHN3kuhnA.jpg"
            percentage="100%"
            position="SENIOR CREATIVE DIRECTOR"
          />
          <PersonCard
            name="Evan Jefferson"
            email="jefferson@mail.com"
            profilePic="https://storage.googleapis.com/a1aa/image/1miLocockX6IL1R9rdsAnJIZyFBNCROiqXVvc3PwERFm0N8E.jpg"
            percentage="82%"
            position="CREATIVE DIRECTOR"
          />
          <PersonCard
            name="Mark Thomson"
            email="mark.th@mail.com"
            profilePic="https://storage.googleapis.com/a1aa/image/RHtE6A3NQY6ZPlmJVYOrvHhqReEDyG8F4QAqLFb13UWPpb4JA.jpg"
            percentage="66%"
            position="SENIOR UI DESIGNER"
          />
          <PersonCard
            name="Alice McKenzie"
            email="alice.mck@mail.com"
            profilePic="https://storage.googleapis.com/a1aa/image/1A9Q7TkavW5xDRN86caurWxewTLQKtmTUkeheLKoUaBvkuhnA.jpg"
            percentage="100%"
            position="SENIOR COPYWRITER"
          />
          <PersonCard
            name="Jack Ro"
            email="jack.ro@mail.com"
            profilePic="https://storage.googleapis.com/a1aa/image/56QjNUfu6zUFHSJFtxuf1GGD1pUgfvRzZoPQ1MysZDAqkuhnA.jpg"
            percentage="33%"
            position="ART DIRECTOR"
          />
          <PersonCard
            name="Anastasia Groetze"
            email="anastasia.gr@mail.com"
            profilePic="https://storage.googleapis.com/a1aa/image/e5Pd2eQISEpbfpTpFweC6scLWkGDoSyV5bGZerUffI2KNpb4JA.jpg"
            percentage="42%"
            position="SENIOR UI DESIGNER"
          />
        </div>
      </div>
  
      <!-- Right Sidebar -->
      <div class="bg-white w-80 p-6">
        <div class="mb-6">
          <h2 class="text-lg font-semibold mb-4">Selected</h2>
          <div class="bg-gray-100 p-4 rounded-lg">
            <h3 class="text-lg font-semibold">Design Team</h3>
          </div>
        </div>
  
        <div class="mb-6">
          <h2 class="text-lg font-semibold mb-4">Time Log</h2>
          <div class="relative w-32 h-32 mx-auto">
            <div class="absolute inset-0 flex items-center justify-center">
              <span class="text-2xl font-semibold">74%</span>
            </div>
            <svg class="w-full h-full">
              <circle class="text-gray-200" cx="50%" cy="50%" fill="none" r="45%" stroke="currentColor" stroke-width="10"></circle>
              <circle class="text-blue-500" cx="50%" cy="50%" fill="none" r="45%" stroke="currentColor" stroke-dasharray="282.743" stroke-dashoffset="73.513" stroke-width="10"></circle>
            </svg>
          </div>
        </div>
  
        <div class="mb-6">
          <h2 class="text-lg font-semibold mb-4">Projects</h2>
          <div class="grid grid-cols-2 gap-4">
            <ProjectCard title="Total" count="148" />
            <ProjectCard title="Completed" count="56" />
            <ProjectCard title="In Progress" count="76" />
            <ProjectCard title="Waiting" count="16" />
          </div>
        </div>
  
        <div>
          <h2 class="text-lg font-semibold mb-4">Notification Center</h2>
          <div class="bg-gray-100 p-4 rounded-lg">
            <h3 class="text-lg font-semibold">Internal messages</h3>
          </div>
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