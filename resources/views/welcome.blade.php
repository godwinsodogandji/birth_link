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
<body class="flex items-center justify-center min-h-screen p-6 bg-gray-100">
  <!-- Sidebar for Buttons -->
  <div class="space-y-6 mr-20">
    <button onclick="showCard(1)" class="bg-red-500 text-white py-2 px-4 rounded w-full hover:bg-red-600 transition">Carte 1</button>
  </div>

  <!-- Container for Cards -->
  <section class="grid grid-cols-1 gap-4 ml-8">
    <div id="card-1" class="card hidden bg-gradient-to-r from-red-500 to-red-700 p-6 rounded-lg shadow-md text-center flex items-center justify-center flex-col bg-cover" style="min-height: 990px; min-width: 850px;">
      <textarea id="card-text" class="bg-transparent text-white font-semibold text-xl text-center w-full h-full resize-none focus:outline-none" rows="10" readonly>
Joyeux anniversaire ! Que cette année t'apporte bonheur et succès. Que tous tes rêves deviennent réalité et que chaque jour soit rempli de joie et de rires. Profite de cette journée spéciale et de toutes les belles choses qu'elle t'apporte. Bon anniversaire !
      </textarea>
      <button onclick="editText()" class="mt-4 bg-black text-white py-2 px-4 rounded hover:bg-gray-800 transition">Personnaliser le texte</button>
    </div>
  </section>

  <script>
    function showCard(cardNumber) {
      // Cache all cards
      document.querySelectorAll('.card').forEach(card => card.classList.add('hidden'));

      // Show the selected card
      document.getElementById('card-' + cardNumber).classList.remove('hidden');
    }

    function editText() {
      const textArea = document.getElementById('card-text');
      textArea.removeAttribute('readonly');
      textArea.focus();
    }
  </script>
</body>
</html>