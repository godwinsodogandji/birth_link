<template>
    <div class="flex h-screen bg-gray-100">
      
  
     
  
      
       
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