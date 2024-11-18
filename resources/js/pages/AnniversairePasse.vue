<template>
    <div class="container">
      <div class="card" v-for="person in people" :key="person.name">
        <div class="card-header">Birthday Dashboard</div>
        <div class="card-content">
          <img class="profile-picture" :src="person.image" :alt="person.name">
          <div class="name">{{ person.name }}</div>
          <div class="role">{{ person.role }}</div>
          <div class="progress-bar">
            <div class="progress" :style="{ width: person.progress + '%' }"></div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  const people = [
    {
      name: 'Henry Pauletta',
      role: 'Senior Developer',
      progress: 80,
      image: 'henry_pauletta.jpg'
    },
    {
      name: 'Evan Jefferson',
      role: 'Creative Director',
      progress: 70,
      image: 'evan_jefferson.jpg'
    },
    {
      name: 'Mark Thomson',
      role: 'Senior Designer',
      progress: 85,
      image: 'mark_thomson.jpg'
    },
    {
      name: 'Alice McKenzie',
      role: 'Senior Copywriter',
      progress: 75,
      image: 'alice_mckenzie.jpg'
    },
    {
      name: 'Jack Ro',
      role: 'Art Director',
      progress: 80,
      image: 'jack_ro.jpg'
    },
    {
      name: 'Anastasia Grousse',
      role: 'Senior Designer',
      progress: 90,
      image: 'anastasia_grousse.jpg'
    }
  ]
  </script>
  
  <style scoped>
  .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin: 20px;
  }
  
  .card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    margin: 20px;
    overflow: hidden;
    width: 250px;
  }
  
  .card-header {
    background-color: #cc0000;
    color: white;
    padding: 10px;
    text-align: center;
  }
  
  .card-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
  }
  
  .profile-picture {
    border-radius: 50%;
    height: 100px;
    width: 100px;
  }
  
  .name {
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
  }
  
  .role {
    color: #666666;
    font-size: 14px;
    margin-top: 5px;
  }
  
  .progress-bar {
    background-color: #f2f2f2;
    border-radius: 10px;
    height: 10px;
    margin-top: 10px;
    width: 100%;
  }
  
  .progress {
    background-color: #cc0000;
    border-radius: 10px;
    height: 100%;
  }
  </style>