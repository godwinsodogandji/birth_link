<template>
    <div class="container">
      <div class="card" v-for="person in people" :key="person.name">
        <div class="card-header">
          <h3>{{ person.name }}</h3>
          <p>{{ person.role }}</p>
        </div>
        <div class="card-content">
          <img class="profile-picture" :src="person.image" :alt="person.name">
          <div class="birthday-message">
            L'anniversaire de {{ person.name }} est le {{ person.birthday }}.
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
      birthday: '15 janvier',
      progress: 80,
      image: 'henry_pauletta.jpg'
    },
    {
      name: 'Evan Jefferson',
      role: 'Creative Director',
      birthday: '22 février',
      progress: 70,
      image: 'evan_jefferson.jpg'
    },
    {
      name: 'Mark Thomson',
      role: 'Senior Designer',
      birthday: '10 mars',
      progress: 85,
      image: 'mark_thomson.jpg'
    },
    {
      name: 'Alice McKenzie',
      role: 'Senior Copywriter',
      birthday: '5 avril',
      progress: 75,
      image: 'alice_mckenzie.jpg'
    },
    {
      name: 'Jack Ro',
      role: 'Art Director',
      birthday: '20 mai',
      progress: 80,
      image: 'jack_ro.jpg'
    },
    {
      name: 'Anastasia Grousse',
      role: 'Senior Designer',
      birthday: '30 juin',
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
    align-items: center;
    margin: 20px auto;
    max-width: 1200px;
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
    transition: transform 0.2s;
  }
  
  .card:hover {
    transform: scale(1.05);
  }
  
  .card-header {
    background-color: #cc0000;
    color: white;
    padding: 20px;
    text-align: center;
  }
  
  .card-header h3 {
    margin-bottom: 5px;
  }
  
  .card-header p {
    font-size: 14px;
    color: #f2f2f2;
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
  
  .birthday-message {
    font-size: 14px;
    color: #444;
    margin-top: 10px;
    text-align: center;
  }
  </style>