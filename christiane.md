# Workflow typique Git

## 1. Forker le repo
Un collaborateur (disons Christiane) fork le dépôt origin sur son propre compte Github. Cela crée une copie personnelle du repo.
## 2. Cloner le fork
Christiane clone son fork sur sa machine locale:
```bash
git clone https://github.com/sossoukpechritiane/projet-x.git
cd projet-x
```
## 3. Configurer les remotes
Christiane configure le repo original comme remote pour son garder son fork à jour:
```bash
git remote add base https://github.com/tiburcekouagou/projet-x.git
```

## 4. Créer une branche pour la fonctionnalité
Avant d'apporter des modifications, elle crée une nouvelle branche pour sa fonctionnalité
```bash
git checkout -b nouvelle-fonctionnalité
```

## 5. Apporter des modifications
Christiane effectue les modifications nécessaires dans le code et les valides:
```bash
git add .
git commit -m "Ajout de la nouvelle fonctionnalité"
```

## 6. Pousser les modifications
Elle pousse sa branche vers son fork
```bash
git push origin nouvelle-fonctionnalité
```

## 7. Soumettre un pull request
Christiane se rend sur Github et soumet un PR de sa branche vers la branche principale du repo "upstream".

## 8. Révision du PR
Les mainteneurs du repo original examinent le PR. Ils peuvent poser des questions ou demander des modifications.

## 9. Gestion des conflits
si des conflits sont détectés (par exemple, d'autres contributions ont été fusionnées dans la branche principale), Christiane doit:
1. Mettre à jour son fork:
````bash
git fetch base
git checkout main
git merge base/main
```

2. Retourner à sa branche:
```bash
git checkout nouvelle-fonctionnalité
```

3. Fusionner les modifications:
```bash
git merge main
```

4. Résoudre les conflits dans les fichiers, puis les valider:
```bash
git add .
git commit -m "Résolution des conflits"
```







git remote add base8 https://github.com/godwinsodogandji/birth_link.git

 git fetch base8
From https://github.com/godwinsodogandji/birth_link
 * [new branch]      Ange       -> base8/Ange
 * [new branch]      Chirac     -> base8/Chirac
 * [new branch]      elyna      -> base8/elyna
 * [new branch]      godwin     -> base8/godwin
 * [new branch]      main       -> base8
git pull base8 Chirac

git checkout -b christiana




<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cartes avec Boutons</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .card {
      max-width: 250px;
    }
    .hidden {
      display: none;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6 bg-red-100">
  <!-- Sidebar for Buttons -->
  <div class="space-y-6 mr-20">
    <button onclick="showCard(1)"  style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150  transition block">Carte de voeux n°1</button>
    <button onclick="showCard(2)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150  transition block">Carte de voeux n°2</button>
    <button onclick="showCard(3)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150  transition block">Carte de voeux n°3</button>
    <button onclick="showCard(4)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150  transition block">Carte de voeux n°4</button>
    <button onclick="showCard(5)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150 transition block">Carte de voeux n°5</button>
    <button onclick="showCard(6)" style="background-color: rgb(220,20,60);" class="text-white py-2 px-4 rounded w-150  transition block">Carte de voeux n°6</button>
  </div>
</body>



<!-- Container for Cards -->
<section class="grid grid-cols-1 gap-4 ml-8">
  <!-- Card 1 -->
  <div id="card-1" class="card hidden  p-6 mt-25 rounded-lg shadow-md text-center
       flex items-center justify-center flex-col bg-cover bg-no-repeat bg-center relative" 
       style="background-image: url('/images/carte1.jpg'); width: 700px; max-width: 100%; height: 500px;">
       <div   style="background-color:#FEBFD2;" class="shadow-lg p-6 rounded-full mt-20">
    <p class="text-black font-semibold text-xl">Joyeux anniversaire !</p>
    <p class="text-black font-semibold text-xl">Que cette année t'apporte</p>
    <p class="text-black font-semibold text-xl"> bonheur et succès.</p>
</div>
    <button style="background-color: #e0115f;" class="absolute bottom-4 right-4 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Envoyer</button>
  </div>

  <!-- Card 2 -->
  <div id="card-2" class="card hidden bg-blue-100 p-6 rounded-lg shadow-md text-center
       flex items-center justify-center flex-col bg-cover bg-no-repeat bg-center relative" 
       style="background-image: url('/images/cartee2.png'); width: 700px; max-width: 100%; height: 500px;">
       <div class="flex ">
<img 
  src="/images/iconannif.png" 
  alt="Icône anniversaire" 
  class="w-25 h-20 mr-5 mb-10 "
/>
<img 
  src="/images/iconannif.png" 
  alt="Icône anniversaire" 
  class="w-25 h-20 mr-5 "
/>
<img 
  src="/images/iconannif.png" 
  alt="Icône anniversaire" 
  class="w-25 h-20 mr-5"
/>

</div>
    <p class="text-black font-bold text-lg">Joyeux anniversaire!</p>
    <p class="text-black font-semibold text-xl">Félicitations pour cette nouvelle année de vie.</p>
    <p class="text-black font-normal text-base">Que tous tes rêves deviennent réalité !</p>
    <button  style="background-color: #e0115f;" class="absolute bottom-4 right-4  text-white py-2 px-4 rounded hover:bg-blue-600 transition">Envoyer</button>
  </div>

  <!-- Card 3 -->
  <div id="card-3" class="card hidden bg-blue-100 p-6 rounded-lg shadow-md text-center
       flex items-center justify-center flex-col bg-cover bg-no-repeat bg-center relative" 
       style="background-image: url('/images/carte3.png'); width: 700px; max-width: 100%; height: 500px;">
       <div class="flex ">
        <img 
        src="/images/feux.png" 
        alt="Icône anniversaire" 
        class="w-25 h-20 mr-5"
      />
        <img 
        src="/images/feux.png" 
        alt="Icône anniversaire" 
        class="w-25 h-20 mt-10  mr-5"
      />
        <img 
        src="/images/feux.png" 
        alt="Icône anniversaire" 
        class="w-25 h-20 mr-5"
      />
       </div>
       <div class="shadow-lg p-6 rounded-full mt-20 bg-white">
    <p class="text-black font-semibold text-xl">Que ton anniversaire </p>
    <p class="text-black font-semibold text-xl">soit rempli de rires</p>
    <p class="text-black font-semibold text-xl">et de moments précieux.</p>
        <p class="text-black font-semibold text-xl">Heureux jour!!</p>
  </div>
    <button  style="background-color: #e0115f;"class="absolute bottom-4 right-4  text-white py-2 px-4 rounded hover:bg-blue-600 transition">Envoyer</button>
  </div>

  <!-- Card 4 -->
  <div id="card-4" class="card hidden bg-blue-100 p-6 rounded-lg shadow-md text-center
       flex items-center justify-center flex-col bg-cover bg-no-repeat bg-center relative" 
       style="background-image: url('/images/carte4.png');width: 700px; max-width: 100%; height: 500px;">
       <div class=" p-6  mt-40">
    <p class="text-black font-semibold text-xl">Bon anniversaire !</p>
    <p class="text-black font-semibold text-xl">Que la joie et la réussite</p>
    <p class="text-black font-semibold text-xl">t'accompagnent tout au long</p>
    <p class="text-black font-semibold text-xl"> de l'année à venir.</p>
       </div>
    <button  style="background-color: #e0115f;" class="absolute bottom-4 right-4 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Envoyer</button>
  </div>

  <!-- Card 5 -->
  <div id="card-5" class="card hidden bg-blue-100 p-6 rounded-lg shadow-md text-center
       flex items-center justify-center flex-col bg-cover bg-no-repeat bg-center relative" 
       style="background-image: url('/images/carte5.png');width: 700px; max-width: 100%; height: 500px;">
       <div class=" p-6  mb-15">
    <p class="text-black font-semibold text-2xl">Tous mes vœux de bonheur </p>
    <p class="text-black font-semibold text-2xl">pour cette journée spéciale.</p>
    <p class="text-black font-semibold text-2xl">Que l'amour et la chance</p>
    <p class="text-black font-semibold text-2xl">soient avec toi !</p>
  </div>
    <button style="background-color: #e0115f;" class="absolute bottom-4 right-4  text-white py-2 px-4 rounded hover:bg-blue-600 transition">Envoyer</button>
  </div>

  <!-- Card 6 -->
  <div id="card-6" class="card hidden bg-blue-100 p-6 rounded-lg shadow-md text-center
  flex items-center justify-center flex-col bg-cover bg-no-repeat bg-center relative" 
  style="background-image: url('/images/design.png'); width: 700px; max-width: 100%; height: 500px;">
  <div class="bg-white w-60 h-60 rounded-full   items-center justify-center text-black">
    <p class="text-black mt-14 font-semibold text-xl">Joyeux anniversaire!</p>
    <p class="text-black font-semibold text-xl">Que cette nouvelle</p>
    <p class="text-black font-semibold text-xl">année soit encore </p>
    <p class="text-black font-semibold text-xl"> meilleure que la précédente.</p>
  </div>
  
<button  style="background-color: #e0115f;" class="absolute bottom-4 right-4  text-white py-2 px-4 rounded hover:bg-blue-600 transition">Envoyer</button>
</div>

</section>


  </div>

  <script>
    function showCard(cardNumber) {
      // Cache all cards
      document.querySelectorAll('.card').forEach(card => card.classList.add('hidden'));

      // Show the selected card
      document.getElementById('card-' + cardNumber).classList.remove('hidden');
    }
  </script>
</body>
</html>








































